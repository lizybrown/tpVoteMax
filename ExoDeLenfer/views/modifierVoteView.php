<?php ob_start() ?>

<form action="<?=URL?>votes/modifValider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" class="form-control" id="username" name="username" value="<?=$livre->getVoteById()?>">
    </div>
    <div class="mb-3">
        <label for="vote" class="form-label">Vote</label>
        <input type="number" class="form-control" id="vote" name="vote" value="<?=$vote->getVotes()?>">
    </div>
    <h3>Image : </h3>
    <img src="<?=URL?>public/images/<?=$livre->getImage()?>" alt="" width="180px">
    <div class="mb-3">
        <label for="image" class="form-label">Changer l'image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <input type="hidden" name="id" value="<?=$vote->getId()?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Modification du vote : ".$vote->getVoteById();
$content = ob_get_clean();
require_once "views/template.php";
