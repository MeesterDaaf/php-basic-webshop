<?php include "templates/header.php" ?>
<?php include "menu.php" ?>
<?php

//plaats items in de winkelmand
if(isset($_POST["bestellen"])){
    $game_id = $_POST["game_id"];
    $gebruiker_id = $_SESSION["gebruiker_id"];

    $sql = "SELECT aantal FROM winkelmandje WHERE gebruiker_id = $gebruiker_id AND product_id = $game_id ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    var_dump($product["aantal"]);

    if(empty($product)){
        $sql = "INSERT INTO winkelmandje (gebruiker_id, product_id, aantal) VALUES ($gebruiker_id, $game_id, 1 )";
    }else{
        $plus_een = $product["aantal"] + 1;
        $sql = "UPDATE winkelmandje SET aantal = $plus_een WHERE gebruiker_id = $gebruiker_id AND product_id = $game_id";
    }
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    
   
}




//haal alle producten op die op voorraad zijn (dus waarbij voorraad groter is dan 0 )
$sql = "SELECT * FROM producten WHERE voorraad > 0";
$producten = $conn->query($sql);

?>
<div class="container mt-4">
    <div class="row">
        <?php foreach($producten as $product){ ?>
            <div class="card mt-1 mr-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $product["titel"] ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted">Platform: <?php echo $product["platform"] ?></h6>
                    <p class="card-text"><?php echo $product["uitgever"] ?></p>
                    <p class="card-text"><strong>&euro; <?php echo $product["prijs"] ?></strong></p>
                    <p class="card-text">Op voorraad: <?php echo $product["voorraad"] ?></p>
                    <form method="post">
                        <input type="hidden" name="game_id" value="<?php echo $product["game_id"] ?>">
                        <button type="submit" class="btn btn-info" name="bestellen">Bestellen</button>
                    </form>
                </div>
            </div>
        <?php } ?>
    </div> 

