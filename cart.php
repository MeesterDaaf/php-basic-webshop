<?php include "templates/header.php" ?>
<?php include "menu.php" ?>

<?php
    $totaal_prijs = 0;//totaalprijs van winkelmandje

    //haal alle producten op die de gebruiker in zijn/haar mandje heeft geplaatst.
    $gebruiker_id = $_SESSION["gebruiker_id"];
    $sql = "SELECT * FROM winkelmandje JOIN producten ON producten.game_id = winkelmandje.product_id WHERE gebruiker_id = $gebruiker_id ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $producten_in_mandje = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
?>
<div class="container">
    <div class="row">
        <h4>Winkelmandje</h4>
        <div class="col  mt-4">
            <ul class="list-group">
                <?php
                    
                    if(!empty($producten_in_mandje)){
                        foreach($producten_in_mandje as $product){ ?>
                            <div class="list-group-item list-group-item-action mt-2">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?php echo $product["titel"];?></h5>
                                    <p class="mb-1"><span class="badge badge-primary badge-pill"><?php echo $product["aantal"]; ?> stuks</span></p>
                                </div>
                                <p class="mb-1"><?php echo $product["platform"];?></p>
                                <small>&euro; <?php echo $product["prijs"];?></small>
                            </div>
                        <?php
                        $totaal_prijs = $totaal_prijs + $product["prijs"];
                        }
                    
                    }

                ?>
            
                
            </ul> 
        </div>
        <div class="col  mt-5">
            <div class="alert alert-info" role="alert">
                Totaalprijs: &euro; <?php  echo $totaal_prijs; ?> voor <?php echo ($aantal_producten) ? $aantal_producten . " producten": "" ?>
            </div>
        </div>  
    </div>
   
</div>




