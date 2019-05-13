<?php
    require_once("../core/db.php");
    $game_id = $_GET["game_id"];

    if( isset($_POST['wijzig']) ){
        $titel      = $_POST["titel"]; 
        $platform   = $_POST["platform"];
        $uitgever   = $_POST["uitgever"];
        $prijs      = $_POST["prijs"];
        $voorraad   = $_POST["voorraad"];
        $sql = "UPDATE producten 
                    SET titel    = '$titel', 
                        platform = '$platform', 
                        uitgever = '$uitgever', 
                        prijs    = $prijs, 
                        voorraad = $voorraad 
                    WHERE 
                        game_id  = $game_id";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }

    
    $sql = "SELECT * FROM producten WHERE game_id = $game_id";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);


?>
<?php include "../templates/header.php" ?>
<div class="container">
    <div class="row mt-4">
        <form method="post"> 
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="titel-addon1">Titel</span>
                </div>
                <input type="text" class="form-control" name="titel" value="<?php echo $product["titel"] ?>" aria-label="titel" aria-describedby="titel-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="platform-addon1">Platform</span>
                </div>
                <input type="text" class="form-control" name="platform" value="<?php echo $product["platform"] ?>" aria-label="platform" aria-describedby="platform-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="uitgever-addon1">Uitgever</span>
                </div>
                <input type="text" class="form-control" name="uitgever" value="<?php echo $product["uitgever"] ?>" aria-label="uitgever" aria-describedby="uitgever-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="prijs-addon1">Prijs</span>
                </div>
                <input type="text" class="form-control" name="prijs" value="<?php echo $product["prijs"] ?>" aria-label="prijs" aria-describedby="prijs-addon1">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="voorraad-addon1">Aantal op voorraad</span>
                </div>
                <input type="text" class="form-control" name="voorraad" value="<?php echo $product["voorraad"] ?>" aria-label="voorraad" aria-describedby="voorraad-addon1">
            </div>
            <div class="input-group mb-3">
                <a href="producten.php" class="btn btn-warning">Terug</a>
                <button type="submit" name="wijzig" class="btn btn-primary ml-2">Wijzig</button>
            </div>
        </form>
    </div>
</div>