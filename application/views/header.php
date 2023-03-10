<link rel="stylesheet" href="<?php echo base_url("assets/css/header.css"); ?>">
<nav class="navbar navbar-expand-lg navbar-light menu">
  <div class="container-fluid">
    <a class="navbar-brand icon" href="#"><span class="green-style">Takalo</span>-takalo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0 lien-nav">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo site_url("mesObjets/index"); ?>">Mes objets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url("echange/index"); ?>">Voir des objets</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url("echange/gestionEchange"); ?>">Echanges</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url("login/deconnectClient"); ?>">Deconnecter ( <?php echo $this->session->userdata['userId']->nom; ?> ) </a>
        </li>
      </ul>
    </div>
  </div>
</nav>