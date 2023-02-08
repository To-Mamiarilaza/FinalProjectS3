    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/fonts/fontawesome-5/css/all.min.css"); ?>">
<link rel="stylesheet" href="<?php echo base_url("assets/css/listesProjet.css"); ?>">
    <center>
    <h1>Listes de tous les objets rechercher </h1></center><br/>
    <div class="container">
        <div class="row">
        <?php for ($i=0; $i <count($liste) ; $i++) { ?>
    <div class="col-md-4 recherche">
       <p><?php echo $liste[$i]['nom']; ?></p>
       <p><?php echo $liste[$i]['prix'];?></p> 
    
    </div>
<?php } ?>
        </div>
    
    </div>