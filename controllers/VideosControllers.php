<?php

require_once "models/VideoManagerTmp.class.php";

class VideosController{

    private $videoManager;
    


    public function __contruct() {
        
        $this->videoManager= new VideoManager;
        
        $this->videoManager->chargementVideos();
    }
    
    public function afficherVideo($id){
        if(!$this->videoManager){
            echo 'succes';
        }
        
        $video= $this->videoManager->getVideoById($id);
         require "views/afficherVideo.view.php";    
    }
    
    public function afficherVideos(){
                //$videos= $this->videoManager->getVideos();
                 require "views/videos.php";
    }
    
    public function ajoutVideo(){
        require "views/ajoutVideo.view.php";
    }
    
    public function ajoutVideoValidation(){
        
        $data=$_POST;
        $file = $_FILES['photo'];
        $repertoire= "public/images/";
        $data['photo']=$this->ajoutImage($file,$repertoire);
        // $nomImageAjoute=$this->ajoutImage($file,$repertoire);
        var_dump($data);
             
        $this->videoManager->ajoutVideoBd($data);
     
        header('Location: '.URL.'videos');
        
    }
    private function ajoutImage($file,$dir){
        $imageValide=['jpg','jpeg','gif','png','jfif'];
        
        if (!isset($file['name'])||empty($file['name'])) {
            throw new Exception("Vous devez indiquer une photo");   
        }
        if (!file_exists($dir)) mkdir($dir,0777);
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $date=date("ymdis");
        $targetfile= $dir.$date."_".$file["name"];
        
        /*if (!getimagesize($file["tmp_name"])) {
            throw new Exception("Le fichier n'est pas une image");
        }*/
        if (!in_array($extension,$imageValide)){
            throw new Exception("L'extension du fichier n'est pas reconnu");
        }
        if (file_exists($targetfile)) {
            throw new Exception("Le fichier existe déjà");
            
        }
        if ($file['size']>500000) {
            throw new Exception("Le fichier est trop gros");
        }
        if (!move_uploaded_file($file['tmp_name'],$targetfile)) {
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        }else return ($date."_".$file['name']);
    }
    
    



    
}