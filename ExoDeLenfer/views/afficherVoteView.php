<?php ob_start() ?>

<div class="row">
    <div class="col-6">
        <img src="<?=URL?>public/images/<?=$vote->getImage()?>" alt="">
    </div>
    <div class="col-6">
        <p>Username : <?=$vote->getUsername()?></p>
        <p>Vote : <?=$vote->getVote()?></p>
    </div>
</div>

<?php
$titre = $vote->getUsername();
$content = ob_get_clean();
require_once "views/template.php";