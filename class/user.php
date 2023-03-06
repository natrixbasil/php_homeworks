<?php
class User{
    // Connection
    private $conn;
    // Table
    private $db_table = "users";
    // Columns
    public $id;
    public $name;
    public $email;
    public $age;
    // Db connection
    public function __construct($db){
        $this->conn = $db;
    }
    // GET ALL
    public function getUsers(){
        $query = "SELECT user.id, user.username, user.name, city.cityname FROM " . $this->table_name . " LEFT JOIN city ON user.city_id = city.id";
        $stmt->execute();
        return $stmt;
    }
    // CREATE
    public function createUser(){
        $sqlQuery = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        username = :username, 
                        name = :name, 
                        city_id = :city_id";

        $stmt = $this->conn->prepare($sqlQuery);

        // sanitize
        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->city_id=htmlspecialchars(strip_tags($this->city_id));

        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":city_id", $this->city_id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // UPDATE
    public function updateUser(){
        $sqlQuery = "UPDATE
                        ". $this->db_table ."
                    SET
                        username = :username, 
                        name = :name, 
                        city_id = :city_id, 
                    WHERE 
                        id = :id";

        $stmt = $this->conn->prepare($sqlQuery);

        $this->username=htmlspecialchars(strip_tags($this->username));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->city_id=htmlspecialchars(strip_tags($this->city_id));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind data
        $stmt->bindParam(":username", $this->username);
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":city_id", $this->city_id);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
    // DELETE
    function deleteUser(){
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(1, $this->id);

        if($stmt->execute()){
            return true;
        }
        return false;
    }
}
?>
