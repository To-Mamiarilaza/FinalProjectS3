<link rel="stylesheet" href="<?php echo base_url("assets/css/detailObjet.css"); ?>">
<div class="container">
    <h1>Detail de l'objet : Voiture</h1>
    <p>Propriétaire : <?php ?></p>
    <form action="" method="POST">
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
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $objet['description']; ?></textarea>
        </div>
    </form>
</div>