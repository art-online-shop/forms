<?php

if ($_POST['name'] != "" || $_POST['phone'] != "") {
	$to  = 'kianeemal@mail.ru'; // кому отправлять
	$subject = "Заявка с сайта asaptrans.ru";
	$message = '
	<html>
		<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Заявка с сайта asaptrans.ru</title>
		</head>
		<body>
			<p>Имя: '.$_POST['name'].'</p>
			<p>Телефон: '.$_POST['phone'].'</p>
			<p>E-mail: '.$_POST['email'].'</p>
			<p>Услуга: '.$_POST['service'].'</p>
		</body>
	</html>';

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= "Content-type: text/html; charset=utf-8 \r\n";
	$headers .= "From: Asaptrans <info@asaptrans.ru>\r\n";
		
	$result = mail($to, $subject, $message, $headers);

	if ($result) {
		$response = array(
			"status" => "ok",
			"message" => "Спасибо! Мы свяжемся с вами в ближайшее время."
		);
	} else {
		$response = array(
			"status" => "fail",
			"message" => "Произошла ошибка. Попробуйте позже."
		);
	}

	echo json_encode($response);
}

?>
