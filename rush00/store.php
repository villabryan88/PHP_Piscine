<?php
session_start();
include('store_filter.php');
include('navbar.php');

	$flag = FALSE;
	if ($_GET['buy'] == "big site")
	{
		foreach ($_SESSION['cart'] as $item => &$value)
			if ($item == "big site")
			{
				$value++;
				$flag = TRUE;
			}
		if (!$flag)
			$_SESSION['cart'][$_GET['buy']] = 1;
	}
	else if ($_GET['buy'] == 'good stuff')
		foreach ($_SESSION['cart'] as $item => &$value)
			if ($item == "good stuff")
			{
				$value++;
				$flag = TRUE;
			}
		if (!$flag)
			$_SESSION['cart'][$_GET['buy']] = 1;
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
make_header('store');
?>
<div class="store">
	<h1>PURCHASE OUR CHEAP SERVICE!</h1>
	<p>Nonrefundable.</p>
	<?php
		$all_filters = array( 'weeb');
		store_filter_spawn($all_filters);
	$filters = array('big');
		store_filter($filters);


	?>
</div>
</body>
</html>
