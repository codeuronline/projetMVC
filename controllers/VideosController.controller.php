<?php

require_once "models/VideoManager.class.php";

class VideosController{

    private $videoManager;

    public function __contruct() {
        
        $this->videoManager= new VideoManager;
        
        $this->videoManager->chargementVideos();
    }
    
    public function afficherVideo($id){
        $video= $this->videoManager->getVideoById($id);
         require "views/afficher.view.php";    
    }
    
    public function afficherVideos(){
                $videos= $this->videoManager->getVideos();
                 require "views/video.view.php";
    }
    public function ajoutVideo(){
        require "views/ajoutVideo.view.php";
    }
}