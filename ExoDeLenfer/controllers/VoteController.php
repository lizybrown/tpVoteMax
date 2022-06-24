<?php

require_once "models/VoteManager.php";
require_once "controllers/GlobalController.php";

class VoteController {

    private $voteManager;

    public function __construct() {
        $this->voteManager = new VoteManager();
        $this->voteManager->chargementVotes();
    }

    public function afficherVotes() {
        $votes = $this->voteManager->getVotes();
        require "views/votesView.php";
    }

    public function afficherVote($id) {
        $vote = $this->voteManager->getVoteById($id);
        if (!$vote) {
            throw new Exception('Le vote que vous recherchez n\'existe pas.');
        }
        require "views/afficherVoteView.php";
    }

    public function ajoutVote() {
        require "views/ajoutVoteView.php";
    }

    public function ajoutVoteValidation() {

        $file = $_FILES['image'];
        $repertoire = "public/images/";
        $image = GlobalController::ajoutImage($_POST['username'],$file,$repertoire);
        $this->voteManager->ajoutVoteBD($_POST['username'],$_POST['vote'], $image);
        header("location:".URL."votes");

    }

    public function supprimerVote($id) {
        $monImage = $this->voteManager->getVoteById($id)->getImage();
        unlink("public/images/".$monImage);
        $this->voteManager->supprimerVoteBD($id);
        GlobalController::alert("success","Vote supprimé");
        header("location:".URL."votes");
    }

    public function modifierVote($id) {
        $vote = $this->voteManager->getVoteById($id);
        require "views/modifierVoteView.php";
    }

    public function modifierVoteValider() {
        $imgActuelle = $this->voteManager->getVoteById($_POST['id'])->getImage();
        $file = $_FILES['image'];

        if ($file['size'] > 0) {
            unlink("public/images/".$imgActuelle);
            $repertoire = "public/images/";
            $imgToAdd = GlobalController::ajoutImage($_POST['username'],$file,$repertoire);
        } else {
            $imgToAdd = $imgActuelle;
        }
        $this->loteManager->modifierVoteBD($_POST['id'],$_POST['username'],$imgToAdd);
        header("location:".URL."votes");
    }

}