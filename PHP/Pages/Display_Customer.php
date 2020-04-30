<?php
	session_start();
    include("../../PHP/Utils/Database.php");
?>

<link rel="icon" type="image/png" href="../../Pictures/Icon.png"/>
<link rel="stylesheet" href="../../CSS/allCSS.css"/>

<!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - Display Customer</title>
</head>


<!-- BACKGROUND OF THE PAGE -->
<style>
    body, html
    {
        background-image: url("../../Pictures/Wallpaper_File.jpg"); 
    }
</style>


<!-- BUTTON TO MAIN PAGE -->
<?php require '../../PHP/Components/Button_Mainpage.php'; ?>


<?php
    // We get the customer data
    include("../../PHP/Utils/Customer.php");
    $customer = new Customer($_SESSION["_ID"]);
?>

<!-- CUSTOMER FORM -->
<div style="
    margin: 50px;
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
        Customer Page : ID = \< <?php echo $customer->ID;?>\>
    </div>*

    <form
    method="post"
    action="../../PHP/Actions/ActionCustomer.php"
    style="font: georgia; font-size: 24px;">

            <p style="margin-left: 75px;"><br>

                <br> Current : <br><br>
                <input
                    style="width: 300px;
                        font: georgia;
                        font-size: 24px;"
                    type ="text"
                    name ="_First_Name"
                    value = "<?php echo $customer->fName;?>"
                    <?php if(!isset($_SESSION['accountModify'])) { echo 'disabled'; } ?>
                    />
                 <strong><em> - First Name</em></strong><br><br><br>

                <input
                    style="width: 300px;
                        font: georgia;
                        font-size: 24px;"
                    type ="text"
                    name ="_Last_Name"
                    value = "<?php echo $customer->lName;?>"
                    <?php if(!isset($_SESSION['accountModify'])) { echo 'disabled'; } ?>
                    />
                <strong><em> - Last Name</em></strong><br><br><br>

                <input
                    style="width: 300px;
                        font: georgia;
                        font-size: 24px;"
                    type ="email"
                    name ="_Email"
                    value = "<?php echo $customer->email;?>"                   
                    <?php if(!isset($_SESSION['accountModify'])) { echo 'disabled'; } ?>
                    />
                <strong><em> - Email</em></strong><br><br><br>
                
                <input
                    style="width: 300px;
                        font: georgia;
                        font-size: 24px;"
                    type ="password"
                    name ="_Password"
                    value = "<?php echo $customer->password;?>"                   
                    <?php if(!isset($_SESSION['accountModify'])) { echo 'disabled'; } ?>
                    />
                <strong><em> - Password</em></strong><br><br><br>



                <br><br> Address Data : <br><br>

                <input
                    style="width: 300px;
                        font: georgia;
                        font-size: 24px;"
                    type ="text"
                    name ="_Galaxy"
                    value = "<?php echo $customer->galaxy;?>"
                    <?php if(!isset($_SESSION['accountModify'])) { echo 'disabled'; } ?>
                    />
                <em> - Galaxy</em><br><br><br>

                <input
                    style="width: 300px;
                        font: georgia;
                        font-size: 24px;"
                    type ="text"
                    name ="_System"
                    value = "<?php echo $customer->system;?>"
                    <?php if(!isset($_SESSION['accountModify'])) { echo 'disabled'; } ?>
                    />
                <em> - Solar System</em><br><br><br>

                <input
                    style="width: 300px;
                        font: georgia;
                        font-size: 24px;"
                    type ="text"
                    name ="_Planet"
                    value = "<?php echo $customer->planet;?>"
                    <?php if(!isset($_SESSION['accountModify'])) { echo 'disabled'; } ?>
                    />
                <em> - Planet</em><br><br><br>

                <textarea
                    style="width: 300px;
                        font: georgia;
                        font-size: 24px;"
                    name="_Address"
                    cols="30"
                    rows="4"
                    <?php if(!isset($_SESSION['accountModify'])) { echo 'disabled'; } ?>
                    >
                    <?php echo $customer->address;?>
                </textarea>
                <em> - Address</em><br><br><br>

                <textarea
                    style="width: 300px;
                        font: georgia;
                        font-size: 24px;"
                    name="_Description"
                    cols="30"
                    rows="4"
                    <?php if(!isset($_SESSION['accountModify'])) { echo 'disabled'; } ?>
                    >
                    <?php echo $customer->description;?>
                </textarea>
                <em> - Additionnal Data</em><br><br><br>


                <div style="text-align: center;">
                    <?php
                        if( isset($_SESSION['accountModify']) )
                        {
                            // We free the session value
                            unset($_SESSION['accountModify']);

                            echo '
                                <input type="submit" name="accountModifyCancel" value="Cancel the changes"/>
                                <input type="submit" name="accountModifySave" value="Save the changes"/>
                            ';
                        }
                        else
                        {
                            echo '
                                <input type="submit" name="accountModifyStart" value="Modify my account"/>
                                <input type="submit" name="accountDelete" value="Delete my account"/>
                            ';
                        }
                    ?>
                </div>
            </p>
        </form>
    </div>
</div>
<?php
/*
<div id="abc" class="pointer" onclick="setVisible('def')">knock knock</div>
​<div id="def" class="hidden">hello world</div>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
<script>
    function setVisible(i) {
        document.getElementById(i).style.visibility='visible';
        echo document.getElementById(i).content;
    }
</script>
*/
?>