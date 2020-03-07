<link rel="stylesheet" href="../CSS/Spaceship_File.css"/>

<?php 
	include("Database.php");

	$request = $DATABASE->prepare("SELECT * FROM spaceship WHERE Spaceship_ID=?");
	$request->execute(array($_SESSION["_Spaceship_ID"]));

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
		width: 1200px;
		margin-left: auto;
		margin-right: auto;\">

			<div style=\"
			background-color: rgba(34,42,53,0.9);
	    	border:4px solid rgba(0,0,0,1);
	    	border-radius:40px;\">

		    	<div style=\"
				font-size: 64px;
		    	margin:30px;\">	
	    			".$val["Spaceship_Name"]."
	    		</div>

	    		<div style=\"
				font-size: 42px;\">	
	    			~ ".$val["Franchise"]." ~
	    		</div>

	    		<br>

				<img src=".$fileName." alt=\"A given picture\"
				style=\"
    			height: 400px;
    			width: 600px;
    			border-radius: 60px;\">

	    		<br><br>

	    		<div style=\"max-width: 85%;
				margin-left: auto;
				margin-right: auto;\">
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
					    <td>Available</td>
					    <td>".number_format($val["Available"])."</td>
					  </tr>		

					  <tr>
					    <td>Height</td>
					    <td>".number_format($val["Height"])."</td>
					  </tr>	

					  <tr>
					    <td>Length</td>
					    <td>".number_format($val["Length"])."</td>
					  </tr>	

					  <tr>
					    <td>Width</td>
					    <td>".number_format($val["Width"])."</td>
					  </tr>			  

					  <tr>
					    <td>Assets</td>
					    <td>".$val["Assets"]."</td>
					  </tr>

					  <tr>
					    <td>Description</td>
					    <td><i>".$val["Description"]."</i></td>
					  </tr>

					</table>
				</div>

				<br>
		    </div>
		</div>";
	}
?>