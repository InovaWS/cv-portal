<?php
namespace Mail;

class Mail {
	const MESSAGE_TYPE_PLAIN = 0;
	const MESSAGE_TYPE_ALT = 1;
	const MESSAGE_TYPE_ATTACHMENT = 2;
	const MESSAGE_TYPE_ALT_ATTACHMENT = 3;

	const MESSAGE_PRIORITY_MIN = 5;
	const MESSAGE_PRIORITY_MAX = 1;
	const MESSAGE_PRIORITY_MED = 3;

	const LE = "\n";

	// Senders and replies
	private $from = array(
			'name' => null,
			'address' => ''
	);
	private $confirmReadingTo = null;
	private $replyTo = array();

	// Recipients
	private $to = array();
	private $cc = array();
	private $bcc = array();

	// Content
	private $subject = '';
	private $html = false;
	private $body = '';
	private $altBody = '';
	private $wordWrap = 0;
	private $attachment = array();

	// Metadata
	private $priority = self::MESSAGE_PRIORITY_MED;
	private $headers = array();
	private $charset = 'UTF-8';
	private $encoding = '8bit';

	public function __construct() {
	}

	private function handleAddresses($args, &$destination) {
		// 'address'
		// 'name', 'address'
		// array('name' => 'name', 'address' => 'address')
		// object{ name = 'name', address = 'address'}
		// array(...)
		// null -> clear

		if (count($args) == 0)
			return;

		if (count($args) == 1) {
			$arg = $args[0];
				
			if (is_object($arg))
				$destination[] = array('name' => $arg->name, 'address' => $arg->address);
			elseif (is_string($arg))
			$destination[] = array('name' => null, 'address' => $arg);
			elseif (is_array($arg)) {
				if (array_key_exists('address', $arg))
					$destination[] = array('name' => array_key_exists('address', $arg) ? $arg['name'] : null, 'address' => $arg['address']);
				else {
					foreach($arg as $p)
						$this->handleAddresses($p, $destination);
				}
			}
			elseif (is_null($arg))
			$destination = array();
		}
		elseif (count($args) == 2)
		$destination[] = array('name' => $args[0], 'address' => $args[1]);
		else
			$this->handleAddresses(array(array($args)), $destination);
	}

	// Senders and replies
	public function from() {
		$args = func_get_args();
		$this->handleAddresses($args, $from);
		if (count($from) > 0)
			$this->from = $from[0];

		return $this->from;
	}

	public function confirmReadingTo() {
		$args = func_get_args();
		$this->handleAddresses($args, $confirmReadingTo);
		if (count($confirmReadingTo) > 0)
			$this->confirmReadingTo = $confirmReadingTo[0];

		return $this->confirmReadingTo;
	}
		
	public function replyTo() {
		$args = func_get_args();
		$this->handleAddresses($args, $this->replyTo);

		return $this->replyTo;
	}

	// Recipients
	public function to() {
		$args = func_get_args();
		$this->handleAddresses($args, $this->to);

		return $this->to;
	}

	public function cc() {
		$args = func_get_args();
		$this->handleAddresses($args, $this->cc);

		return $this->cc;
	}

	public function bcc() {
		$args = func_get_args();
		$this->handleAddresses($args, $this->bcc);

		return $this->bcc;
	}

	public function recipientCount() {
		return count($this->to) + count($this->cc) + count($this->bcc);
	}

	// Content
	public function subject() {
		if (func_num_args() == 1)
			$this->subject = strval(func_get_arg(0));

		return $this->subject;
	}

	public function html() {
		if (func_num_args() == 1)
			$this->html = !!func_get_arg(0);

		return $this->html;
	}

	public function body() {
		if (func_num_args() == 1)
			$this->body = strval(func_get_arg(0));

		return $this->body;
	}

	public function altBody() {
		if (func_num_args() == 1)
			$this->altBody = strval(func_get_arg(0));

		return $this->altBody;
	}

	public function wordWrap() {
		if (func_num_args() == 1)
			$this->wordWrap = intval(func_get_arg(0));

		return $this->wordWrap;
	}

	public function attachments() {
		return $this->attachment;
	}

	public function attachFile($path, $name = '', $encoding = 'base64', $type = 'application/octet-stream') {
		if(!@is_file($path))
			throw new Exception('file not found');

		$filename = basename($path);
		if(!$name)
			$name = $filename;

		$this->attachment[] = array(
				'source' => $path,
				'filename' => $filename,
				'name' => $name,
				'encoding' => $encoding,
				'type' => $type,
				'string-attachment' => false,
				'disposition' => 'attachment',
				'cid' => 0
		);
	}

	public function attachString($string, $filename, $encoding = 'base64', $type = 'application/octet-stream') {
		$this->attachment[] = array(
				'source' => $string,
				'filename' => $filename,
				'name' => $filename,
				'encoding' => $encoding,
				'type' => $type,
				'string-attachment' => true,
				'disposition' => 'attachment',
				'cid' => 0
		);
	}

	public function embedImage($path, $cid, $name = '', $encoding = 'base64', $type = 'application/octet-stream') {
		if(!@is_file($path))
			throw new Exception('file not found');

		$filename = basename($path);
		if(!$name)
			$name = $filename;

		$this->attachment[] = array(
				'source' => $path,
				'filename' => $filename,
				'name' => $name,
				'encoding' => $encoding,
				'type' => $type,
				'string-attachment' => false,
				'disposition' => 'inline',
				'cid' => $cid
		);
	}

	public function inlineImageExists() {
		foreach ($this->attachment as $attachment) {
			if($attachment['disposition'] == 'inline')
				return true;
		}
		return false;
	}

	// Metadata
	public function priority() {
		if (func_num_args() == 1)
			$this->priority = intval(func_get_arg(0));

		return $this->priority;
	}

	public function headers() {
		if (func_num_args() == 1 && is_array(func_get_arg(0)))
			$this->headers = func_get_arg(0);

		return $this->headers;
	}

	public function header($var, $val = false) {
		if ($val !== false)
			$this->headers[$var] = $val;

		return $this->headers[$var];
	}

	public function charset() {
		if (func_num_args() == 1)
			$this->charset = strval(func_get_arg(0));

		return $this->charset;
	}

	public function encoding() {
		if (func_num_args() == 1)
			$this->encoding = strval(func_get_arg(0));

		return $this->encoding;
	}

	// Utility
	public function messageType() {
		$hasAltBody = strlen($this->altBody) > 0;
		$hasAttachment = count($this->attachment) > 0;

		return ($hasAltBody ? 1: 0) | ($hasAttachment ? 2 : 0);
	}


}