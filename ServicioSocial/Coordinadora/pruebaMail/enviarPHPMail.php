<?php
require ("class.phpmailer.php");
require ("class.smtp.php");
$mail = new PHPMailer(TRUE); //Objeto de PHPMailer

include '../../Utilerias/generarPass.php';
$genera = new Utilerias();
$pass = $genera->genera_password();
//$md5 = $genera->genera_md5($pass);

$de = 'coordinacion';
$para="jose_eslifer_23@hotmail.com";//$_GET["email"];
$asunto = 'Contraseña';
$mensaje = $pass;

//$cabeceras = "MIME-Version: 1.0\r\n";
//$cabeceras .= "Content-type: text/html; charset=ISO-8859-1\r\n";
//$cabeceras .= "From: $de \r\n";
////Trabajando con PHPMailer
$mail->IsHTML=true;  
$mail->IsSMTP;
$mail->SmtpConnect();
$mail->Helo = "www.hotmail.com.mx";
$mail->SMTPAuth = "true"; //Autentificacion de SMTP
$mail->SMTPSecure = "tls"; //SSL socket layer
$mail->Host = "smtp.live.com"; //Servidor de SMTP 
$mail->Port = 465; // 465
$mail->From = $de; //Remitente (En mi variable)
$mail->AddAddress($para); //Destinatario
$mail->Username = "beliko00@hotmail.com"; 
$mail->Password = 'guadalupe23'; //Aqui va la contraseña valida de tu correo
$mail->Subject = $asunto; //El asunto de correo
$mail->Body = $pass;//$mensaje; //El mensaje de correo
$mail->WordWrap = 50; //# de columnas
$mail->MsgHTML = $mensaje; //Se indica que el cuerpo del correo tendra formato HTML

if ($mail->Send()) {//Enviamos el correo por PHPMailer
    $respuesta = "El mensaje a sido enviado desde tu cuenta ";
} else {
    $respuesta = "El mensaje no a sido enviado :( ";
}
echo $respuesta.$pass;
?>