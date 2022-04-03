<?php

use React\Stream\ThroughStream; /* Is not being used*/

class GiverAppFunctions {
    // private $messageid;
    private $user_id;
    private $user_firstname;
    private $user_lastname;
    private $promo;
    private $user_email;
    private $user_pwd;
    private $message;
    private $created_on;
    protected $connect; 

    public function __construct() {
        require_once(dirname(__DIR__). '/database/database-connection.php');

        $database_object = new DatabaseConnect;
        $this->connect = $database_object->connect();
    }
    function setUserId($user_id) {
        $this->user_id = $user_id;
    }
    function getUserId() {
        return $this->user_id;
    }
    function setUserFirstName($user_firstname) {
        $this->user_firstname = $user_firstname;
    }
    function getUserFirstName() {
        return $this->user_firstname;
    }
    function setUserLastName($user_lastname) {
        $this->user_lastname = $user_lastname;
    }
    function getUserLastName() {
        return $this->user_lastname;
    }
    function setUserPromo($promo) {
        $this->promo = $promo;
    }
    function getUserPromo() {
        return $this->promo;
    }
    function setUserEmail($user_email) {
        $this->user_email = $user_email;
    }
    function getUserEmail() {
        return $this->user_email;
    }
    function setUserPwd($user_pwd) {
        $this->user_pwd = $user_pwd;
    }
    function getUserPwd() {
        return $this->user_pwd;
    }

    function setMessage($message) {
        $this->message = $message;
    }
    function getMessage() {
        return $this->message;
    }

    function setCreatedOn($created_on) {
        $this->created_on = $created_on;
    }
    function getCreatedOn() {
        return $this->created_on;
    }

    function save_data() {
        $query = "INSERT INTO users (user_firstname, user_lastname, promo, user_email, user_pwd, createdOn) VALUES (:user_firstname, :user_lastname, :promo, :user_email, :user_pwd, NOW())";

        $stmt = $this->connect->prepare($query);
        $stmt->bindParam(':user_firstname', $this->user_firstname);
        $stmt->bindParam(':user_lastname', $this->user_lastname);
        $stmt->bindParam(':promo', $this->promo);
        $stmt->bindParam(':user_email', $this->user_email);
        $stmt->bindParam(':user_pwd', $this->user_pwd);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }

    function get_user_data_by_email() {
        $query = "SELECT * FROM users WHERE user_email = :user_email";
        $stmt  = $this->connect->prepare($query);
        // Bind
        $stmt->bindParam(':user_email', $this->user_email);
        
        if ($stmt->execute()) {
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        #hace falta ver un error al llamar el stmt->execute 
        return $user_data;
    }

    function get_all_user_data() {
        $query = "SELECT * FROM users";

		$statement = $this->connect->prepare($query);

		$statement->execute();

		$data = $statement->fetchAll(PDO::FETCH_ASSOC);

		return $data;
    }

    function get_user_data_by_id() {
		$query = "SELECT * FROM users WHERE user_id = :user_id";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_id', $this->user_id);
        
		try {
			if($statement->execute())
			{
				$user_data = $statement->fetch(PDO::FETCH_ASSOC);
                
			}
			else
			{
				$user_data = array();
			}
		} catch (Exception $error) {
			$error->getMessage();
		}
		return $user_data;
	}
    function update_pwd() {
        $query  =   "UPDATE users SET user_pwd = :user_pwd WHERE user_id = :user_id";

        $stmt   = $this->connect->prepare($query);

        $stmt->bindParam(':user_id', $this->user_id);
        $stmt->bindParam(':user_pwd', $this->user_pwd);
        try {
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}