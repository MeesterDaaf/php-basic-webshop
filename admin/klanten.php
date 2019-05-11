<?php
require_once("../core/db.php") ;

//selecteer alle klanten uit de database
$sql = "SELECT * FROM gebruiker";
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
                        <th>gebruikersnaam</th>
                        <th>rol</th>
                        <th>voornaam</th>
                        <th>achternaam</th>
                        <th>geboortedatum</th>
                        <th>woonplaats</th>
                        <th>game_aankoop</th>
                    </tr>
                </thead>
               <tbody>
                   <?php foreach($klanten as $klant ){ ?>
                            <tr>
                                <td><?php echo $klant["gebruiker_id"]?></td>
                                <td><?php echo $klant["gebruikersnaam"]?></td>
                                <td><?php echo $klant["rol"]?></td>
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