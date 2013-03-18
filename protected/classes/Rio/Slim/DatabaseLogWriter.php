<?php
namespace Rio\Slim;

use Slim\Log;
use Slim\LogWriter;

class DatabaseLogWriter extends LogWriter
{
	private $pdo;
	private $map;
	
	public function __construct(\PDO &$pdo)
	{
		$this->pdo = &$pdo;
		$this->map = array(
			Log::DEBUG => E_NOTICE,
			Log::ERROR => E_RECOVERABLE_ERROR,
			Log::FATAL => E_ERROR,
			Log::INFO => E_NOTICE,
			Log::WARN => E_WARNING
		);
	}
	
	public function write($message, $level = NULL)
	{
		if ($level === null)
			$level = Log::INFO;
		
		try {
			$stmt = $this->pdo->prepare(
			  "INSERT INTO logs.erros(type, message, file, line, timestamp, extrainfo) " .
			  "VALUES(:type, :message, NULL, NULL, EXTRACT(epoch FROM NOW()), :extrainfo)"
			);
			$stmt->execute(array(
				'type' => $this->map[$level],
				'message' => strval($message),
				'extrainfo' => $_SERVER['REQUEST_URI']
			));
		}
		catch (\PDOException $e) {}
	}
	
}