 require 'PHPMailerAutoload.php';
        
      if (isset($_POST['assunto']) && !empty($_POST['assunto'])) {
                $assunto = $_POST['assunto'];
      }
       if (isset($_POST['mensagem']) && !empty($_POST['mensagem'])) {
                 $mensagem = $_POST['mensagem'];
      }
       
$mail = new PHPMailer;
    
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'exemplo@gmail.com';
$mail->Password = 'senha';
$mail->Port = 587;
     

$mail->setFrom('juniorz@gmail.com');
$mail->addReplyTo('momadejunior584@gmail.com');
$mail->addAddress('momadejunior584@gmail.com', 'Momade Junior');

$mail->isHTML(true);
$mail->Subject = 'Assunto do email';
$mail->Body    = 'Este é o conteúdo da mensagem em <b>HTML!</b>';
$mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');

$mail->SMTPDebug = 3;
$mail->Debugoutput = 'html';
$mail->setLanguage('pt');


if(!$mail->send()) {
    echo 'Não foi possível enviar a mensagem.<br>';
    echo 'Erro: ' . $mail->ErrorInfo;
} else {
    echo 'Mensagem enviada.';
}
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="index.php" method="post">
          <input type="text" name="assunto" placeholder="Assunto">
          <input type="text" name="mensagem" placeholder="Mensagem">
          <input type="submit" name="Enviar">
</form>
</body>
</html>
