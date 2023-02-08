<link rel="stylesheet" href="<?php echo base_url("assets/css/gestionEchange.css"); ?>">
<div class="container">
    <h1>Listes de tous vos activites</h1>
    <hr>
    <div class="row">
        <div class="col-md-6 demande">
            <h5>Demandes envoyee</h5>
            <table class="table">
                <tr>
                    <th>Objet demandee</th>
                    <th>Objet echange</th>
                    <th>action</th>
                </tr>
                <?php foreach ($demandeEnvoyer as $demande) { ?>
                    <tr>
                            <td><a href="<?php echo site_url("mesObjets/detailObjet/".$demande['objetDemande']['idObjet']); ?>"><?php echo $demande['objetDemande']['nom']; ?></a></td>
                            <td><a href="<?php echo site_url("mesObjets/detailObjet/".$demande['objetEchange']['idObjet']); ?>"><?php echo $demande['objetEchange']['nom']; ?></a></td>
                            <td>
                                <a href="<?php echo site_url("echange/annulerEchange/".$demande['idEchange']); ?>" class="btn btn-warning btn-sm">Annuler</a>
                            </td>
                        </tr>
                <?php } ?>
            </table>
        </div>
        <div class="col-md-6 demande">
            <h5>Demandes recu</h5>
                <table class="table">
                    <tr>
                        <th>Objet demandee</th>
                        <th>Objet echange</th>
                        <th>action</th>
                    </tr>
                    <?php foreach ($demandeRecu as $demande) { ?>
                        <tr>
                            <td><a href=""><?php echo $demande['objetDemande']['nom']; ?></a></td>
                            <td><a href=""><?php echo $demande['objetEchange']['nom']; ?></a></td>
                            <td>
                                <a href="<?php echo site_url("echange/annulerEchange/".$demande['idEchange']); ?>" class="btn btn-danger btn-sm mx-2">Refuser</a>
                                <a href="<?php echo site_url("echange/accepterEchange/".$demande['idEchange']); ?>" class="btn btn-success btn-sm mx-2">Accepter</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
</div>