
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
 
    //retourne un hashliste signifie chaque patient a combien de praticien
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
 
    //retourne des instances ModelRDV ne sont pas disponible
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
 
    //return available patricien of $current
    public static function getDisponibiliteId() {
        try {
            $database = Model::getInstance();

            $query = "select DISTINCT praticien_id from rendezvous where patient_id=0";
            $statement = $database->prepare($query);
            $statement->execute();


            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);

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
            $query = "select * from rendezvous where patient_id = :pid ORDER BY rdv_date ASC";
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
 
 
    //insérer RDV à la fin
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
 
    //vérifier si le date est disponible
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
 
    //noter le id de patient dans le RDV
    public static function updateRdv($id_rdv,$id_patient) {
        try {
            $database = Model::getInstance();
            $query = "UPDATE rendezvous SET patient_id = :id_patient WHERE id = :id_rdv;";
            $statement = $database->prepare($query);
            $statement->execute([
              'id_patient' => $id_patient,'id_rdv' => $id_rdv ]);

            if($statement){
                $query="SELECT * FROM `rendezvous` WHERE id= :id_rdv ";
                $statement = $database->prepare($query);
                $statement->execute([
                   'id_rdv' => $id_rdv
                ]);

                $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelRDV");
                return $results[0];
            } 
            return $statement;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>
<!-- ----- fin ModelRDV -->
