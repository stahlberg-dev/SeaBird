<?php 

$order = $_POST['feedback_title'];
$name = $_POST['feedback_name'];
$phone = $_POST['feedback_phone'];
$email = $_POST['feedback_e_mail'];
$comment = $_POST['feedback_comment'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

// $mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'r44ds@mail.ru';                 // Наш логин
$mail->Password = 'fjruvmdk47';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('r44ds@mail.ru', 'SeaBird');   // От кого письмо 
$mail->addAddress('seabird.adm@gmail.com');     // Add a recipient                
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заказ';                       // тема письма
$mail->Body = "
				<body>
					<p>Наименование товара: <b>$order</b></p>
					<p>Контактные данные клиента:</p>
					<p>Имя: <b>$name</b></p>
					<p>Номер телефона: <b>$phone</b></p>
					<p>E-mail: <b>$email</b></p>
					<p>Содержание сообщения:</p>
					<p><b>$comment</b></p>
				</body>
";

if(!$mail->send()) {
    return false;
} else {
    return true;
}

?>