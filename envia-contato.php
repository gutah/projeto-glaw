<?php
session_start();
$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("PHPMailerAutoload.php");

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "????";
$mail->Password = "????";

$mail->setFrom("contato.glaw@gmail.com", "Contato Loja");
$mail->addAddress("contato.glaw@gmail.com");
$mail->Subject = "Email de contato da loja";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem: {$mensagem}</html>");
$mail->AltBody = "de: {$nome}\nemail:{$email}\nmensagem: {$mensagem}";

/*} catch (phpmailerException $e) {
    $_SESSION["danger"] = "Erro ao enviar mensagem: " . $e->errorMessage();
    header("Location: index.php");
} catch (Exception $e) {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $e->ErrorInfo;
    header("Location: index.php");
}
die();
*/
if($mail->send()) {
    $_SESSION["success"] = "Mensagem enviada com sucesso";
    header("Location: index.php");
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    header("Location: index.php");
}
die();