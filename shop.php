<?php
// unset($_COOKIE);


require_once("core/db.php") ;
if(isset($_POST["bestellen"])){
    $titel = urlencode($_POST["titel"]);
    $product_id = $_POST["product_id"];

    $productsSelected[$product_id] = $titel;

    setcookie("bestelCookie", json_encode($productsSelected), time() + (86400 * 30), "/"); // 86400 = 1 day
    
    if (isset($_COOKIE['bestelCookie'])) {
        // success
        print_r($_COOKIE['bestelCookie']);
      }
}

//haal alle producten op die op voorraad zijn (dus waarbij voorraad groter is dan 0 )
$sql = "SELECT * FROM producten WHERE voorraad > 0";
$producten = $conn->query($sql );

?>
<?php include "templates/header.php" ?>
<?php include "cart.php" ?>

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
                        <input type="hidden" name="product_id" value="<?php echo $product["game_id"] ?>">
                        <input type="hidden" name="titel" value="<?php echo $product["titel"] ?>">
                        <button type="submit" class="btn btn-info" name="bestellen">Bestellen</button>
                    </form>
                </div>
                </div>

        <?php } ?>
    </div> 

