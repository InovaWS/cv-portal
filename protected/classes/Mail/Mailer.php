<?php
namespace Mail;

use \DateTime;

class Mailer {
	const VERSION = '1.0';
	const LE = "\n";

	private static $sendMailDefaultOptions = array(
			'command-line' => '/usr/sbin/sendmail'
	);

	private static $qMailDefaultOptions = array(
			'command-line' => '/var/qmail/bin/sendmail'
	);

	private static $smtpDefaultOptions = array(
			'host' => '',
			'port' => 25,
			'helo' => '',
			'secure' => '',
			'auth' => true,
			'username' => '',
			'password' => '',
			'timeout' => 10,
			'smtp-debug' => false,
			'smtp-keep-alive' => false
	);

	private static $mailDefaultOptions = array();

	private $mailing = null;
	private $sender = '';

	private $smtpConnection = null;

	public function __construct($mailing = 'mail', array $options = null) {
		switch($mailing) {
			case 'sendmail':
				$this->mailing = (object)array(
				'mechanism' => 'sendmail',
				'options' => self::$sendMailDefaultOptions
				);
				break;

			case 'qmail':
				$this->mailing = (object)array(
				'mechanism' => 'qmail',
				'options' => self::$qMailDefaultOptions
				);
				break;

			case 'smtp':
				$this->mailing = (object)array(
				'mechanism' => 'smtp',
				'options' => self::$smtpDefaultOptions
				);
				break;
					
			case 'mail':
			default:
				$this->mailing = (object)array(
				'mechanism' => 'mail',
				'options' => self::$mailDefaultOptions
				);
		}
			
		if ($options !== null) {
			foreach ($this->mailing->options as $option => $value) {
				if (array_key_exists($option, $options))
					$this->mailing->options[$option] = $options[$option];
			}
		}
	}

	private function createMessageHeader(Mail $mail, $uniqid) {
		$now = new DateTime();
			
		$headers = array();
		$headers['Date'] = $now->format(DateTime::RFC2822);
		$headers['Return-Path'] = trim($this->sender());
			
		$headers['From'] = $this->formatAddress($mail->from(), $mail->charset());
			
		if (count($mail->to()) > 0)
			$headers['To'] = $this->formatAddresses($mail->to(), $mail->charset());
		elseif (count($mail->cc()) == 0)
		$headers['To'] = 'undisclosed-recipients:;';
			
		if (count($mail->cc()) > 0)
			$headers['Cc'] = $this->formatAddresses($mail->cc(), $mail->charset());
			
		if (count($mail->bcc()) > 0)
			$headers['Bcc'] = $this->formatAddresses($mail->bcc(), $mail->charset());
			
		if (count($mail->replyTo()) > 0)
			$headers['Reply-To'] = $this->formatAddresses($mail->replyTo(), $mail->charset());
			
		$headers['Subject'] = $this->encodeHeaderString($mail->subject(), $mail->charset());
			
		$hostname = $this->hostname();
		if ($hostname == '') {
			if ($_SERVER['SERVER_NAME'] != '')
				$hostname = $_SERVER['SERVER_NAME'];
			else
				$hostname = 'localhost.localdomain';
		}
			
		$headers['Message-ID'] = '<' . $uniqid . '@' . $hostname . '>';
		$headers['X-Priority'] = $mail->priority();
		$headers['X-Mailer'] = 'API PHP Mailer [version ' . self::VERSION . ']';
			
		if ($mail->confirmReadingTo() !== null)
			$headers['Disposition-Notification-To'] = $this->formatAddress($mail->confirmReadingTo());
			
		foreach($mail->headers() as $var => $string)
			$headers[trim($var)] = $this->encodeHeaderString(trim($string));
			
		$headers['MIME-Version'] = '1.0';
			
		switch ($mail->messageType()) {
			case Mail::MESSAGE_TYPE_PLAIN:
				$headers['Content-Transfer-Encoding'] = $mail->encoding();
				$headers['Content-Type'] = ($mail->html() ? 'text/html' : 'text/plain') . '; charset="' . $mail->charset() . '"';
				break;

			case Mail::MESSAGE_TYPE_ATTACHMENT:
			case Mail::MESSAGE_TYPE_ALT_ATTACHMENT:
				if ($mail->inlineImageExists())
					$headers['Content-Type'] = 'multipart/related;' . self::LE . "\ttype=\"text/html\";" . self::LE . "\tboundary=\"b1_" . $uniqid . "\"";
				else
					$headers['Content-Type'] = 'multipart/mixed;' . self::LE . "\tboundary=\"b1_" . $uniqid . '"';
				break;

			case Mail::MESSAGE_TYPE_ALT:
				$headers['Content-Type'] = 'multipart/alternative;' . self::LE . "\tboundary=\"b1_" . $uniqid . '"';
				break;
		}
			
		switch($this->mailing->mechanism) {
			case 'mail':
				unset($headers['To']);
				unset($headers['Subject']);
				break;

			case 'qmail':
			case 'smtp':
				unset($headers['Cc']);
				unset($headers['Bcc']);
		}
			
		$result = '';
		foreach ($headers as $key => $value)
			$result .= $key . ': ' . $value . self::LE;
			
		return $result;
	}

	private function createMessageContent(Mail $mail, $uniqid) {
		$result = '';

		switch($mail->messageType()) {
			case Mail::MESSAGE_TYPE_PLAIN:
				$body = $mail->wordWrap() > 0 ? $this->wrapText($mail->body(), $mail->wordWrap()) : $mail->body();
					
				$result = $this->encodeString($body, $mail->encoding());
				break;

			case Mail::MESSAGE_TYPE_ALT:
				$altBody = $mail->wordWrap() > 0 ? $this->wrapText($mail->altBody(), $mail->wordWrap()) : $mail->altBody();
					
				$result = $this->boundary('b1_' . $uniqid, $mail->charset(), 'text/plain', $mail->encoding())
				. self::LE
				. $this->encodeString($altBody, $mail->encoding())
				. self::LE . self::LE
				. $this->boundary('b1_' . $uniqid, $mail->charset(), 'text/html', $mail->encoding())
				. self::LE
				. $this->encodeString($mail->body(), $mail->encoding())
				. self::LE . self::LE
				. self::LE . '--b1_' . $uniqid . '--' . self::LE;
				break;

			case Mail::MESSAGE_TYPE_ATTACHMENT:
				$body = $mail->wordWrap() > 0 ? $this->wrapText($mail->body(), $mail->wordWrap()) : $mail->body();
					
				$result = $this->boundary('b1_' . $uniqid, $mail->charset(), ($mail->html() ? 'text/html' : 'text/plain'), $mail->encoding())
				. self::LE
				. $this->encodeString($body, $mail->encoding())
				. self::LE . self::LE
				. $this->allAttachments($mail, $uniqid);
				break;

			case Mail::MESSAGE_TYPE_ALT_ATTACHMENT:
				$altBody = $mail->wordWrap() > 0 ? $this->wrapText($mail->altBody(), $mail->wordWrap()) : $mail->altBody();
					
				$result = '--b1_' . $uniqid . self::LE
				. 'Content-Type: multipart/alternative; ' . self::LE
				. "\tboundary=\"b2_" . $uniqid . '"' . self::LE . self::LE
				. $this->boundary('b2_' . $uniqid, $mail->charset(), 'text/plain', $mail->encoding()) . self::LE
				. self::LE
				. $this->encodeString($altBody, $mail->encoding())
				. self::LE . self::LE
				. $this->boundary('b2_' . $uniqid, $mail->charset(), 'text/html', $mail->encoding()) . self::LE
				. self::LE
				. $this->encodeString($mail->body(), $mail->encoding())
				. self::LE . self::LE
				. self::LE . '--b2_' . $uniqid . '--' . self::LE
				. $this->allAttachments($mail, $uniqid);
				break;
		}
			
		return $result;
	}

	public function send(Mail $mail, $singleTo = false) {
		if ($mail->recipientCount() == 0)
			throw new Exception('no recipient addresses provided');
			
		$contentType = strlen($mail->altBody()) > 0 ? 'multipart/alternative' : ($mail->html() ? 'text/html' : 'text/plain');
			
		$uniqid = md5(uniqid(time()));
		$header = $this->createMessageHeader($mail, $uniqid);
		$content = $this->createMessageContent($mail, $uniqid);
			
		if (!$content)
			return false;
			
		$message = $header . self::LE . $content;
		$options = $this->mailing->options;
		$options['single-to'] = $singleTo;
			
		switch($this->mailing->mechanism) {
			case 'sendmail':
				$this->sendBySendMail($mail, $header, $content, $options);
					
			case 'qmail':
				$this->sendByQMail($mail, $header, $content, $options);
				break;

			case 'smtp':
				$this->sendBySMTP($mail, $header, $content, $options);
				break;
					
			case 'mail':
			default:
				$this->sendByMail($mail, $header, $content, $options);
		}
	}

	public function close() {
		if ($this->smtpConnection !== null)
			$this->smtpConnection->close();
	}

	public function hostname() {
		if(!isset($_SERVER)) {
			$_SERVER = $HTTP_SERVER_VARS;

			if(!isset($_SERVER['REMOTE_ADDR']))
				$_SERVER = $HTTP_ENV_VARS;
		}
			
		if(isset($_SERVER['SERVER_NAME']))
			$hostname = $_SERVER['SERVER_NAME'];
		else
			$hostname = 'localhost.localdomain';
			
		return $hostname;
	}

	public function sender() {
		if (func_num_args() == 1)
			$this->sender = strval(func_get_arg(0));
			
		return $this->sender;
	}

	// Senders
	private function sendBySendMail(Mail $mail, $header, $content, $options) {
		if ($this->sender())
			$sendmail = sprintf("%s -oi -f %s -t", escapeshellcmd($options['command-line']), escapeshellarg($this->sender()));
		else
			$sendmail = sprintf("%s -oi -t", escapeshellcmd($options['command-line']));
			
		if(!@$mailer = popen($sendmail, 'w'))
			throw new Exception('failed to open process');

		fputs($mailer, $header);
		fputs($mailer, $content);
			
		$result = pclose($mailer) >> 8 & 0xff;
			
		if($result != 0)
			throw new Exception('process end with errors');
	}

	private function sendByQMail(Mail $mail, $header, $content, $options) {
		if ($this->sender())
			$sendmail = sprintf("%s -oi -f %s -t", escapeshellcmd($options['command-line']), escapeshellarg($this->sender()));
		else
			$sendmail = sprintf("%s -oi -t", escapeshellcmd($options['command-line']));
			
		if(!@$mailer = popen($sendmail, 'w'))
			throw new Exception('failed to open process');

		fputs($mailer, $header . self::LE);
		fputs($mailer, $content);
			
		$result = pclose($mailer) >> 8 & 0xff;
			
		if($result != 0)
			throw new Exception('process end with errors');
	}

	private function sendByMail(Mail $mail, $header, $content, $options) {
		$toArr = array();
		foreach ($mail->to() as $to)
			$toArr[] = $this->formatAddress($to, $mail->charset());
			
		if (!!$this->sender() && strlen(ini_get('safe_mode')) < 1) {
			$old_from = ini_get('sendmail_from');
			ini_set('sendmail_from', $this->sender());
			$params = sprintf("-oi -f %s", $this->sender());

			if ($options['single-to'] && count($toArr) > 1) {
				foreach ($toArr as $key => $val) {
					$subject = str_replace(array("\r", "\n"), array('', ''), trim($mail->subject()));
					$rt = @mail($val, $this->encodeHeaderString($subject), $content, $header . self::LE, $params);
				}
			}
			else {
				$subject = str_replace(array("\r", "\n"), array('', ''), trim($mail->subject()));
				$rt = @mail($to, $this->encodeHeaderString($subject), $content, $header . self::LE, $params);
			}
		}
		else {
			if ($options['single-to'] && count($toArr) > 1) {
				foreach ($toArr as $key => $val) {
					$subject = str_replace(array("\r", "\n"), array('', ''), trim($mail->subject()));
					$rt = @mail($val, $this->encodeHeaderString($subject), $content, $header . self::LE);
				}
			}
			else {
				$subject = str_replace(array("\r", "\n"), array('', ''), trim($mail->subject()));
				$rt = @mail($to, $this->encodeHeaderString($subject), $content, $header . self::LE);
			}
		}
			
		if (isset($old_from))
			ini_set('sendmail_from', $old_from);
			
		if(!$rt)
			throw new Exception('failed to perform mail()');
	}

	private function sendBySMTP(Mail $mail, $header, $content, $options) {
		if (empty($this->smtpConnection))
			$this->smtpConnection = new SMTPConnection();
			
		if ($options['smtp-debug'])
			$this->smtpConnection->debug(true);
			
		$hosts = explode(';', $options['host']);
		$connection = $this->smtpConnection->isConnected();
			
		foreach ($hosts as $host) {
			if ($connection)
				break;

			$hostinfo = array();
			if (preg_match('/^(.+):([0-9]+)$/', $host, $hostinfo)) {
				$host = $hostinfo[1];
				$port = intval($hostinfo[2]);
			}
			else {
				$host = $host;
				$port = intval($options['port']);
			}

			$this->smtpConnection->connect(((!empty($option['secure'])) ? $option['secure'] . '://' : '') . $host, $port, $options['timeout']);
			if ($options['helo'])
				$this->smtpConnection->hello($options['helo']);
			else
				$this->smtpConnection->hello($this->hostname());

			$connection = false;
			if ($options['auth']) {
				$this->smtpConnection->authenticate($options['username'], $options['password']);
				$connection = true;
			}
			else
				$connection = true;
		}
			
		if (!$connection)
			throw new Exception('failed to connect to SMTP server');
			
		$from = $mail->from();
		$smtpFrom = !$this->sender() ? $from['address'] : $this->sender();
		try {
			$this->smtpConnection->mail($smtpFrom);
		}
		catch(Exception $e) {
			$this->smtpConnection->reset();
			throw $e;
		}
			
		$badRcpt = array();
			
		foreach ($mail->to() as $to) {
			try {
				$this->smtpConnection->recipient($to['address']);
			}
			catch(Exception $e) {
				$badRcpt[] = $to;
			}
		}
			
		foreach ($mail->cc() as $cc) {
			try {
				$this->smtpConnection->recipient($cc['address']);
			}
			catch(Exception $e) {
				$badRcpt[] = $cc;
			}
		}
			
		foreach ($mail->bcc() as $bcc) {
			try {
				$this->smtpConnection->recipient($bcc['address']);
			}
			catch(Exception $e) {
				$badRcpt[] = $bcc;
			}
		}
			
		if(count($badRcpt) > 0)
			throw new Exception('recipients failed: ' . $this->formatAddresses($badRcpt, 'UTF-8'));
			
		try {
			$this->smtpConnection->data($header . self::LE . $content);
		}
		catch(Exception $e) {
			$this->smtpConnection->reset();
			throw $e;
		}
			
		if ($options['smtp-keep-alive'])
			$this->smtpConnection->reset();
		else
			$this->smtpConnection->close();
	}

	// String handling
	private function formatAddress($address, $charset) {
		if (empty($address['name']))
			return str_replace(array("\r", "\n"), array('', ''), trim($address['address']));
		else {
			$name = str_replace(array("\r", "\n"), array('', ''), trim($address['name']));
			$address = str_replace(array("\r", "\n"), array('', ''), trim($address['address']));
			return $this->encodeHeaderString($name, $charset, 'phrase') . " <" . $address . ">";
		}
	}

	private function formatAddresses($addresses, $charset) {
		$arr = array();
		foreach($addresses as $address)
			$arr[] = $this->formatAddress($address, $charset);
			
		return implode(', ', $arr);
	}

	private function encodeHeaderString($string, $charset, $position = 'text') {
		$position = strtolower(trim($position));
			
		$x = 0;
			
		switch($position) {
			case 'phrase':
				if (!preg_match('/[\200-\377]/', $string)) {
					$encoded = addcslashes($string, "\0..\37\177\\\"");
					return ($string == $encoded && !preg_match('/[^A-Za-z0-9!#$%&\'*+\/=?^_`{|}~ -]/', $string)) ?
					$encoded :
					'"' . $encoded . '"';
						
				}
				$x = preg_match_all('/[^\040\041\043-\133\135-\176]/', $string, $matches);
				break;
					
			case 'comment':
				$x = preg_match_all('/[()"]/', $string, $matches);
			case 'text':
			default:
				$x += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/', $string, $matches);
		}
			
		if ($x == 0)
			return $string;
			
		$maxlen = 75 - 7 - strlen($charset);
		if (strlen($string)/3 < $x) {
			$encoding = 'B';
			$encoded = base64_encode($string);
			$maxlen -= $maxlen % 4;
			$encoded = trim(chunk_split($encoded, $maxlen, "\n"));
		}
		else {
			$encoding = 'Q';
			$encoded = $this->encodeQ($string, $position);
			$encoded = $this->wrapText($encoded, $maxlen, true);
			$encoded = str_replace('=' . self::LE, "\n", trim($encoded));
		}
			
		$encoded = preg_replace('/^(.*)$/m', ' =?' . $charset . '?' . $encoding . '?\\1?=', $encoded);
		$encoded = trim(str_replace("\n", self::LE, $encoded));
			
		return $encoded;
	}

	private function encodeString($string, $encoding = 'base64') {
		$encoding = strtolower(trim($encoding));
		$encoded = '';
			
		switch($encoding) {
			case 'base64':
				$encoded = chunk_split(base64_encode($string), 76, self::LE);
				break;

			case '7bit':
			case '8bit':
				$encoded = $this->fixEOL($string);
					
				if (substr($encoded, -(strlen(self::LE))) != self::LE)
					$encoded .= self::LE;
					
				break;

			case 'binary':
				$encoded = $string;
				break;

			case 'quoted-printable':
				$encoded = $this->encodeQP($str);
				break;

			default:
				throw new Exception('unknown encoding');
				break;
		}
			
		return $encoded;
	}

	private function encodeFile($path, $encoding = 'base64') {
		if (!is_file($path))
			throw new Exception('file not found');

		$content = @file_get_contents($path);
			
		return $this->encodeString($content, $encoding);
	}

	private function encodeQ($string, $position = 'text') {
		$position = strtolower(trim($position));
			
		$encoded = preg_replace('[\r\n]', '', $string);
			
		switch($position) {
			case 'phrase':
				$encoded = preg_replace('/([^A-Za-z0-9!*+\/ -])/e', "'='.sprintf('%02X', ord('\\1'))", $encoded);
				break;

			case 'comment':
				$encoded = preg_replace('/([\(\)\"])/e', "'='.sprintf('%02X', ord('\\1'))", $encoded);
			case 'text':
			default:
				$encoded = preg_replace('/([\000-\011\013\014\016-\037\075\077\137\177-\377])/e', "'='.sprintf('%02X', ord('\\1'))", $encoded);
				break;
		}
			
		$encoded = str_replace(' ', '_', $encoded);
			
		return $encoded;
	}

	private function encodeQP($input = '', $lineMax = 76, $spaceConv = false) {
		$hex = str_split('0123456789ABCDEF');
		$lines = preg_split('/(?:\r\n|\r|\n)/', $input);
			
		$eol = "\r\n";
		$escape = '=';
			
		$output = '';
			
		while (list(, $line) = each($lines)) {
			$linlen = strlen($line);
			$newline = '';

			for ($i = 0; $i < $linlen; $i++) {
				$c = substr($line, $i, 1);
				$dec = ord($c);
					
				if (($i == 0) && ($dec == 46))
					$c = '=2E';
					
				if ($dec == 32) {
					if ($i == ($linlen - 1) || $spaceConv)
						$c = '=20';
				}
				else if ($dec == 61 || $dec < 32 || $dec > 126) {
					$h2 = floor($dec / 16);
					$h1 = floor($dec % 16);
					$c = $escape . $hex[$h2] . $hex[$h1];
				}
					
				if (strlen($newline) + strlen($c) >= $lineMax) {
					$output .= $newline . $escape . $eol;
					$newline = '';

					if ($dec == 46)
						$c = '=2E';
				}
					
				$newline .= $c;
			}

			$output .= $newline . $eol;
		}
			
		return trim($output);
	}

	private function wrapText($message, $length, $qpMode = false) {
		$soft_break = ($qpMode) ? sprintf(" =%s", self::LE) : self::LE;
			
		$message = $this->fixEOL($message);
			
		if (substr($message, -1) == self::LE)
			$message = substr($message, 0, -1);
			
		$line = explode(self::LE, $message);
			
		$message = '';
			
		for ($i = 0; $i < count($line); $i++) {
			$linePart = explode(' ', $line[$i]);

			$buf = '';
			for ($e = 0; $e < count($linePart); $e++) {
				$word = $linePart[$e];
					
				if ($qpMode and (strlen($word) > $length)) {
					$spaceLeft = $length - strlen($buf) - 1;

					if ($e != 0) {
						if ($spaceLeft > 20) {
							$len = $spaceLeft;

							if (substr($word, $len - 1, 1) == '=')
								$len--;
							elseif (substr($word, $len - 2, 1) == '=')
							$len -= 2;
							 
							$part = substr($word, 0, $len);
							$word = substr($word, $len);
							$buf .= ' ' . $part;
							$message .= $buf . sprintf("=%s", self::LE);
						}
						else
							$message .= $buf . $soft_break;

						$buf = '';
					}
						
					while (strlen($word) > 0) {
						$len = $length;

						if (substr($word, $len - 1, 1) == '=')
							$len--;
						elseif (substr($word, $len - 2, 1) == '=')
						$len -= 2;
							
						$part = substr($word, 0, $len);
						$word = substr($word, $len);
							
						if (strlen($word) > 0)
							$message .= $part . sprintf("=%s", self::LE);
						else
							$buf = $part;
					}
				}
				else {
					$buf_o = $buf;
					$buf .= ($e == 0) ? $word : (' ' . $word);
						
					if (strlen($buf) > $length and $buf_o != '') {
						$message .= $buf_o . $soft_break;
						$buf = $word;
					}
				}
			}
				
			$message .= $buf . self::LE;
		}

		return $message;
	}

	private function fixEOL($string) {
		$string = str_replace(array("\r\n", "\r"), array("\n", "\n"), $string);
		$string = str_replace("\n", self::LE, $string);
		return $string;
	}

	private function boundary($boundary, $charSet, $contentType, $encoding) {
		$result = '--' . $boundary . self::LE
		. 'Content-Type: ' . $contentType . '; charset="' . $charSet . '"' . self::LE
		. 'Content-Transfer-Encoding: ' . $encoding . self::LE;
		return $result;
	}

	private function allAttachments(Mail $mail, $uniqid) {
		$result = '';
			
		foreach($mail->attachments() as $attachment) {
			$result .= '--b1_' . $uniqid . self::LE
			. 'Content-Type: ' . $attachment['type'] . '; name="' . $attachment['name'] . '"' . self::LE
			. 'Content-Transfer-Encoding: ' . $attachment['encoding'] . self::LE;
				
			if($attachment['disposition'] == 'inline')
				$result .= 'Content-ID: <' . $attachment['cid'] . '>' . self::LE;
				
			$result .= 'Content-Disposition: ' . $attachment['disposition'] . '; filename="' . $attachment['name'] . '"' . self::LE . self::LE;
				
			if($attachment['string-attachment']) {
				$result .= $this->encodeString($attachment['source'], $attachment['encoding']);
				$result .= self::LE . self::LE;
			}
			else {
				$result .= $this->encodeFile($attachment['source'], $attachment['encoding']);
				$result .= self::LE . self::LE;
			}
		}

		$result .= '--b1_' . $uniqid . '--' . self::LE;

		return $result;
	}
}