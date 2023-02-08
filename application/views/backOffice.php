<link rel="stylesheet" href="<?php echo base_url("assets/css/backOffice.css"); ?>">
<div class="container">
    <h1>Bienvenue Admin</h1>
    <hr class="separation">
    <div class="row">
        <div class="col-md-3 listes-categories">
        <div class="list-group">
            <h4>Listes des categories</h4>

            <ul class="list-group">
                <a class="list-group-item bg-dark creation" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    Nouveau categorie <i class="fas fa-plus icone"></i> 
                </a>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <p>Nom du nouveau categorie </p>
                        <form action="<?php echo site_url('backOffice/newCategorie'); ?>" method="post">
                            <input type="text" name="nom" class="form-control">
                            <input type="submit" value="Ajouter" class="btn btn-success mt-3">
                        </form>
                    </div>
                </div>
                <?php foreach ($categories as $categorie) { ?>
                    <li class="list-group-item categorie-list">
                        <div class="row">
                            <div class="col-md-8">
                                <?php echo $categorie['nom']; ?>
                            </div>
                            <div class="col-md-2">
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="updateName(<?php echo $categorie['idCategorie']; ?>, '<?php echo $categorie['nom']; ?>')"><i class="far fa-edit icone" ></i></a>
                            </div>
                            <div class="offset-md-1 col-md-1">
                                <a href="<?php echo site_url('backOffice/deleteCategorie'); ?>/<?php echo $categorie['idCategorie']; ?>"><i class="fas fa-trash icone" ></i></a>
                            </div>
                        </div>
                    </li>
                <?php } ?>
            </ul>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <p>Modifier le nom du categorie</p>
                        <form action="<?php echo site_url('backOffice/updateCategorie'); ?>" method="post">
                            <input type="hidden" name="idCategorie" value="" id="idCategorie">
                            <input type="text" name="nom" class="form-control" value="" id='nomCategorie'>
                            <input type="submit" value="Ajouter" class="btn btn-success mt-3">
                        </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
                </div>
            </div>
            </div>

        </div>
        </div>
    </div>
</div>

<script>
    function updateName(idCategorie, categorie) {
        var inputNom = document.getElementById('nomCategorie');
        inputNom.value = categorie;

        var inputId = document.getElementById('idCategorie');
        inputId.value = idCategorie;
    }
</script>
