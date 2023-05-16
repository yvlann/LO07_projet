
<!-- ----- debut ModelRDV -->

<?php
require_once 'Model.php';

class ModelRDV {
 private $id, $patient_id, $praticien_id, $rdv_date;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $patient_id = NULL, $praticien_id = NULL, $rdv_date = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->patient_id = $patient_id;
   $this->praticien_id = $praticien_id;
   $this->rdv_date = $rdv_date;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setPatient_id($patient_id) {
  $this->patient_id = $patient_id;
 }

 function setPraticien_id($praticien_id) {
  $this->praticien_id = $praticien_id;
 }

 function setRdv_date($rdv_date) {
  $this->rdv_date = $rdv_date;
 }

 function getId() {
  return $this->id;
 }

 function getPatient_id() {
  return $this->patient_id;
 }

 function getPraticien_id() {
  return $this->praticien_id;
 }

 function getRdv_date() {
  return $this->rdv_date;
 }
 
 
  public static function getPraticienNb() {
  try {
   $database = Model::getInstance();
   $query = "SELECT patient_id, COUNT(praticien_id) FROM `rendezvous` WHERE patient_id>0 GROUP BY patient_id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = array();
   while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
    $patientId = $row['patient_id'];
    $count = $row['COUNT(praticien_id)'];

    // add to $results
    $results[$patientId] = $count;
    echo($results[$patientId]);
}
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 
  public static function getAllRdvOccupied() {
  try {
   $database = Model::getInstance();
   $query = "select * from rendezvous WHERE patient_id>0";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 //return available RDV of $current
   public static function getDisponibilite($pid) {
  try {
   $database = Model::getInstance();
   
   $query = "select * from rendezvous where praticien_id = :pid AND patient_id=0";
   $statement = $database->prepare($query);
   $statement->execute([
     'pid' => $pid
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 //return RDV of praticien_id
    public static function getMesRdv($pid) {
  try {
   $database = Model::getInstance();
   
   $query = "select * from rendezvous where praticien_id = :pid AND patient_id>0";
   $statement = $database->prepare($query);
   $statement->execute([
     'pid' => $pid
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
//retourner RDV selon patient_id
    public static function getPatientRdv($pid) {
  try {
   $database = Model::getInstance();
   
   $query = "select * from rendezvous where patient_id = :pid ";
   $statement = $database->prepare($query);
   $statement->execute([
     'pid' => $pid
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 

 
 //retourner RDV selon id
    public static function getRdv($id) {
  try {
   $database = Model::getInstance();
   
   $query = "select * from rendezvous where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
   
   return $results[0];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  public static function insertDisponibilite($patient_id, $praticien_id, $rdv_date) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from rendezvous";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into rendezvous value (:id, :patient_id, :praticien_id, :rdv_date)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'patient_id' => $patient_id,
     'praticien_id' => $praticien_id,
     'rdv_date' => $rdv_date
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 
 
    public static function checkDisponibilite($date,$pid) {
  try {
   $database = Model::getInstance();
   $date=$date."%";
   
   $query = "SELECT * FROM `rendezvous` WHERE rdv_date LIKE :date AND praticien_id= :pid ";
   $statement = $database->prepare($query);
   $statement->execute([
     'date' => $date,
     'pid' => $pid
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 //================================================================================================
// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from producteur";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "select * from producteur";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from producteur where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($nom, $prenom, $region) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from producteur";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into producteur value (:id, :nom, :prenom, :region)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'region' => $region
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function update() {
  echo ("ModelVin : update() TODO ....");
  return null;
 }

 public static function delete() {
  echo ("ModelVin : delete() TODO ....");
  return null;
 }
 
 
 
  public static function getAllRegion() {
  try {
   $database = Model::getInstance();
   $query = "SELECT DISTINCT region FROM producteur";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 
 
  public static function getNombreRegion() {
  try {
   $database = Model::getInstance();
   $query = "SELECT region, COUNT(id) FROM `producteur` GROUP BY region";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_NUM);
   
   
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>
<!-- ----- fin ModelRDV -->
