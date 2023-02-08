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
            <a href="" class="btn btn-warning mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Proceder a l'echange</a>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Formulaire d'echange</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="<?php echo site_url("echange/demanderEchange") ?>" method="POST">
                        <div class="modal-body">
                            <h4>Objet demande : <?php echo $objet['nom']; ?></h4>
                            <div class="mt-3">
                                <input type="hidden" name="idObjetDemande" value="<?php echo $objet['idObjet']; ?>"> 
                                <label for="selectForm" class="form-label">Objet a echanger : </label>
                                <select class="form-select" name="idObjetEchange" aria-label="Default select example" id="selectForm">
                                    <?php foreach ($ownObjets as $obj) { ?>
                                        <option value="<?php echo $obj['idObjet']; ?>"><?php echo $obj['nom']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Demander Echanges</button>
                        </div>
                    </form>
                    </div>
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