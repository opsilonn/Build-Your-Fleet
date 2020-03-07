<?php
	session_start();
    include("Database.php");


    if(isset($_POST["_First_Name"])
    && isset($_POST["_Last_Name"])
    && isset($_POST["_Email"])
    && isset($_POST["_Password"]))
    {
        $indicator = true;
        $_Email = htmlspecialchars($_POST["_Email"]);

        $verification = $DATABASE->prepare("SELECT * FROM customer WHERE Email=?");
        $verification->execute(array($_Email));

        while($val = $verification->fetch())
            $indicator = false;

        if($indicator)
        {
            $req_insert=$DATABASE->prepare("INSERT INTO customer                
                (Customer_ID,
                F_Name,
                L_Name,
                Email,
                Password,
                Galaxy,
                System,
                Planet,
                Address,
                Description)
                 VALUES(NULL, :F_Name, :L_Name, :Email, :Password, :Galaxy, :System, :Planet, :Address, :Description)");

            $req_insert->execute(array(
                    "F_Name" => $_POST["_First_Name"],
                    "L_Name" => $_POST['_Last_Name'],
                    "Email" => $_POST['_Email'],
                    "Password" => $_POST['_Password'],
                    "Galaxy" => $_POST['_Galaxy'],
                    "System" => $_POST['_System'],
                    "Planet" => $_POST['_Planet'],
                    "Address" => $_POST['_Address'],
                    "Description" => $_POST['_Description']));


            $request2 = $DATABASE->prepare("SELECT * FROM customer WHERE Email=?");
            $request2->execute(array($_POST["_Email"]));

            while($val = $request2->fetch())
                {
                    $_SESSION["_ID"] = $val["_ID"];
                    $_SESSION['_F_Name'] = $val['F_Name'];
                    $_SESSION['_L_Name'] = $val['L_Name'];
                    $_SESSION['_Email'] = $val['Email'];
                    $_SESSION['_Password'] = $val['Password'];
                    $_SESSION['_Galaxy'] = $val['Galaxy'];
                    $_SESSION['_System'] = $val['System'];
                    $_SESSION['_Planet'] = $val['Planet'];
                    $_SESSION['_Address'] = $val['Address'];
                    $_SESSION['_Description'] = $val['Description'];
                }
            
            header("Location:Mainpage.php", true, 301);
        }
    }
?>

<link rel="icon" type="image/png" href="../Pictures/Icon.png"/>
<link rel="stylesheet" href="../CSS/Background.css"/>

            <!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - New Customer</title>
</head>


            <!-- BACKGROUND OF THE PAGE -->
<style>
    body, html
    {
        background-image: url("../Pictures/Wallpaper_Form.jpg"); 
    }
</style>


            <!-- BUTTON TO MAIN PAGE -->
<?php require 'Button_Mainpage.php'; ?>

<br><br><br>

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

        New Customer
        </div>

        <br><br>

        <form
        style="font: georgia;
            font-size: 24px;"
        method="post"
        action="New_Customer.php">

            <div style="text-align: center;">
                Input written in <strong> Strong case</strong> are required
            </div><br>

            <p style="margin-left: 75px;"><br>

                <br> Current : <br><br>
                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_First_Name"
                value = <?php echo htmlspecialchars($_SESSION["_First_Name"]);?>
                required/>
                 <strong><em> - First Name</em></strong><br><br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_Last_Name"
                value = <?php echo htmlspecialchars($_SESSION["_Last_Name"]);?>
                required/>
                <strong><em> - Last Name</em></strong><br><br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="email"
                name ="_Email"
                value = <?php echo htmlspecialchars($_SESSION["_Email"]);?>
                required/>
                <strong><em> - Email</em></strong><br><br><br>
                
                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="password"
                name ="_Password"
                value = <?php echo htmlspecialchars($_SESSION["_Password"]);?>
                required/>
                <strong><em> - Password</em></strong><br><br><br>



                <br><br> Address Data : <br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_Galaxy"/>
                <em> - Galaxy</em><br><br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_System"/>
                <em> - System</em><br><br><br>

                <input
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                type ="text"
                name ="_Planet"/>
                <em> - Planet</em><br><br><br>

                <textarea
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                name="_Address"
                cols="30"
                rows="4"></textarea>
                <em> - Address</em><br><br><br>

                <textarea
                style="width: 300px;
                    font: georgia;
                    font-size: 24px;"
                name="_Description"
                cols="30"
                rows="4"></textarea>
                <em> - Additionnal Data</em><br><br><br>

                <div style="text-align: center;">
                <input type="submit" value="Submit"/>
                </div>
            </p>
        </form>
    </div>
</div>