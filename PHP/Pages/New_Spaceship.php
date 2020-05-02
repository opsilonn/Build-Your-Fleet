<?php
	session_start();
    
    // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['_Picture']) AND $_FILES['_Picture']['error'] == 0)
    {
            // Testons si le fichier n'est pas trop gros
            if ($_FILES['_Picture']['size'] <= 1000000)
            {
                    // Testons si l'extension est autorisée
                    $infosfichier = pathinfo($_FILES['_Picture']['name']);
                    $extension_upload = $infosfichier['extension'];
                    if ($infosfichier['extension']=='jpg')
                    {
                            // On peut valider le fichier et le stocker définitivement
                            move_uploaded_file($_FILES['_Picture']['tmp_name'], '../Pictures/Ship_Pictures/');
                    }
            }
    }


    if(isset($_POST["_First_Name"]))
    {
        header("Location: Mainpage.php", true, 301);
    }
?>



<link rel="icon" type="image/png" href="../../Pictures/Icon.png"/>
<link rel="stylesheet" href="../../CSS/allCSS.css"/>

<!-- TITLE OF THE PAGE -->
<head>
    <meta charset="utf-8" />
    <title>Build Your Fleet - New Spaceship</title>
</head>


<!-- BACKGROUND OF THE PAGE -->
<style>
    body, html
    {
        background-image: url("../../Pictures/Wallpaper_Form.jpg"); 
    }
</style>


            <!-- BUTTON TO MAIN PAGE -->
<?php /* require '../../PHP/Components/Button_Mainpage.php'; */ ?>

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

    New Spaceship
    </div>

    <br><br>

    <form
    style="font: georgia;
        font-size: 24px;"
    method="post"
    action="Mainpage.php"
    enctype="multipart/form-data">

        <div style="text-align: center;">
            Input written in <strong> Strong case</strong> are required
        </div><br>

        <p style="margin-left: 75px;"><br>

            <br> Dimensions : <br><br>
            <input
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            type ="text"
            name ="_Name"
            required/>
             <strong><em> - Spaceship's Name (Manufacture's name)</em></strong><br><br><br>

            <input
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            type ="text"
            name ="_Franchise"/>
            <em> - Spaceship's Franchise</em><br><br><br>



            <br><br> Spaceship's Description : <br><br>
            <select
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            name ="_Purpose"
            required>
                <option value=1> Civil</option>
                <option value=2> Company</option>  
                <option value=3> Military</option>
                <option value=4> Personal</option>
                <option value=5> Scientific</option> 
            </select>
            <strong><em> - Purpose</em></strong><br><br><br>

            <select
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            name ="_Size"
            required>
                <option value=1> Satellite</option> 
                <option value=2> Individual Spaceship</option>
                <option value=3> Shuttle</option>
                <option value=4> Frigate</option>
                <option value=5> Cruiser</option> 
                <option value=6> Space Station</option> 
            </select>
            <strong><em> - Spaceship's Size Indicator</em></strong><br><br><br>

            <input
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            type ="number"
            name ="_Crew_Size"/>
            <em> - Crew's Size</em><br><br><br>



            <br><br> Sale : <br><br>
            <input
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            type ="number"
            name ="_Price"/>
            <em> - Price</em><br><br><br>

            <input
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            type ="number"
            name ="_Available"/>
            <em> - Currently Available</em><br><br><br>



            <br><br> Dimensions : <br><br>
            <input
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            type ="number"
            name ="_Height"/>
            <em> - Height</em><br><br><br>

            <input
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            type ="number"
            name ="_Length"/>
            <em> - Length</em><br><br><br>

            <input
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            type ="number"
            name ="_Width"/>
            <em> - Width</em><br><br><br>
            


            <br><br> Additionnal Details : <br><br>
            <textarea
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            name="_Assets"
            cols="30"
            rows="4"></textarea>
            <em> - Assets</em><br><br><br>

            <textarea
            style="width: 300px;
                font: georgia;
                font-size: 24px;"
            name="_Description"
            cols="30"
            rows="4"></textarea>
            <em> - Description</em><br><br><br>



            <div style="text-align: center;">
            <br><br><em> Please add a picture (format : JPG)</em><br><br>

            <input type="file" name="_Picture" />
            </div><br><br>



            <div style="text-align: center;">
            <input type="submit" value="Submit"/>
            </div>
        </p>
    </form>
</div>



<?php/*
// Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['monfichier']['size'] <= 1000000)
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['monfichier']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['monfichier']['tmp_name'], 'uploads/' . basename($_FILES['monfichier']['name']));
                        echo "L'envoi a bien été effectué !";
                }
        }
}*/
?>