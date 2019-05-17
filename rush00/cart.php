<?php

?>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>memes go here</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/store.css" />
    <script src="main.js"></script>
</head>
<body>
<?php
include('navbar.php');
make_header('cart');
?>
<div class="store">
	<?php
		session_start();
		if ($_GET['buy'] == "reset")
			unset($_SESSION['cart']);
		if ($_GET['send'] == "SUBMIT" && $_SESSION["logged_on_user"])
		{
			$push = serialize($_SESSION['cart']);
			mkdir("orders/");
			file_put_contents("./orders/" . $_SESSION["logged_on_user"], $push);
			unset($_SESSION['cart']);
		}
		foreach ($_SESSION['cart'] as $item => $key)
			echo "$key: $item <br/>";
	?>
	<a href="cart.php?buy=reset"><div>RESET ME BABY</div></a>
	<a href="cart.php?send=SUBMIT"><div>SUBMIT ME BABY</div></a>
</div> <!-- todo: make cart populate -->
</body>
</html>
