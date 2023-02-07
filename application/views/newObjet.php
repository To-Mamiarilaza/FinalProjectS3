<link rel="stylesheet" href="<?php echo base_url("assets/css/newObjet.css"); ?>">
<div class="container">
    <h1>Ajout d'un nouvel objet</h1>
    <p>Veillez remplir les formulaires s'il vous plait.</p>

    <form action="<?php echo site_url("/mesObjets/insertNewObjet") ?>" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Nom de l'objet</label>
            <input type="text" name="nom" class="form-control" id="exampleFormControlInput1" placeholder="Entrer le nom ici">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Prix de l'objet</label>
            <input type="text" name="prix" class="form-control" id="exampleFormControlInput1" placeholder="Entrer le prix ici">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Categorie</label>
            <select name="idCategorie" id="" class="form-select">
                <?php foreach ($categories as $categorie) { ?>
                    <option value="<?php echo $categorie['idCategorie']; ?>"><?php echo $categorie['nom']; ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
        </div>
        <div class="placement">
            <input type="submit" class="btn btn-info valider" value="Ajouter">
        </div>
    </form>
</div>