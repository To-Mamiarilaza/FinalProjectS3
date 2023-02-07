<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/fonts/fontawesome-5/css/all.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/login.css"); ?>">
    <title>Page de login</title>
</head>
<body>
    <div class="container login-div row">
        <div class="col-md-7 form-div row">
            <h1 class="mb-4"> Bienvenue dans <strong>Takalo-Takalo</strong>, un plateforme d'echange d'objet.</h1> 
            <p>Nous vous aidons a trouver l'objet que vous chercher et a simplifier les enchanges.</p>
            <div class="choix col-md-6">
                <a href="<?php echo site_url("login/index"); ?>">
                    <h2>
                        Login
                    </h2>
                </a>
            </div>
            <div class="choix col-md-6">
                <a href="<?php echo site_url("login/inscription"); ?>">
                    <h2>
                        Sign up
                    </h2>
                </a>
            </div>
            <form action="<?php echo site_url("login/checkLoginUser"); ?>" method="POST" class="col-md-12 champs form mt-3">
                <div>
                    <i class="fas fa-user"></i><input type="email" name="mail" class="form-control" placeholder="Entrer votre username" value="<?php if (isset($nom)) echo $nom; ?>">
                </div>
                <div class="mt-3">
                    <i class="fas fa-lock"></i><input type="password" name="mdp" class="form-control" placeholder="Entrer votre mot de passe" value="rakoto">
                </div>
                <?php if (isset($erreur)) { ?><div class="erreur">Nom ou Mot de passe incorrecte.</div><?php } ?>
                <div class="row connexionManager">
                    <div class="col-md-6">
                        <a href="<?php echo site_url("login/loginAdmin"); ?>" class="client-connexion mt-4">Connexion ADMIN</a>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-success connexion mt-4">Connexion</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-5 img">
            <img src="<?php echo base_url("assets/images/login-images.jpg"); ?>" alt="">
        </div>

    </div>
</body>
</html>