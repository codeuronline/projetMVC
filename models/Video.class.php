<?php 
class Video{
    private $id;
    private $titre;
    private $duree;
    private $photo;
    //public static $videos;
    
    public function __construct($data){
        var_dump("dans l'objet video"); 
        var_dump("donnees de la variable data transmise à l'objet video");
         var_dump($data);
         extract($data);
        $this->id = $id;
        $this->titre = $titre;
        $this->duree = $duree;
        $this->photo= $photo;
    //    self::$videos[]= $this;
    }

    public function getId() {  return $this->id; }
    public function setId($id) { $this->id = $id; }
 
    public function getTitre() { return $this->titre; }
    public function setTitre($titre){ $this->titre = $titre; }

    public function getDuree(){ return $this->duree; } 
    public function setDuree($duree){ $this->duree = $duree; }
    public function getPhoto(){ return $this->photo; }
    public function setPhoto($photo){$this->photo = $photo; }
}?>