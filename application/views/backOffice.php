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
                        <form action="">
                            <input type="text" name="nom" class="form-control">
                            <input type="button" value="Ajouter" class="btn btn-success mt-3">
                        </form>
                    </div>
                </div>
                <li class="list-group-item categorie-list">
                    <div class="row">
                        <div class="col-md-8">
                            Livre
                        </div>
                        <div class="col-md-2">
                            <a href=""><i class="far fa-edit icone" ></i></a>
                        </div>
                        <div class="offset-md-1 col-md-1">
                            <a href=""><i class="fas fa-trash icone" ></i></a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                            Cuisine
                        </div>
                        <div class="col-md-2">
                            <a href=""><i class="far fa-edit icone" ></i></a>
                        </div>
                        <div class="offset-md-1 col-md-1">
                            <a href=""><i class="fas fa-trash icone" ></i></a>
                        </div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-8">
                            Bricolage
                        </div>
                        <div class="col-md-2">
                            <a href=""><i class="far fa-edit icone" ></i></a>
                        </div>
                        <div class="offset-md-1 col-md-1">
                            <a href=""><i class="fas fa-trash icone" ></i></a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        </div>
    </div>
</div>