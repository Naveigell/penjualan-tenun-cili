# mailer/myapp/application/config/email.php
<?php

defined('BASEPATH') OR exit('No direct script access allowed');
$config = [
//	 'protocol' => 'smtp',
//	 'smtp_host' => 'smtp.mailtrap.io',
//	 'smtp_port' => 2525,
//	 'smtp_user' => '33249ada4176e4',
//	 'smtp_pass' => '3b905064e9aa47',
//	 'crlf' => "\r\n",
//	 'newline' => "\r\n",
//	 'mailtype' => 'html'

	'protocol' => 'smtp',
	'smtp_host' => 'smtp-relay.sendinblue.com',
	'smtp_port' => 587,
	'smtp_user' => 'nbwrya@gmail.com',
	'smtp_pass' => 'mM74hL6R2vzrsWSk',
	'crlf' => "\r\n",
	'newline' => "\r\n",
	'mailtype' => 'html',
];
