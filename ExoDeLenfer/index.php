<?php
session_start();

require_once "controllers/VoteController.php";

define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? " https" : "http") . "://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

$voteController = new VoteController;

try {
    if (empty($_GET['page'])) {
        require "views/accueilView.php";
    } else {
        $url = explode("/", filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch ($url[0]) {
            case "accueil":
                require "views/accueilView.php";
                break;
            case "votes":
                if (empty($url[1])) {
                    $voteController->afficherVotes();
                } else if ($url[1] === "modifier") {
                    $voteController->modifierVote($url[2]);
                } else if ($url[1] === "modifValider") {
                    $voteController->modifierVoteValider();
                } else if ($url[1] === "supprimer") {
                    $voteController->supprimerVote($url[2]);
                } else if ($url[1] === "ajouter") {
                    $voteController->ajoutVote();
                } else if ($url[1] === "consulter") {
                    $voteController->afficherVote($url[2]);
                } else if ($url[1] === "valider") {
                    $voteController->ajoutVoteValidation();
                } else {
                    throw new Exception('Error 404, livres not found');
                }
                break;
            default:
                throw new Exception('Error 404, page not found'); 
        }
    }
} catch (Exception $e) {
    $msg = $e->getMessage();
    require "views/erreurView.php";
}
