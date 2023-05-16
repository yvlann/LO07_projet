
<!-- ----- debut ModelVin -->

<?php
require_once 'Model.php';

class ModelPersonne {
 private $id, $nom, $prenom, $adresse, $login, $password, $statut, $specialite_id;
 
 const ADMINISTRATEUR = 0;
 const PRATICIEN = 1;
 const PATIENT = 2;


 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $adresse = NULL, $login = NULL, $password = NULL, $statut = NULL, $specialite_id = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->adresse = $adresse;
   $this->login = $login;
   $this->password = $password;
   $this->statut = $statut;
   $this->specialite_id = $specialite_id;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setNom($nom) {
  $this->nom = $nom;
 }

 function setPrenom($prenom) {
  $this->prenom = $prenom;
 }

 function setAdresse($adresse) {
  $this->adresse = $adresse;
 }

 function setLogin($login) {
  $this->login = $login;
 }
 
 function setPassword($password) {
  $this->password = $password;
 }
 
 function setStatut($statut) {
  $this->statut = $statut;
 }
 
 function setSpecialite_id($specialite_id) {
  $this->specialite_id = $specialite_id;
 }
 

 
 function getId() {
  return $this->id;
 }

 public function getNom() {
  return $this->nom;
 }

 public function getPrenom() {
  return $this->prenom;
 }

 function getAdresse() {
  return $this->adresse;
 }
 
 function getLogin() {
  return $this->login;
 }

 function getPassword() {
  return $this->password;
 }

 function getStatut() {
  return $this->statut;
 }

 function getSpecialite_id() {
  return $this->specialite_id;
 }
 

 public static function getAllPraticien() {
  try {
   $database = Model::getInstance();
   $query = "select * from personne where statut=1 AND id>0";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getAllPatient() {
  try {
   $database = Model::getInstance();
   $query = "select * from personne where statut=2 AND id>0";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 public static function getAllAdministrateur() {
  try {
   $database = Model::getInstance();
   $query = "select * from personne where statut=0 AND id>0";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
  public static function getOnePersonne($login) {
  try {
   $database = Model::getInstance();
   
   $query = "select * from personne where login = :login";
   $statement = $database->prepare($query);
   $statement->execute([
     'login' => $login
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   
   return $results[0];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 //fetch personne par id
   public static function getOnePersonneId($id) {
  try {
   $database = Model::getInstance();
   
   $query = "select * from personne where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   
   return $results[0];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
  
 }
 
  //verifier personne par login et password
public static function verifierPersonne($login,$password) {
  try {
   $database = Model::getInstance();
   
   $query = "select * from personne where login = :login AND password= :password";
   $statement = $database->prepare($query);
   $statement->execute([
     'login' => $login, 'password' => $password
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   
   return $results[0];
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
}
 //======================================================================================================================
// retourne une liste des id
 public static function getAllId() {
  try {
   $database = Model::getInstance();
   $query = "select id from personne";
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
<!-- ----- fin ModelVin -->
