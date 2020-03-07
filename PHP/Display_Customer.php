<?php
	session_start();
    include("Database.php");
?>

<link rel="icon" type="image/png" href="../Pictures/Icon.png"/>
<link rel="stylesheet" href="../CSS/Background.css"/>

            <!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - Display Customer</title>
</head>


            <!-- BACKGROUND OF THE PAGE -->
<style>
    body, html
    {
        background-image: url("../Pictures/Wallpaper_File.jpg"); 
    }
</style>


            <!-- BUTTON TO MAIN PAGE -->
<?php require 'Button_Mainpage.php'; ?>



                <!-- NEW SPACESHIP FORM -->
<div style="
    width: 1400px;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 100px;
    padding:50px;

    background-color: rgba(34,42,53,0.9);
    border:5px solid rgba(34,42,53,1);
    border-radius:80px;

    color: rgba(255,255,255,1);"
    class="Form_Connection">

              <!-- TITLE -->
    <div style="
    font-family: Pikmin;
    font-size: 48px;
    letter-spacing: 2px;
    text-align: center;
    text-shadow: 3px 2px rgba(34,42,53,1);
    color: rgba(255,255,255,1);">

    Customer Page : ID = \< <?php echo $_SESSION["_ID"];?>\>
    </div>

    <br><br>
    <form
        style="font: georgia;
            font-size: 24px;">

            <p style="margin-left: 75px;"><br>

                <br> Current : <br><br>
                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_First_Name"
                value = <?php echo $_SESSION["_F_Name"];?>
                disabled/>
                 <strong><em> - First Name</em></strong><br><br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_Last_Name"
                value = <?php echo $_SESSION["_L_Name"];?>
                disabled/>
                <strong><em> - Last Name</em></strong><br><br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="email"
                name ="_Email"
                value = <?php echo $_SESSION["_Email"];?>
                disabled/>
                <strong><em> - Email</em></strong><br><br><br>
                
                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="password"
                name ="_Password"
                value = <?php echo $_SESSION["_Password"];?>
                disabled/>
                <strong><em> - Password</em></strong><br><br><br>



                <br><br> Address Data : <br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_Galaxy"
                value = <?php echo $_SESSION["_Galaxy"];?>
                disabled/>
                <em> - Galaxy</em><br><br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_System"
                value = <?php echo $_SESSION["_System"];?>
                disabled/>
                <em> - Solar System</em><br><br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_Planet"
                value = <?php echo $_SESSION["_Planet"];?>
                disabled/>
                <em> - Planet</em><br><br><br>

                <textarea
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                name="_Address"
                cols="30"
                rows="4"
                disabled><?php echo $_SESSION["_Address"];?></textarea>
                <em> - Address</em><br><br><br>

                <textarea
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                name="_Description"
                cols="30"
                rows="4"
                disabled/><?php echo $_SESSION["_Description"];?></textarea>
                <em> - Additionnal Data</em><br><br><br>


                <div style="text-align: center;">
                <input type="button" value="Change Values"/> 
                <input type="button" value="Delete Account"/>
                </div>
            </p>
        </form>
    </div>
</div>