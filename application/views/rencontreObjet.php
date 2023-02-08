<link rel="stylesheet" href="<?php echo base_url("assets/css/listesProjet.css"); ?>">
<div class="container">
    <h1>Listes de tous les objets a echanger </h1>
    <br/>
    <div>
        <form action="<?php echo site_url("frontoffice/recherche/"); ?>" method="get">
            <label for="">Mot cle</label>
            <input type="text" name="nom">
            <label for="">Categorie</label>
            <select name="categorie" id="">
                <?php for ($j=0; $j <count($categorie) ; $j++) { ?>
                <option value="<?php echo $categorie[$j]['idCategorie']; ?>"><?php echo $categorie[$j]['nom']; ?></option>
                <?php } ?>
            </select>
            <button type="submit">Rechercher</button>
        </form>
    </div>
    <br/>
    <br/>
    <?php if (!isset($liste)) { ?>
    <div class="row listes">
        <?php for ($i=0; $i < count($objets); $i++) { ?>
            <div class="col-md-3 my-3">
                <div class="card" style="width: 18rem;">
                    <a href="<?php echo site_url('echange/detailOtherObjet/'.$objets[$i]['idObjet']); ?>">
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

    <?php } ?>
    <?php if(isset($liste)) {?>
        <div class="row listes">
        <?php for ($i=0; $i < count($liste); $i++) { ?>
            <div class="col-md-3 my-3">
                <div class="card" style="width: 18rem;">
                    <a href="<?php echo site_url('echange/detailOtherObjet/'.$liste[$i]['idObjet']); ?>">
                        <div class="image">
                            <img src="<?php echo base_url('assets/images/objet/'.$arrayPhotos[$i]); ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $liste[$i]['nom']; ?></h5>
                            <p class="card-text"><?php echo $liste[$i]['description']; ?></p>
                        </div>
                    </a>
                </div>
            </div>
        <?php } ?>

    </div>
        <?php  } ?>
</div>