<?php

//start of continue een sessie
session_start();

// check of er een sessie gestart is. Check daarna op welk toegangsniveau de gebruiker mag opereren.
if( isset($_SESSION["gebruikersnaam"] ) ){
    if($_SESSION["rol"] == "medewerker"){
        header("location: admin/klanten.php");
    }
    elseif($_SESSION["rol"] == "klant"){
        header("location: shop.php");
    }
}

//controleer of de submit knop EN of er een gebruikersnaam is ingevuld
if( isset($_POST["submit"] ) && $_POST["gebruikersnaam"] != ""  ){
    require_once("core/db.php");//laat de database in.

    $gebruikersnaam =  $_POST["gebruikersnaam"];//lees de post array uit

    //voer een query uit die zoekt of de ingevulde gebruikersnaam in de database staat.
    $sql = "SELECT * FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";
    $stmt = $conn->prepare($sql); 
    $stmt->execute(); 
    $resultaat = $stmt->fetch();

    //staat de gebruikersnaam in de database? Ja, check het wachtwoord. Nee? Probeer het opnieuw
    if(!empty($resultaat)){
        if($resultaat["wachtwoord"] == $_POST["wachtwoord"]){
            
            //start een sessie en sla de gegevens uit de database op in de sessie array
            session_start();
            $_SESSION["gebruikersnaam"] = $resultaat["gebruikersnaam"];
            $_SESSION["rol"]            = $resultaat["rol"];
            
            if($resultaat["rol"] == "medewerker"){
                header("location: admin/klanten.php");
            }else{
                header("location: shop.php");
            }
        }
        else{
            echo "Er is iets fout gegaan! Probeer het opnieuw";
        }

    }
}

?>

<?php include 'templates/header.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col"></div>
        <div class="col">
            <form method="post">
                <div class="form-group">
                    <label for="username">Gebruikersnaam</label>
                    <input type="text" name="gebruikersnaam" id="gebruikersnaam"  class="form-control">
                </div>
                <div class="form-group">
                    <label for="wachtwoord">Wachtwoord</label>
                    <input type="wachtwoord" name="wachtwoord" id="wachtwoord"  class="form-control">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Inloggen</button>
            </form>
        </div>
        <div class="col"></div>
    </div>
</div>