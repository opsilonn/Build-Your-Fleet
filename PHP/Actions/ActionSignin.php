<?php
	session_start();
	include("../../PHP/Utils/Database.php");

	if(isset($_POST["_First_Name"]))
	{
		$_Email = htmlspecialchars($_POST["_Email"]);

		$request = $DATABASE->prepare("SELECT * FROM customer WHERE Email = ?");
		$request->execute(array($_Email));

        // If the signin fails
		if($request->fetch())
		{
			// We initialize a SESSION value that warns that the user failed the signin
			$_SESSION['signinFailed'] = true;

			// We forward the user to the signin page
			header("Location: ../../PHP/Pages/Connection_Sign_In.php", true, 301);
		}
		else
		{
			// We insert the customer in the database
			$request = $DATABASE->prepare("INSERT INTO customer (F_Name, L_Name, Email, Password)
			 VALUES(:F_Name, :L_Name, :Email, :Password)");

			$request->execute(array(
					"F_Name" => $_POST["_First_Name"],
					"L_Name" => $_POST['_Last_Name'],
					"Email" => $_POST['_Email'],
					"Password" => $_POST['_Password']));

			
			// We get the ID from his newly created account
			$request = $DATABASE->prepare("SELECT * FROM customer WHERE Email = ?");
			$request->execute(array($_Email));
	
            $_SESSION['_ID'] = $request->fetch()['Customer_ID'];

			
			// We redirect the user to the mainpage
			header("Location: ../../PHP/Pages/Mainpage.php", true, 301);
		}
	}
?>