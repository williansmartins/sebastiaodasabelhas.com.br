<?php

// define constants
define("RECIPIENT_NAME", "xxx");
define("RECIPIENT_EMAIL", "professorwillians@gmail.com");
define("EMAIL_SUBJECT", "Visita no site do Tião");

// read form values
$send = false;
$name = isset($_POST['name']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name']) : "";
$email = isset($_POST['email']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email']) : "";
$message = isset($_POST['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message']) : "";

// check availability of values, then send mail
if ($name && $email && $message) {
	$recipient = RECIPIENT_NAME . " <" . RECIPIENT_EMAIL . ">";
	$headers = "From: " . $name . " <" . $email . ">";
	$send = mail($recipient, EMAIL_SUBJECT, $message, $headers);
}

// give responses to browser
if (isset($_GET["ajax"])) {
	echo $send ? "success" : "error";
} 

else {
// if js disabled, this will be shown
?>
<html>
	<head>
		<title>Mensagem</title>
	</head>
	<body>
		<?php if ( $send ) echo "<p>Mensagem enviada com sucesso!</p>" ?>
		<?php if ( !$send ) echo "<p>Houve um erro ao enviar a mensagem.</p>" ?>
		<p>Clique no botão voltar do Navegador para retornar ao site.</p>
	</body>
</html>
<?php
}
?>

