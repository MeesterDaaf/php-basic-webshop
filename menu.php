<?php
session_start();
if( !isset($_SESSION["gebruikersnaam"] ) ){
    header("location: index.php");
}

require_once("core/db.php");

//hoeveel items heeft de gebruiker in zijn winkelmandje?? 
$gebruiker_id = $_SESSION['gebruiker_id'];
$sql = "SELECT SUM(aantal) FROM winkelmandje WHERE gebruiker_id = $gebruiker_id";
$stmt = $conn->prepare($sql);
$stmt->execute();
$aantal_producten = $stmt->fetch()[0];// $aantal_producten wordt gebruikt om het aantal in het menu weer te geven.

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="shop.php">Webshop</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
        </ul>
        <ul class="navbar-nav mr-sm-2" >
            <li class="nav-item mr-5">
            <a class="nav-link" href="cart.php">Winkelmandje <span class="badge badge-primary badge-pill"><?php echo $aantal_producten ?></span></a>
            </li>
            <li class="nav-item">
                <a class="btn btn-danger" href="logout.php">Uitloggen</a>
            </li>
        </ul>
    </div>
</nav>