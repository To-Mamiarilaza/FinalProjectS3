<link rel="stylesheet" href="<?php echo base_url("assets/css/listesProjet.css"); ?>">
<div class="container">
    <h1>Listes de tous mes objets</h1>
    <a href="<?php echo site_url('/mesObjets/newObjet'); ?>" class="btn btn-info my-5 ">Ajouter nouvelle objet</a>
    <div class="row listes">
        <?php foreach ($objets as $objet) { ?>
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <a href="">
                        <img src="<?php echo base_url('assets/images/login-images.jpg'); ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $objet['nom']; ?></h5>
                            <p class="card-text"><?php echo $objet['description']; ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>

    </div>
</div>