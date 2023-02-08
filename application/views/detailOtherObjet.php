<link rel="stylesheet" href="<?php echo base_url("assets/css/detailObjet.css"); ?>">
<div class="container">
    <h1>Detail de l'objet : <?php echo $objet['nom']; ?></h1>

    <div class="row mt-5">
        <div class="col-md-6">
            <div class="proprio">
                <h5>A propos du proprio :</h5>
                <p>Propriétaire : <?php echo $proprietaire['prenom']; ?></p>
                <p>Adresse mail : <?php echo $proprietaire['mail']; ?></p>
                <p>Telephone : <?php echo $proprietaire['tel']; ?></p>
            </div>
            <ul class="detail">
                <li>Nom : <span><?php echo $objet['nom']; ?></span></li>
                <li>Categorie : <span><?php echo $categorie; ?></span></li>
            </ul>
            <div class="card" style="width: 18rem;">
                <div class="card-body description">
                    <h5>Description</h5>
                    <p><?php echo $objet['description']; ?></p>
                </div>
            </div>
        </div>

        <div class="col-md-6 photos">
            <div class="col-md-12">
                <h4 class="mb-5">Les photos de l' objet</h4>
                <hr>
            </div>

            <div class="row album">
                <?php foreach ($photos as $photo) { ?>
                    <div class="col-md-6 img-display mt-3">
                        <img src="<?php echo base_url("/assets/images/objet/".$photo['photo']); ?>" class="img-thumbnail" alt="">
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    function updatePath() {
        var path = document.getElementById('path');
        var file = document.getElementById('inputTag');
        console.log(file.value);
        path.innerHTML = file.value;
    }
</script>