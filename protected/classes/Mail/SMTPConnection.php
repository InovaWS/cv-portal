<?php
namespace Mail;

class SMTPConnection {
	const CRLF = "\r\n";
	const DEFAULT_PORT = 25;

	const VERBOSE_NOTICE = 1;
	const VERBOSE_WARNING = 2;
	const VERBOSE_ERROR = 3;
	const VERBOSE_FROM_SERVER = 4;

	private $debug = false;
	private $verp = false;
	private $connection = null;
	private $helloReply = null;

	public function __construct() {
	}

	public function debug() {
		if (func_num_args() == 1) {
			$this->debug = !!func_get_arg(0);
			return $this;
		}
		return $this->debug;
	}

	public function verp() {
		if (func_num_args() == 1) {
			$this->verp = !!func_get_arg(0);
			return $this;
		}
		return $this->verp;
	}

	protected function verbose($string, $level = self::VERBOSE_NOTICE) {
		if ($this->debug()) {

			switch ($level) {
				case self::VERBOSE_ERROR:
					echo 'SMTP -> ERROR: ' . $string . "\n";
					break;
						
				case self::VERBOSE_WARNING:
					echo 'SMTP -> WARNING: ' . $string . "\n";
					break;

				case self::VERBOSE_FROM_SERVER:
					echo 'SMTP -> FROM SERVER: ' . $string . "\n";
					break;
						
				case self::VERBOSE_NOTICE:
				default:
					echo 'SMTP -> NOTICE: ' . $string . "\n";
			}
		}
	}

	public function isConnected() {
		if ($this->connection !== null) {
			$sock_status = stream_get_meta_data($this->connection);

			if ($sock_status['eof']) {
				$this->verbose('EOF caught while checking if connected', self::VERBOSE_NOTICE);
				$this->close();
					
				return false;
			}

			return true;
		}
			
		return false;
	}

	public function connect($host, $port = false, $timeout = 30) {
		if ($this->isConnected()) {
			$this->verbose('Already connected to a server', self::VERBOSE_NOTICE);
			throw new Exception('Already connected to a server');
		}
			
		if (empty($port))
			$port = self::DEFAULT_PORT;
			
		$this->connection = fsockopen($host, $port, $errno, $errstr, $timeout);
			
		if (empty($this->connection)) {
			$this->connection = null;
			$this->verbose('Failed to connect to server: [' . $errno . '] '. $errstr, self::VERBOSE_ERROR);
			throw new Exception('Failed to connect to server: [' . $errno . '] '. $errstr);
		}

		if (substr(PHP_OS, 0, 3) != 'WIN')
			stream_set_timeout($this->connection, $timeout, 0);

		$announce = $this->getLines();
		$this->verbose($announce, self::VERBOSE_FROM_SERVER);
			
		return true;
	}

	public function close() {
		$this->helloReply = null;
			
		if (!empty($this->connection)) {
			fclose($this->connection);
			$this->connection = null;
		}
	}

	public function authenticate($username, $password) {
		if (!$this->isConnected()) {
			$this->verbose('Called authenticate() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called authenticate() without being connected');
		}
			
		$this->command('AUTH LOGIN', $code, $reply);
			
		if($code != 334) {
			$this->verbose('AUTH not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('AUTH not accepted from server: ' . $reply);
		}
			
		$this->command(base64_encode($username), $code, $reply);
			
		if($code != 334) {
			$this->verbose('Username not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('Username not accepted from server: ' . $reply);
		}
			
		$this->command(base64_encode($password), $code, $reply);
			
		if($code != 235) {
			$this->verbose('Password not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('Password not accepted from server: ' . $reply);
		}
			
		return true;
	}

	public function data($msgData) {
		if (!$this->isConnected()) {
			$this->verbose('Called data() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called data() without being connected');
		}
			
		$this->command('DATA', $code, $reply);

		if($code != 354) {
			$this->verbose('DATA command not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('DATA command not accepted from server: ' . $reply);
		}
			
		$msgData = str_replace("\r\n", "\n", $msgData);
		$msgData = str_replace("\r", "\n", $msgData);
		$lines = explode("\n", $msgData);
			
		$field = substr($lines[0], 0, strpos($lines[0], ':'));
		$inHeaders = (!empty($field) && !strstr($field, ' '));
			
		$maxLineLength = 998;
			
		while(list(,$line) = @each($lines)) {
			$linesOut = null;
			if($line == '' && $inHeaders)
				$inHeaders = false;
			 
			while(strlen($line) > $maxLineLength) {
				$pos = strrpos(substr($line, 0, $maxLineLength), ' ');
					
				if(!$pos)
					$pos = $maxLineLength - 1;
					
				$linesOut[] = substr($line, 0, $pos);
				$line = substr($line, $pos + 1);
					
				if($inHeaders)
					$line = "\t" . $line;
			}

			$linesOut[] = $line;

			while(list(,$lineOut) = @each($linesOut)) {
				if(strlen($lineOut) > 0) {
					if(substr($lineOut, 0, 1) == ".")
						$lineOut = "." . $lineOut;
				}
					
				fputs($this->connection, $lineOut . self::CRLF);
			}
		}
			
		$this->command(self::CRLF . '.', $code, $reply);
			
		if ($code != 250) {
			$this->verbose('DATA not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('DATA not accepted from server: ' . $reply);
		}
		 
		return true;
	}

	public function expand($name) {
		if (!$this->isConnected()) {
			$this->verbose('Called expand() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called expand() without being connected');
		}
			
		$this->command('EXPN ' . $name, $code, $reply);
			
		if($code != 250) {
			$this->verbose('EXPN not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('EXPN not accepted from server: ' . $reply);
		}
			
		$entries = explode(self::CRLF, $reply);
		while(list(,$l) = @each($entries))
			$list[] = substr($l,4);
			
		return $list;
	}

	public function hello($host = '') {
		if (!$this->isConnected()) {
			$this->verbose('Called hello() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called hello() without being connected');
		}
			
		if(empty($host))
			$host = 'localhost';
			
		if(!$this->sendHello('EHLO', $host)) {
			if(!$this->sendHello('HELO', $host)) {
				throw new Exception($hello . ' not accepted from server');
			}
		}
			
		return true;
	}

	private function sendHello($hello, $host) {
		$this->command($hello . ' ' . $host, $code, $reply);
		if($code != 250)
			$this->verbose('SMTP -> ERROR: ' . $hello . ' not accepted from server: ' . $reply);
			
		$this->helloReply = $reply;
			
		return true;
	}

	public function help($keyword = '') {
		if (!$this->isConnected()) {
			$this->verbose('Called help() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called help() without being connected');
		}
			
		$extra = empty($keyword) ? '' : (' ' . $keyword);
			
		$this->command('HELP' . $extra, $code, $reply);
			
		if($code != 211 && $code != 214) {
			$this->verbose('HELP not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('HELP not accepted from server: ' . $reply);
		}
			
		return $reply;
	}

	public function mail($from) {
		if (!$this->isConnected()) {
			$this->verbose('Called mail() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called mail() without being connected');
		}
			
		$useVerp = ($this->verp ? 'XVERP' : '');
			
		$this->command('MAIL FROM:<' . $from . '>' . $useVerp, $code, $reply);
			
		if($code != 250) {
			$this->verbose('MAIL not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('MAIL not accepted from server: ' . $reply);
		}
			
		return true;
	}

	public function noop() {
		if (!$this->isConnected()) {
			$this->verbose('Called noop() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called noop() without being connected');
		}
			
		$this->command('NOOP', $code, $reply);

		if($code != 250) {
			$this->verbose('NOOP not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('NOOP not accepted from server: ' . $reply);
		}
			
		return true;
	}

	public function quit($closeOnError = true) {
		if (!$this->isConnected()) {
			$this->verbose('Called quit() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called quit() without being connected');
		}
			
		$this->command('quit', $code, $reply);
			
		if($code != 221) {
			$this->verbose('SMTP server rejected quit command: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('SMTP server rejected quit command: ' . $reply);
		}
			
		$this->close();
			
		return true;
	}

	public function recipient($to) {
		if (!$this->isConnected()) {
			$this->verbose('Called recipient() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called recipient() without being connected');
		}
			
		$this->command('RCPT TO:<' . $to . '>', $code, $reply);
			
		if($code != 250 && $code != 251) {
			$this->verbose('RCPT not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('RCPT not accepted from server: ' . $reply);
		}
			
		return true;
	}

	public function reset() {
		if (!$this->isConnected()) {
			$this->verbose('Called reset() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called reset() without being connected');
		}
			
		$this->command('RSET', $code, $reply);
			
		if($code != 250) {
			$this->verbose('RSET failed: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('RSET failed: ' . $reply);
		}
			
		return true;
	}

	public function send($from) {
		if (!$this->isConnected()) {
			$this->verbose('Called send() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called send() without being connected');
		}
			
		$this->command('SEND FROM:' . $from, $code, $reply);
			
		if($code != 250) {
			$this->verbose('SEND not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('SEND not accepted from server: ' . $reply);
		}
			
		return true;
	}

	public function sendAndMail($from) {
		if (!$this->isConnected()) {
			$this->verbose('Called sendAndMail() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called sendAndMail() without being connected');
		}
			
		$this->command('SAML FROM:' . $from, $code, $reply);
			
		if($code != 250) {
			$this->verbose('SAML not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('SAML not accepted from server: ' . $reply);
		}
			
		return true;
	}

	public function sendOrMail($from) {
		if (!$this->isConnected()) {
			$this->verbose('Called sendOrMail() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called sendOrMail() without being connected');
		}
			
		$this->command('SOML FROM:' . $from, $code, $reply);
			
		if($code != 250) {
			$this->verbose('SOML not accepted from server: ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('SOML not accepted from server: ' . $reply);
		}
			
		return true;
	}

	public function turn() {
		$this->verbose('This method, TURN, of the SMTP is not implemented', self::VERBOSE_WARNING);
		return false;
	}

	public function verify($name) {
		if (!$this->isConnected()) {
			$this->verbose('Called verify() without being connected', self::VERBOSE_ERROR);
			throw new Exception('Called verify() without being connected');
		}
			
		$this->command('VRFY:' . $from, $code, $reply);
			
		if($code != 250 && $code != 251) {
			$this->verbose('VRFY failed on name \'' . $name . '\': ' . $reply, self::VERBOSE_ERROR);
			throw new Exception('VRFY failed on name \'' . $name . '\': ' . $reply);
		}
			
		return $reply;
	}

	private function getLines() {
		$data = '';
			
		while($str = @fgets($this->connection, 515)) {
			//$this->verbose("SMTP -> get_lines(): \$data was \"$data\"", self::VERBOSE_NOTICE);
			//$this->verbose("SMTP -> get_lines(): \$str is \"$str\"", self::VERBOSE_NOTICE);

			$data .= $str;
			//$this->verbose("SMTP -> get_lines(): \$data is \"$data\"", self::VERBOSE_NOTICE);

			if(substr($str, 3, 1) == ' ')
				break;
		}
			
		return $data;
	}

	private function command($string, &$code, &$reply) {
		fputs($this->connection, $string . self::CRLF);
		$reply = $this->getLines();
		$code = intval(substr($reply, 0, 3));
			
		$this->verbose($reply, self::VERBOSE_FROM_SERVER);
	}
}