<?
require_once "VideoManager.class.php";
class VideosController{

    private $videoManager;

    public function __contruct() {
        $this->videoManager= new VideoManager;
        $this->videoManager->chargementVideos();
    }
       
    public function afficherVideos(){
        
        $videos=$this->videoManager->getVideos();
        require "views/video.view.php";
    }
}