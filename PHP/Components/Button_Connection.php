<!DOCTYPE html>

<?php
	session_start();

	// If the user is logged in :
	if( isset($_SESSION['_ID']) )
	{
		// If the user is an admin, he can add a Spaceship
		if( isset($_SESSION['_Is_Admin']) && $_SESSION['_Is_Admin'] == 1 )
		{
			echo "
			<br>
			<!-- New Spaceship BUTTON -->
			<div style=\"display: flex; justify-content: flex-end\">
				<a href=\"../../PHP/Pages/New_Spaceship.php\">
					<div class=\"Button_Small\">
							<span>Add New Spaceship</span>
					</div>
				</a>
			</div> ";
		}
		// Otherwise, he's a regular customer, he can access his profile's data
		else
		{
			echo "
			<br>
			<!-- Profile BUTTON -->
			<div style=\"display: flex; justify-content: flex-end\">
				<a href=\"Display_Customer.php\">
					<div class=\"Button_Small\">
						 <span>View Profile</span> 
					</div>
				</a>       
			</div>";	
		}

		echo "
		<br>

		<!-- DISCONNECT BUTTON -->
		<div style=\"display: flex; justify-content: flex-end\">
            <a href=\"Deconnexion.php\">
            	<div class=\"Button_Small\">
	                 <span>Disconnect</span>
	            </div>
            </a>     
       </div>";
	}
	// If the user is NOT logged in
	else
	{
		echo "
		<br>
		<!-- SIGN-IN BUTTON -->
		<div style=\"display: flex; justify-content: flex-end\">
            <a href=\"Connection_Sign_In.php\">
	            <div class=\"Button_Small\">
	                <span>Sign In</span> 
	            </div>
	        </a>
		</div> 

		<br>

		<!-- LOG-IN BUTTON -->
		<div style=\"display: flex; justify-content: flex-end\">
            <a href=\"Connection_Log_In.php\">
	            <div class=\"Button_Small\">
	                 <span>Log In</span> 
	            </div>
	        </a>    
        </div>";
	}
?>