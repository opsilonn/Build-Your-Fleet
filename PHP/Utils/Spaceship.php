<link rel="stylesheet" href="../../CSS/Spaceship_File.css"/>

<?php
    // We import the Database file
    include("../../PHP/Utils/Database.php");

    // We import the Util file
    include("../../PHP/Utils/Util.php");


    
    /** Create the short display of a given number of Spaceships
     * @param $cpt Number of Spaceships to display
     */
    function printSeveralSpaceshipShortFiles($cpt)
    {
        // We import the Database file
        include("../../PHP/Utils/Database.php");
        // We import the Util file
        include("../../PHP/Utils/Util.php");


        // We prepare our query accordingly
        if(isset($_GET["Sort"]) && isset($_GET["Search"]))
        {
            switch ( $_GET["Sort"] )
            {
                case $sortBy["Purpose"] :
                    $request = $DATABASE->prepare("SELECT Spaceship_ID FROM spaceship WHERE Purpose = ?");
                    break;
    
                case $sortBy["Size"] :
                    $request = $DATABASE->prepare("SELECT Spaceship_ID FROM spaceship WHERE Spaceship_Size = ?");
                    break;
                
                case $sortBy["Franchise"] :
                    $request = $DATABASE->prepare("SELECT Spaceship_ID FROM spaceship WHERE Franchise = ?");
                    break;
            }

            $request->execute(array($_GET["Search"]));
        }
        else
        {
            $request = $DATABASE->query("SELECT Spaceship_ID FROM spaceship ORDER BY RAND() LIMIT ". $cpt . ";");
        }
        
        // For all our result, we display a Short file of each Spaceship
        while($val = $request->fetch())
        {
            printSpaceshipShortFile($val['Spaceship_ID']);
        }
    }



    /** Displays some informations of a given Spaceship
     * @param $ID Identifier of the Spaceship
     */
	function printSpaceshipShortFile($ID)
	{
        // We import the Database file
        include("../../PHP/Utils/Database.php");

        // We prepare our query accordingly
        $request = $DATABASE->query("SELECT * FROM spaceship WHERE Spaceship_ID = " . $ID);
    
        if($spaceship = $request->fetch())
        {
            // We verify if we possess the image
            $fileName = (file_exists("../../Pictures/Uploads/".$spaceship["Spaceship_ID"].".jpg"))
                ? "../../Pictures/Uploads/".$spaceship["Spaceship_ID"].".jpg"
                : $fileName = "../../Pictures/Under_Construction.png";
            

            // We display the spaceship
            echo "
            <div style=\"
            text-align: center;

            font-size: 64px;
            letter-spacing: 2px;
            text-shadow: 3px 2px rgba(34,42,53,1);
            color: rgba(255,255,255,1);
            width: 1400px;
            margin: 10px auto;
            background-color: rgba(34,42,53,0.9);
            border:4px solid rgba(0,0,0,1);
            border-radius:40px;
            display:normal;
            \">

                <a
                href=\"../../PHP/Pages/Mainpage.php?File_ID=".$spaceship["Spaceship_ID"]."\"
                style=\"text-decoration: none; font-size: 64px; margin:30px;\">
                    ".$spaceship["Spaceship_Name"]."
                    <div style=\"
                    font-size: 42px;\">	
                        ~ ".$spaceship["Franchise"]." ~
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
                                        <th>".$spaceship["Spaceship_Size"]."</th>
                                    </tr>

                                    <tr>
                                        <td>Purpose</td>
                                        <td>".$spaceship["Purpose"]."</td>
                                    </tr>

                                    <tr>
                                        <td>Crew Size</td>
                                        <td>".number_format($spaceship["Crew_Size"])."</td>
                                    </tr>
                                    <tr>
                                        <td>Price</td>
                                        <td>".number_format($spaceship["Price"])."</td>
                                    </tr>				  

                                    <tr>
                                        <td>Assets</td>
                                        <td>".$spaceship["Assets"]."</td>
                                    </tr>
                                    </table>
                                </div>
                            </tr>
                        </table>
                    </div>
                </a>
            </div>
            <br>";
        }
	}



    /** Displays all informations of a given Spaceship
     * @param $ID Identifier of the Spaceship
     */
	function printSpaceshipLongFile($ID)
	{
        // We import the Database file
        include("../../PHP/Utils/Database.php");

        // We prepare our query accordingly
        $request = $DATABASE->query("SELECT * FROM spaceship WHERE Spaceship_ID = " . $ID);
    
        if($spaceship = $request->fetch())
        {
            // We verify if we possess the image
            $fileName = (file_exists("../../Pictures/Uploads/".$spaceship["Spaceship_ID"].".jpg"))
                ? "../../Pictures/Uploads/".$spaceship["Spaceship_ID"].".jpg"
                : $fileName = "../../Pictures/Under_Construction.png";
            

            // We display the spaceship
            echo "
                <div style=\"
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
                            ".$spaceship["Spaceship_Name"]."
                        </div>

                        <div style=\"
                        font-size: 42px;\">	
                            ~ ".$spaceship["Franchise"]." ~
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
                                <th>".$spaceship["Spaceship_Size"]."</th>
                            </tr>

                            <tr>
                                <td>Purpose</td>
                                <td>".$spaceship["Purpose"]."</td>
                            </tr>

                            <tr>
                                <td>Crew Size</td>
                                <td>".number_format($spaceship["Crew_Size"])."</td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td>".number_format($spaceship["Price"])."</td>
                            </tr>

                            <tr>
                                <td>Available</td>
                                <td>".number_format($spaceship["Available"])."</td>
                            </tr>		

                            <tr>
                                <td>Height</td>
                                <td>".number_format($spaceship["Height"])."</td>
                            </tr>	

                            <tr>
                                <td>Length</td>
                                <td>".number_format($spaceship["Length"])."</td>
                            </tr>	

                            <tr>
                                <td>Width</td>
                                <td>".number_format($spaceship["Width"])."</td>
                            </tr>			  

                            <tr>
                                <td>Assets</td>
                                <td>".$spaceship["Assets"]."</td>
                            </tr>

                            <tr>
                                <td>Description</td>
                                <td><i>".$spaceship["Description"]."</i></td>
                            </tr>

                            </table>
                        </div>

                        <br>
                    </div>
                </div>
                <br>";
        }
	}
?>