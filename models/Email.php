<?php
namespace app\models;

use Yii;
class Email{
  
	public $emailHtml;
	public $emailText;
	public $from;
	public $to;
	public $subject;
	public $params;

	
	

	function __construct() {
		#$this->from = Yii::$app->params ['modUsuarios'] ['email'] ['emailActivacion']; 
		$this->from = "development@2gom.com.mx"; 
		$this->params = [
			"logoCliente" => "https://dev.2geeksonemonkey.com/marel-logistics/bright-star/web/webAssets/images/logo.png",
			"logoClienteH" =>"80px",
			"logoClienteW" => "auto",

			"colorTitle" => "#000",
			"colorSubtitle" => "#444",
			"colorText" => "#999",
			"colorLink" =>"blue",

			"user" => "Juan", // Usuario del titulo
			"usuario" => "juanito@mail.com",
			"password" => "12345678",

			"font" => "https://fonts.googleapis.com/css?family=Droid+Serif",
			"fontSize14" => "14px",
			"fontSize16" => "16px",
			"fontSize24" => "24px",

			"bgHeader" => "rgba(184,14,41)",
			"bgBody" => "#E2E2E2",
			"bgBodyWmax" => "460px",
			"bgBodyWmin" => "320px",
			"bgBox" => "#FFF",

			"btnText" => "#FFF",
			"btnBg" => "#B80E29",

			"url" => "https://2geeksonemonkey.com",

			"mailAyuda" => "soporte@bright-star.com",
			"crAuthor" => "&copy; Brightstar ",

			"logoAuthor" => "https://dev.2geeksonemonkey.com/marel-logistics/bright-star/web/webAssets/images/footer.png",
			"logoAuthorH" => "auto",
			"logoAuthorW" => "108px",
		];
	}

	/**
	 * Envia mensaje de correo electronico
	 *   	
	 * @return boolean
	 */
	public function sendEmail() {
		return Yii::$app->mailer->compose ( [
				// 'html' => '@app/mail/layouts/example',
				// 'text' => '@app/mail/layouts/text'
				'html' => $this->emailHtml,
				//'text' => $templateText 
		], $this->params )->setFrom ( $this->from )->setTo ( $this->to )->setSubject ( $this->subject )->send ();
	}
}