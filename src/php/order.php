<?php
$email = $_POST['email'];
$tel = $_POST['tel'];
$name = $_POST['name'];
$massage = $_POST['message'];
$subject_email = 'Поступил заказ с сайта Smwood';
if(isset($_POST)) {
	var_dump($subject_email);
	$to = 'RomaLytar@gmail.com';
	$subject = $subject_email;
	$message = '
					Имя: '.$name.'. "\r\n" .
				    Email: '.$email.'. "\r\n" .
				    Телефон: '.$tel.'. "\r\n" .
				    Сообщение: '.$massage.'
                ';
	$headers = "Content-type: text/html; charset=utf-8 \r\n"; //Кодировка письма
	$headers .= "From:<romaLytar_domen@gmail.com>\r\n"; //Наименование и почта отправителя
	$check=mail($to, $subject, $message, $headers); //Отправка письма с помощью функции mail
	if($check)return 1; else return 0;
} else return 0;

