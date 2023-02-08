<link rel="stylesheet" href="<?php echo base_url("assets/css/listesProjet.css"); ?>">
<div class="container">
    <h1>Listes de tous mes objets</h1>
    <a href="<?php echo site_url('/mesObjets/newObjet'); ?>" class="btn btn-info my-5 ">Ajouter nouvelle objet</a>
    <div class="row listes">
        <?php for ($i=0; $i < count($objets); $i++) { ?>
            <div class="col-md-3 my-3">
                <div class="card" style="width: 18rem;">
                    <a href="<?php echo site_url('mesObjets/detailObjet/'.$objets[$i]['idObjet']); ?>">
                        <div class="image">
                            <img src="<?php echo base_url('assets/images/objet/'.$arrayPhoto[$i]); ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $objets[$i]['nom']; ?></h5>
                            <p class="card-text"><?php echo $objets[$i]['description']; ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>

    </div>
</div>