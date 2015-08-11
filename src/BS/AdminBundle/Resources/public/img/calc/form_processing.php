<meta charset="UTF-8">
<?php
if($_POST['submit']){

	$cena = $_POST['cena']);
	$skidka = $_POST['skidka']);
	$name = $_POST['name']);
	$pochta = $_POST['email']);
	$tel = $_POST['tel']);

	$email = "lolly4@mail.ru";

	$message_to_myemail = "
	Цена = $proizvoditel (с учётом скидки $skidka %)\r\n
	Имя заказчика: $name \r\n
	Почта: $pochta \r\n
	Телефон: $tel";
	$from  = "Заказ на сайт-визитку"; 
	mail($email, $from, $message_to_myemail);
}
echo "Ваша заявка была успешна отправлена.";
?>

