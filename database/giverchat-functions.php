<?php 
	
class GiverChatFunctions {
	private $chat_id;
	private $user_id;
	private $user_firstname;
    private $user_lastname;
	private $promo;
	private $message;
	// private $created_on;
	protected $connect;
    
    public function __construct()
    {
        require_once(dirname(__DIR__)."/database/database-connection.php");

        $database_object = new DatabaseConnect;

        $this->connect = $database_object->connect();
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
	public function setChatId($chat_id) {
		$this->chat_id = $chat_id;
	}

	function getChatId() {
		return $this->chat_id;
	}

	function setUserId($user_id) {
		$this->user_id = $user_id;
	}

	function getUserId() {
		return $this->user_id;
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


	function save_chat() {
		$query = "INSERT INTO comments 
			(user_id, user_firstname, user_lastname, promo, comment, comment_date) 	
			VALUES (:user_id, :user_firstname, :user_lastname, :promo, :comment, NOW())";

		$statement = $this->connect->prepare($query);

		$statement->bindParam(':user_id', $this->user_id);
		$statement->bindParam(':user_firstname', $this->user_firstname);
		$statement->bindParam(':user_lastname', $this->user_lastname);
		$statement->bindParam(':promo', $this->promo);
		$statement->bindParam(':comment', $this->message);

		// $statement->bindParam(':comment_date', $this->created_on);

		$statement->execute();
	}

	function get_all_chat_data() {
		$query = "SELECT comments.id, users.user_id, users.user_firstname, users.user_lastname, users.promo, comments.comment, comments.comment_date
		FROM comments 
		INNER JOIN users
		ON users.user_id = comments.user_id 
		ORDER BY comments.id ASC
		";

		$statement = $this->connect->prepare($query);

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
	function get_all_chat_data_descending() {
		$query = "SELECT comments.id, users.user_id, users.user_firstname, users.user_lastname, users.promo, comments.comment, comments.comment_date
		FROM comments 
		INNER JOIN users
		ON users.user_id = comments.user_id 
		ORDER BY comments.id DESC
		";

		$statement = $this->connect->prepare($query);

		$statement->execute();

		return $statement->fetchAll(PDO::FETCH_ASSOC);
	}
}
	
