<?php ob_start() ?>

<form action="<?=URL?>votes/valider" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
        <label for="vote" class="form-label">Vote</label>
        <input class="form-control" id="vote" name="vote">
    </div>
    <div class="mb-3">
        <label for="image" class="form-label">Image</label>
        <input class="form-control" type="file" id="image" name="image">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
$titre = "Ajout d'un vote";
$content = ob_get_clean();
require_once "views/template.php";
