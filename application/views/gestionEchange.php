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
                <tr>
                    <td><a href="">Voiture</a></td>
                    <td><a href="">Maison</a></td>
                    <td>
                        <a href="" class="btn btn-warning btn-sm">Annuler</a>
                    </td>
                </tr>
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
                            <td><a href="">Voiture</a></td>
                            <td><a href="">Maison</a></td>
                            <td>
                                <a href="" class="btn btn-danger btn-sm mx-2">Refuser</a>
                                <a href="" class="btn btn-success btn-sm mx-2">Accepter</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
</div>