<?php
require_once("../core/db.php") ;

if(isset($_POST["submit"]) && $_POST["uitgever"] != "Alles"){
    $uitgever = $_POST["uitgever"];
    $sql = "SELECT * FROM producten WHERE uitgever = '$uitgever'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $producten = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
else{
    //selecteer alle producten uit de database
    $sql = "SELECT * FROM producten";
    $producten = $conn->query($sql );
}


?>
<?php include "../templates/header.php" ?>
<?php include "../admin/menu.php" ?>
    <div class="container">
        <div class="row">
        <form action="producten.php" method="post">
            <div class="form-group">
                <label for="uitgever">Uitgever:</label>
                <select class="form-control" name="uitgever">
                    <option value="Alles">Alles</option>
                    <option value="Electronic Arts">Electronic Arts</option>
                    <option value="Nintendo">Nintendo</option>
                    <option value="Warner Bros">Warner Bros</option>
                </select>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">selecteer producten</button>
        </form>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>titel</th>
                        <th>uitgever</th>
                        <th>platform</th>
                        <th>prijs</th>
                        <th>voorraad</th>
                    </tr>
                </thead>
               <tbody>
                   <?php foreach($producten as $product ){ ?>
                            <tr>
                                <td><?php echo $product["game_id"]?></td>
                                <td><?php echo $product["titel"]?></td>
                                <td><?php echo $product["uitgever"]?></td>
                                <td><?php echo $product["platform"]?></td>
                                <td><?php echo $product["prijs"]?></td>
                                <td><?php echo $product["voorraad"]?></td>
                            </tr>
                  <?php } ?>
               </tbody>
            
            </table>
        </div>
    </div>


<?php include "../templates/footer.php" ?>