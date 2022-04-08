<?php
require_once "Model.class.php";
require_once "Video.class.php";

class VideoManager extends Model{

    public $videos;
    
    public function ajoutVideo($video)
    {
        $this->videos[] = $video;
}



public function getVideos()
{
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
            var_dump($id."?=".$i);
            if ($this->videos[$i]->getId()=== $id){
                return $this->videos[$i];
            }
        }
    }
    
    public function ajoutVideoBd($data){
    extract($data);
    $sql ="INSERT INTO videos(titre,duree,photo) VALUES (:titre,:duree,:photo) ";
    $pdo= $this->getBdd()->prepare($sql);
    foreach ($data as $key => $value) {
    $pdo->bindValue(":".$key, $value,PDO::PARAM_STR); # code...
    }
    
    $resultat=$pdo->execute();
    $pdo->closeCursor;
    if ($resultat>0) {
    $data['id']=$this->getBdd()->lastInsertId();
            // $video = new Video($data) ;
            $this->ajoutVideo(new Video($data));
    }
    }

    }

    ?>