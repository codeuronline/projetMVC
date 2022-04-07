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
        if (count($this->videos)>0) 
            return $this->videos;
         else {
            throw new Exception("pas de video trouvé", 1);
        }
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
     public function getVideoById($id){
        for ($i=0; $i < count($this->videos); $i++) { 
        if ($this->videos[$i]->getId()=== $id){
            return $this->videos[$i];
        } else { 
            echo "identifiant inexistant";
        }
        } 
     }
    
}
    
?>