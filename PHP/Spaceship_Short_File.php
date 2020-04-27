<link rel="stylesheet" href="../CSS/Spaceship_File.css"/>

<?php 
	include("Database.php");

	if(isset($_GET["Sort"]) && isset($_GET["Search"]))
	{
		if($_GET["Sort"] == "Franchise")
			$request = $DATABASE->prepare("SELECT * FROM spaceship WHERE Franchise =?");


		if($_GET["Sort"] == "Purpose")
			$request = $DATABASE->prepare("SELECT * FROM spaceship WHERE Purpose =?");

		if($_GET["Sort"] == "Spaceship_Size")
			$request = $DATABASE->prepare("SELECT * FROM spaceship WHERE Spaceship_Size =?");
		$request->execute(array($_GET["Search"]));
	}
	else
	{
		$request = $DATABASE->query("SELECT * FROM spaceship ORDER BY RAND() LIMIT 5;");
	}
	

	while($val = $request->fetch())
	{
		if(file_exists("../Pictures/Uploads/".$val["Spaceship_ID"].".jpg"))
    		$fileName = "../Pictures/Uploads/".$val["Spaceship_ID"].".jpg";
		else
    		$fileName = "../Pictures/Under_Construction.png";
		echo "

		<div style=\"
		font-family: Pikmin;
		text-align: center;

		font-size: 64px;
		letter-spacing: 2px;
		text-shadow: 3px 2px rgba(34,42,53,1);
		color: rgba(255,255,255,1);
		width: 1400px;
		margin-left: auto;
		margin-right: auto;\">

			<div style=\"
			background-color: rgba(34,42,53,0.9);
	    	border:4px solid rgba(0,0,0,1);
	    	border-radius:40px;
	    	display:normal;
	    	\">

		    	<a style=\"
				font-size: 64px;
		    	margin:30px;\"
		    	href=\"../PHP/Mainpage.php?File_ID=".$val["Spaceship_ID"]."\">
	    			".$val["Spaceship_Name"]."
	    		</a>

	    		<div style=\"
				font-size: 42px;\">	
	    			~ ".$val["Franchise"]." ~
	    		</div>

	    		<div style=\"display: flex; margin:30px;\">
	    			<table align=center>
						  <tr>
							<img src=".$fileName." alt=\"A given picture\"
							style=\"    height: 300px;
			    			width: 500px;
			    			border-radius: 40px;
			    			margin:auto;\">
						  </tr>

						  <tr>
							<div style=\"max-width: 70%;
							margin: auto;\">
								<table align=center>
								  <tr>
								    <th>Spaceship_Size</th>
								    <th>".$val["Spaceship_Size"]."</th>
								  </tr>

								  <tr>
								    <td>Purpose</td>
								    <td>".$val["Purpose"]."</td>
								  </tr>

								  <tr>
								    <td>Crew Size</td>
								    <td>".number_format($val["Crew_Size"])."</td>
								  </tr>
								  <tr>
								    <td>Price</td>
								    <td>".number_format($val["Price"])."</td>
								  </tr>				  

								  <tr>
								    <td>Assets</td>
								    <td>".$val["Assets"]."</td>
								  </tr>
								</table>
							</div>
						  </tr>
					</table>
				</div><br>
		    </div>
		</div>";
	}
?>