<link rel="icon" type="image/png" href="../Pictures/Icon.png"/>
<link rel="stylesheet" href="../../CSS/allCSS.css"/>


<!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - Main Page</title>
</head>


<!-- BACKGROUND OF THE PAGE -->
<style>
    body, html
    {
        background-image: url("../../Pictures/Wallpaper_Mainpage.jpg"); 
    }
</style>
 
<?php
    // We get the Header
    require '../../PHP/Components/Header.php';

    // We import the method generating the Spaceship's files
    include '../../PHP/Utils/Spaceship.php';
    
    
	if(isset($_GET["File_ID"]))
	{
        printSpaceshipLongFile($_GET["File_ID"]);
	}
	else
	{
		$_SESSION["_Spaceship_ID"] = -1;
        printSeveralSpaceshipShortFiles(3);
	}

    // We get the Header
     require '../../PHP/Components/Footer.php';
?>