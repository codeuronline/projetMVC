<?php
require_once "Model.class.php";
require_once "Video.class.php";

class VideoManager extends Model{

    public $videos;
    
    public function ajoutVideo($video){
        var_dump("ajout de Video à la liste Videos:");
        var_dump($video);
        $this->videos[] = $video;
    }
    
    public function getVideos(){
        return $this->videos;
    }

    public function chargementVideos(){
        
        $pdo = $this->getBdd()->prepare("SELECT * FROM videos");
        $pdo->execute();
        $mesVideos = $pdo->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeCursor();
         foreach($mesVideos as $video){
            var_dump("chargement des données Video provenant de la BD : ");
            var_dump($video);
            $v= new Video($video);
            var_dump("conversion en objet product avec les données data : ");
            var_dump($v);
                    $this->ajoutVideo($v);                      
        }
    }
    
    public function getVideoById($id){
        for ($i=0; $i < count($this->videos); $i++) {
            if ($this->videos[$i]->getId() === $id) {
                return $this->videos[$i];
            }
        }
    }
                    
    public function ajoutVideoBd($data){
        extract($data);
        $sql = "INSERT INTO videos (id,titre,duree,photo) VALUES (NULL,:titre,:duree,:photo) ";
        $pdo= $this->getBdd()->prepare($sql);
        foreach ($data as $key => $value) {
            $pdo->bindValue(":$key" , $value, PDO::PARAM_STR);
         }
                
        $resultat=$pdo->execute();
        $pdo->closeCursor;
        
        if ($resultat>0) {
            //on injecte l'id dans la liste des videos
            $data['id'] = $this->getBdd()->lastInsertId();
                $video = new Video($data) ;
                $this->ajoutVideo($video);
        }
    }


    public function suppressionVideoBd($id)
    {

        $req = "DELETE FROM videos WHERE id=:id";

        $pdo = $this->getBdd()->prepare($req);

        $pdo->bindValue(":id", $id, PDO::PARAM_INT);
        $resultat = $pdo->execute();
        $pdo->closeCursor();
        if ($resultat > 0) {
            $video = $this->getVideoById($id);
            unset($video);
        }
    }
    
    public function modificationVideoBd($data){
        extract($data);
        $sql = "UPDATE Videos SET titre=:titre, duree=:duree, phto=:photo WHERE id=:id";
        $pdo = $this->getBdd()->prepare($sql);
        $pdo->bindValue(":id",$id,PDO::PARAM_INT);
        foreach ($data as $key => $value) {
            
         $pdo->bindValue(":".$key,$value,PDO::PARAM_STR);
            
        }
        $resultat = $pdo->execute();
        $pdo->closeCursor();
        if($resultat > 0){
            $this->getVideoById($id)->setTitre($titre);
            $this->getVideoById($id)->setDuree($duree);
            $this->getvideoById($id)->setTitre($photo);
        }
    }
}
  
?>