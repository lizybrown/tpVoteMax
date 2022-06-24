<?php

require_once "models/ModelClass.php";
require_once "models/VoteClass.php";

class VoteManager extends Model {

    private $votes = [];

    public function ajoutVote($vote) {
        $this->votes[] = $vote;
    }

    public function getVotes() {
        return $this->votes;
    }

    public function getVoteById($id) {
        foreach($this->votes as $vote) {
            if ($vote->getId() === $id) {
                return $vote;
            }
        }
    }

    public function chargementVotes() {
        $sql = "SELECT * FROM votes";
        $req = $this->getBdd()->prepare($sql);
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_OBJ);
        foreach($data as $value) {
            $add = new vote($value->id,$value->username,$value->image,$value->vote);
            $this->ajoutVote($add);
        }
    }

    public function ajoutVoteBD($username,$vote,$image){
        $sql = "INSERT INTO votes (username, vote, image) values (:username,:vote,:image)";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":username"=>$username,
            ":vote"=>$vote,
            ":image"=>$image
        ]);
    }

    public function supprimerVoteBD($id) {
        $sql = "DELETE FROM votes WHERE id = :id";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":id" => $id
        ]);
    }

    public function modifierVoteBD($id,$username,$vote,$image) {
        $sql = "UPDATE votes SET username = :username, vote = :vote, image = :image WHERE id = :id";
        $req = $this->getBdd()->prepare($sql);
        $req->execute([
            ":username" => $username,
            ":vote" => $vote,
            ":image" => $image,
            ":id" => $id
        ]);
    }
}