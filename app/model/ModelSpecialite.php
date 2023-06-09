
<!-- ----- debut ModelSpecialite -->

<?php
require_once 'Model.php';

class ModelSpecialite {
    private $id, $label;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLabel($label) {
        $this->label = $label;
    }

 

    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
    }

    // retourne une liste des id
    public static function getAllId() {
        try {
            $database = Model::getInstance();
            $query = "select id from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
 
    //on peut optimiser par cette fonction
    public static function getMany($query) {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelSpecialite");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    //retourne tous les instances ModelSpecialite
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite";
            $statement = $database->prepare($query);
            $statement->execute();
            $cols = [];
            for ($i = 0; $i < $statement->columnCount(); $i++) {
                $colInfo = $statement->getColumnMeta($i);
                $cols[] = $colInfo['name'];
            }
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            return array($cols, $data);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return array([], []);
        }
    }
 
    //retourne une instance ModelSpecialite selon son id mais attention dans une liste
    public static function getOne($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from specialite where id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
              'id' => $id
            ]);
            $cols = [];
            for ($i = 0; $i < $statement->columnCount(); $i++) {
                $colInfo = $statement->getColumnMeta($i);
                $cols[] = $colInfo['name'];
            }
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            return array($cols, $data);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return array([], []);
        }
    }

    //insérer specialite à la fin
    public static function insert($label) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from specialite";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "insert into specialite value (:id, :label)";
            $statement = $database->prepare($query);
            $statement->execute([
              'id' => $id,
              'label' => $label,
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    public static function getSpecialiteNRDVVille() {
        try {
            $database = Model::getInstance();
            $query = "SELECT p.adresse AS ville, s.label AS specialité, COUNT(*) AS n_rdv FROM rendezvous r JOIN personne p ON r.praticien_id = p.id JOIN specialite s ON p.specialite_id = s.id GROUP BY p.adresse, s.label ORDER BY n_rdv DESC;";
            $statement = $database->prepare($query);
            $statement->execute();
            
            $cols = [];
            for ($i = 0; $i < $statement->columnCount(); $i++) {
                $colInfo = $statement->getColumnMeta($i);
                $cols[] = $colInfo['name'];
            }
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            return array($cols, $data);
        } catch (Exception $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return array([], []);
        }
    }
    
    public static function getPraticienRankRDV() {
        try {
            $database = Model::getInstance();
            $query = "SELECT r.praticien_id, p.nom, p.prenom, s.label, COUNT(*) AS n_rdv FROM rendezvous r JOIN personne p ON r.praticien_id = p.id JOIN specialite s ON p.specialite_id = s.id GROUP BY r.praticien_id ORDER BY n_rdv DESC;";
            $statement = $database->prepare($query);
            $statement->execute();
            
            $cols = [];
            for ($i = 0; $i < $statement->columnCount(); $i++) {
                $colInfo = $statement->getColumnMeta($i);
                $cols[] = $colInfo['name'];
            }
            $data = $statement->fetchAll(PDO::FETCH_ASSOC);

            return array($cols, $data);
        } catch (Exception $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return array([], []);
        }
    }
}
?>
<!-- ----- fin ModelSpecialite -->
