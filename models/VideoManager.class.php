<?php
require_once "Model.class.php";
require_once "Video.class.php";

class VideoManager extends Model{

    public $videos;
    
    public function ajoutVideo($video){
        $this->videos[] = $video;
    }
    
    public function getVideos(){
        return $this->videos;
    }

    public function chargementVideos(){
        $req = $this->getBdd()->prepare("SELECT * FROM videos");
        $req->execute();
        $mesVideos = $req->fetchAll();
        $req->closeCursor();
        foreach($mesVideos as $video){
                    $this->ajoutVideo(new Video($video));
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
        //extract($data);
        $sql = "INSERT INTO videos (titre,duree,photo) VALUES (:titre,:duree,:photo) ";
        $pdo= $this->getBdd()->prepare($sql);
        foreach ($data as $key => $value) {
            $pdo->bindValue(":" . $key, $value, PDO::PARAM_STR); # code...
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


    public function suppressionLivreBD($id)
    {

        $req = "DELETE FROM livres WHERE id=:idLivre";

        $pdo = $this->getBdd()->prepare($req);

        $pdo->bindValue(":idLivre", $id, PDO::PARAM_INT);
        $resultat = $pdo->execute();
        $pdo->closeCursor();
        if ($resultat > 0) {
            $video = $this->getVideoById($id);
            unset($video);
        }
    }
    
    public function modificationLivreBD($data){
        extract($data);
        $req = "UPDATE Videos SET titre=:titre, duree=:duree, phto=:photo WHERE id=:id";
        $pdo = $this->getBdd()->prepare($req);
        $pdo->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":titre",$titre,PDO::PARAM_STR);
        $stmt->bindValue(":duree",$duree,PDO::PARAM_STR);
        $stmt->bindValue(":photp",$photo,PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if($resultat > 0){
            $this->getVideoById($id)->setTitre($titre);
            $this->getVideoById($id)->setDuree($duree);
            $this->getvideoById($id)->setTitre($photo);
        }
    }
}
  
?>