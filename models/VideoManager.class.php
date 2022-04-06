<?php 
require_once "Model.class.php";
require_once "Video.class.php";

class VideoManager  extends Model{
    
    private $videos;
    
    public function __construct(){
        
    }
    
    public function ajoutVideo($video){
    
        $this->videos[] = $video;
    }
    
       

    public function getVideos()
    {
        return $this->videos;
    }

    public function chargementVideos(){
        $req = $this->getBdd()->prepare("SELECT * FROM livres");
        $req->execute();
        $mesVideos = $req->fetchAll();
        $req->closeCursor();

        foreach($mesVideos as $video){
            $l = new Video($video['id'],$video['titre'],$video['duree'],$video['photo']);
            $this->ajoutVideo($l);
        }

        
    }
     
    
}
    
?>