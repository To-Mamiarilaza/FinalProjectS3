<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/fonts/fontawesome-5/css/all.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>">
    <title>Inscription</title>
</head>
<body>
    <div class="container login-div row">
        <div class="col-md-7 form-div row">
            <h1 class="mb-4"> Veuillez remplir les champs pour vous inscrire .</h1> 
            <div class="choix col-md-12">
                <h2>
                    Inscription
                </h2>
            </div>
            <form action="<?php echo site_url("login/checkLogin"); ?>" method="POST" class="col-md-12 champs form mt-3">
                <div>
                    <i class="fas fa-user"></i><input type="text" name="nom" class="form-control" placeholder="Entrer votre username">
                </div>
                <div class="mt-3">
                    <i class="fas fa-lock"></i><input type="password" name="mdp" class="form-control" placeholder="Entrer votre mot de passe">
                </div>
                <div class="mt-3">
                    <i class="fas fa-lock"></i><input type="password" name="mdp" class="form-control" placeholder="Confirmer votre mot de passe">
                </div>
                <button type="submit" class="btn btn-success connexion mt-4">Inscription</button>
            </form>
        </div>
        <div class="col-md-5 img">
            <img src="<?php echo base_url("assets/images/login-images.jpg"); ?>" alt="">
        </div>

    </div>
</body>
</html>