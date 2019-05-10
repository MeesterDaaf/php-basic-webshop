<?php
require_once("../core/db.php") ;


//selecteer alle klanten uit de database
$sql = "SELECT * FROM klanten";
$klanten = $conn->query($sql );
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
                   <?php foreach($klanten as $klant ){ ?>
                            <tr>
                                <td><?php echo $klant["klant_id"]?></td>
                                <td><?php echo $klant["voornaam"]?></td>
                                <td><?php echo $klant["achternaam"]?></td>
                                <td><?php echo $klant["geboortedatum"]?></td>
                                <td><?php echo $klant["woonplaats"]?></td>
                                <td><?php echo $klant["game_aankoop"]?></td>
                            </tr>
                  <?php } ?>
               </tbody>
            
            </table>
        </div>
    </div>


<?php include "../templates/footer.php" ?>