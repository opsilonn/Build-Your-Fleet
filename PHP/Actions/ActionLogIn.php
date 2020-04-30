<?php
	session_start();
	include("../../PHP/utils/Database.php");

	if(isset($_POST["_Email"]) && isset($_POST["_Password"]))
	{
		$_Email = htmlspecialchars($_POST["_Email"]);
		$_Password = htmlspecialchars($_POST["_Password"]);

		$verification = $DATABASE->prepare("SELECT * FROM customer WHERE Email = ? && Password = ?");
		$verification->execute(array($_Email, $_Password));

		if($val = $verification->fetch())
		{
			// We memorize some values : the ID of the user, and whether he's an admin or not
			$_SESSION['_ID'] = $val['Customer_ID'];
			$_SESSION['_Is_Admin'] = $val['Is_Admin'];

			// We forward the user to the main page
			header("Location: ../../PHP/Pages/Mainpage.php", true, 301);
		}
		else
		{
			// We initialize a SESSION value that warns that the user failed the Login
			$_SESSION['loginFailed'] = true;

			// We forward the user to the login page
			header("Location: ../../PHP/Pages/Connection_Log_In.php", true, 301);
		}
	}
?>