<!DOCTYPE html>
<link rel="stylesheet" href="../CSS/Button_Small.css"/>

<?php
	session_start();
	if(!isset($_SESSION['_ID'])) $_SESSION['_ID']=-1;

	if($_SESSION['_ID']==-1)
	{
		echo "<br>
		<div style=\"min-width:1200px; margin:auto;\">

                 <!-- SIGN-IN BUTTON -->
            <a href=\"Connection_Sign_In.php\">
	            <div class=\"Button_Small\">
	                <span>Sign In</span> 
	            </div>
	        </a> 

	        <br>

                <!-- LOG-IN BUTTON -->
            <a  href=\"Connection_Log_In.php\">
	            <div class=\"Button_Small\">
	                 <span>Log In</span> 
	            </div>
	        </a>    
        </div>";
	}
	else
	{
		echo "<br>
		<div style=\"min-width:1200px; margin:auto;\">

                 <!-- Profile BUTTON -->
            <a href=\"Display_Customer.php\">
	            <div class=\"Button_Small\">
	                 <span>View Profile</span> 
	            </div>
            </a>   

            <br>

            <!-- DISCONNECT BUTTON -->

            <a href=\"Deconnexion.php\">
            	<div class=\"Button_Small\">
	                 <span>Disconnect</span>
	            </div>
            </a>     
       </div>";
	}
?>