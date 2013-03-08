<?php
namespace CV\Model;

use Mail\Mail;
use Mail\Mailer;

class MailSender
{
	
	public static function sendHTMLMail($to, $from, $subject, $html)
	{
		$mail = new Mail();
		$mail->to($to);
		$mail->from("$from@centraldoveiculo.com.br");
		$mail->subject("Central do Veículo - $subject");
			
		$mail->html(true);
		$mail->body($html);
		$mail->altBody(strip_tags($html));
		
		$mailer = new Mailer('smtp', array(
			'host' => 'smtp.centraldoveiculo.com.br',
			'port' => 587,
			'username' => "$from@centraldoveiculo.com.br",
			'password' => 's3nh4central'
		));
		$mailer->send($mail);
		$mailer->close();
	}
	
}