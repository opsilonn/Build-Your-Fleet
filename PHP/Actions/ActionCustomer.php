<?php
    // check which button was clicked
    if ( isset($_POST['accountModifyStart']) )
    {
        accountModifyStart();
    }
    else if ( isset($_POST['accountModifyCancel']) )
    {
        accountModifyCancel();
    }
    else if ( isset($_POST['accountModifySave']) )
    {
        accountModifySave();
    }
    else if ( isset($_POST['accountDelete']) )
    {
        accountDelete();
    }



    /**
     * Allow the modification of the customer's data
     */
    function accountModifyStart()
    {
        // We import the session
        session_start();

        //We set the SESSION value
        $_SESSION['accountModify'] = 1;

        // We go back to the Customer's page
        header("Location: ../../PHP/Pages/Display_Customer.php", true, 301);
    }


    /**
     * Allow the modification of the customer's data
     */
    function accountModifyCancel()
    {
        // We go back to the Customer's page
        header("Location: ../../PHP/Pages/Display_Customer.php", true, 301);
    }


    /**
     * Saves the modification of the customer's data
     */
    function accountModifySave()
    {
        // We import the session
        session_start();

        // We import the database
        include("../../PHP/Utils/Database.php");

        // We execute our query
        $verification = $DATABASE->prepare("
        UPDATE customer SET
        F_Name = ?,
        L_Name = ?,
        Email = ?,
        Password = ?,
        Galaxy = ?,
        System = ?,
        Planet = ?,
        Address = ?,
        Description = ?
        WHERE Customer_ID = ?");

        $verification->execute(array(
            $_POST['_First_Name'],
            $_POST['_Last_Name'],
            $_POST['_Email'],
            $_POST['_Password'],
            $_POST['_Galaxy'],
            $_POST['_System'],
            $_POST['_Planet'],
            $_POST['_Address'],
            $_POST['_Description'],
            $_SESSION['_ID']
        ));


        // We go back to the Customer's page
        header("Location: ../../PHP/Pages/Display_Customer.php", true, 301);
    }


    /**
     * Deletes the account of the customer logged in, and returns to the HomePage
     */
    function accountDelete()
    {    
        // We import the session
        session_start();

        // We import the database
        include("../../PHP/utils/Database.php");

        // We delete the customer's account
        $verification = $DATABASE->prepare("DELETE FROM customer WHERE Customer_ID = ?");
        $verification->execute(array($_SESSION['_ID']));
        
        // We delete the session
        session_destroy();

        // We go back to the Homepage
        header("Location: ../../PHP/Pages/Homepage.php", true, 301);
    }
?>