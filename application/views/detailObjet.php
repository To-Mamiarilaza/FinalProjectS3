<link rel="stylesheet" href="<?php echo base_url("assets/css/detailObjet.css"); ?>">
<div class="container">
    <h1>Detail de l'objet : <?php echo $objet['nom']; ?></h1>

    <div class="row mt-5">
        <div class="col-md-6">
            <p>Propriétaire : <?php echo $proprietaire['nom']; ?></p>
            <form action="<?php echo site_url("/mesObjets/updateObjet"); ?>" method="POST">
                <input type="hidden" name="idObjet" id="" value="<?php echo $objet['idObjet']; ?>">
                <input type="hidden" name="idUser" id="" value="<?php echo $objet['idUser']; ?>">
        
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Nom de l'objet</label>
                    <input type="text" name="nom" class="form-control" id="exampleFormControlInput1" value="<?php echo $objet['nom']; ?>">
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="form-label">Categorie</label>
                    <select name="idCategorie" id="" class="form-select">
                        <?php foreach ($categories as $categorie) { ?>
                            <option value="<?php echo $categorie['idCategorie']; ?>" <?php if($categorie['idCategorie'] == $objet['idCategorie']) echo "selected"; ?>><?php echo $categorie['nom']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"><?php echo $objet['description']; ?></textarea>
                </div>
                <input type="submit" class="btn btn-info mx-5" value="Modifier">
                <a href="<?php echo site_url("/mesObjets/deleteObjet/".$objet['idObjet']); ?>" class="btn btn-danger mx-5">Supprimer</a>
            </form>
        </div>

        <div class="col-md-6 photos">
            <div class="col-md-12">
                <h4 class="mb-5">Les photos de votre objet</h4>
                <?php if (count($photos) < 4) { ?>
                    <?php echo form_open_multipart('upload/do_upload');?>
                        <input type="hidden" name="idObjet" value="<?php echo $objet['idObjet']; ?>">
                        
                        <label type="button" for="inputTag" class="btn btn-outline-success" ><i class="fas fa-plus-circle"></i> Choisir photo</label>
                        <input id="inputTag" type="file" name="userfile" size="20" class="file" onchange="updatePath()">
                        <p class="path" id="path"></p>
                        <input type="submit" class="btn btn-success mx-5 btn-sm" value="Valider" id="inputTag">
    
                    </form>
                <?php } ?>
                <hr>
            </div>

            <div class="row album">
                <?php foreach ($photos as $key => $photo) { ?>
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