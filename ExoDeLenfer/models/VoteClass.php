<?php

class Vote {

    private $id;
    private $username;
    private $image;
    private $vote;

    public function __construct($id,$username,$image,$vote) {
        $this->id = $id;
        $this->username = $username;
        $this->image = $image;
        $this->vote = $vote;
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getUsername() {
        return htmlspecialchars($this->username);
    }
    public function setUsername($username) {
        $this->username = $username;
    }

    public function getImage() {
        return $this->image;
    }
    public function setImage($image) {
        $this->image = $image;
    }

    public function getVote() {
        return $this->vote;
    }
    public function setVote($vote) {
        $this->vote = $vote;
    }
}