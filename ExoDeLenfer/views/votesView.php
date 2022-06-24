<?php 
ob_start();
?>


<table class="table text-center">
    <tr class="table-dark">
        <th>Image</th>
        <th>Username</th>
        <th>votes</th>

    </tr>
    <?php
    foreach($votes as $vote) {
    ?>
    <tr class="align-middle">
        <td class="align-middle"><img src="public/images/<?=$vote->getImage()?>" alt="" width="60px;"></td>
        <td class="align-middle"><a href="<?=URL?>votes/consulter/<?=$vote->getId()?>"><?= $vote->getUsername() ?></a></td>
        <td class="align-middle"><?= $vote->getVote() ?></td>
       
    </tr>
    <?php
    }
    ?>
</table>
<a href="<?=URL?>votes/ajouter" class="btn btn-success d-block">Ajouter</a>

<?php
$titre = "Liste des votes";
$content = ob_get_clean();
require_once "views/template.php";