<link rel="stylesheet" href="<?php echo base_url("assets/css/"); ?>">
<div class="container">
    <center>
    <h1>Listes de tous les historiques de mon objets</h1>
    <div class="listes">
        <table border="5 px sodid">
            <th>Ancien proprietaire</th>
            <th>Date d'echange</th>
            <th>Nouveau proprietaire</th>
            <?php for ($i=0; $i <count($histo) ; $i++) {  ?>
            <tr>
                <td><?php echo $ancien[$i]; ?> </td>
                <td><?php echo $histo[$i]['dateHeureDemande']; ?> - <?php echo $histo[$i]['dateHeureAccepte']; ?></td>
                <td><?php echo $nouveau[$i]; ?></td>
            </tr>
            <?php } ?>
        </table>
    </center>
    </div>
</div>