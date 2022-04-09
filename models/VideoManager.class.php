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
        $pdo = $this->getBdd()->prepare("SELECT * FROM videos");
        $pdo->execute();
        $mesVideos = $pdo->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeCursor();
        foreach($mesVideos as $video){
                    $v= new Video($video['id'],$video['titre'],$video['duree'],$video['photo']);
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
                    
    public function ajoutVideoBd($titre,$duree,$photo){
        //extract($data);
        $sql = "INSERT INTO videos (titre,duree,photo) VALUES (:titre,:duree,:photo) ";
        $pdo= $this->getBdd()->prepare($sql);
        //foreach ($data as $key => $value) {
            $pdo->bindValue(":titre" . $titre, PDO::PARAM_STR); # code...
            $pdo->bindValue(":duree" , $duree, PDO::PARAM_STR); # code...
            $pdo->bindValue(":photo" . $photo, PDO::PARAM_STR); # code...
        // }
        $resultat=$pdo->execute();
        $pdo->closeCursor;
        
        if ($resultat>0) {
            //on injecte l'id dans la liste des videos
            $id = $this->getBdd()->lastInsertId();
                $video = new Video($id,$titre,$duree,$photo) ;
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
    
    public function modificationLivreBD($id,$titre,$duree,$photo){
        $req = "UPDATE Videos SET titre=:titre, duree=:duree, phto=:photo WHERE id=:id";
        $pdo = $this->getBdd()->prepare($req);
        $pdo->bindValue(":id",$id,PDO::PARAM_INT);
        $pdo->bindValue(":titre",$titre,PDO::PARAM_STR);
        $pdo->bindValue(":duree",$duree,PDO::PARAM_STR);
        $pdo->bindValue(":photp",$photo,PDO::PARAM_STR);
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