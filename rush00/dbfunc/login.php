<?php
session_start();
include "auth.php";
include "create.php";
include "check_admin.php";

function put_login_form()
{
	echo '<form name="login.php" action="'.$_SERVER['PHP_SELF'].'" method="POST">';
	echo 'Username: <input name="login" value="" />';
	echo 'Password: <input name="passwd" value="" />';
	echo '<input type="submit" name="submit" value="signin" />';
	echo '<input type="submit" name="submit" value="sign up" />';
	echo '</form>';
}

function put_welcome()
{
	echo "welcome ".$_SESSION['logged_on_user'];
	echo '<form name="loginout.php" action="'.$_SERVER['PHP_SELF'].'" method="POST">';
	echo '<input type="submit" name="logout" value="logout" />';
	echo '</form>';

	$accounts = unserialize(file_get_contents("privdb/users"));
	if (check_admin($accounts, $_SESSION['logged_on_user']))
		echo '<a href="admin.php"> admin page </a>';
}

function logout()
{
	$_SESSION["logged_on_user"] = "";
	header("Location: store.php");
    die();
}


function login(){
	if (isset($_POST["logout"]) && $_POST["logout"] == "logout")
	{
		logout();
		put_login_form();
	}
	else if (isset($_SESSION["logged_on_user"]) && $_SESSION["logged_on_user"])
	{
		put_welcome();

	}
	else if (isset($_POST["login"]) && isset($_POST["passwd"]) && $_POST["submit"]=="signin")
	{
		$login = $_POST["login"];
		$passwd = $_POST["passwd"];

	
		if (auth($login, $passwd))
		{
			$_SESSION["logged_on_user"] = $login;
			put_welcome();
		}
		else
		{
			$_SESSION["logged_on_user"] = "";
			echo "Sorry, Wrong Username or password";
			put_login_form();
		}
	}
	else if ($_POST["submit"] == "sign up")
	{
		if (signup())
		{
			$_SESSION["logged_on_user"] = $_POST["login"];
			put_welcome();
		}
		else
		{
			echo "Username already exists or form is blank";
			put_login_form();
		}
	}
	else
	{
		put_login_form();
	}
}

?>