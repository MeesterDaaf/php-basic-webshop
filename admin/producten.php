<?php
require_once("../core/db.php") ;

//selecteer alle producten uit de database
$sql = "SELECT * FROM producten";
$producten = $conn->query($sql );
?>
<?php include "../templates/header.php" ?>
<?php include "../admin/menu.php" ?>
    <div class="container">
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