<?php
class Database {
	public $host = DB_HOST;
	public $user = DB_USER;
	public $pass = DB_PASS;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	//Constructor
	public function __construct() {
		$this->connectDB();
	}

	//Connect to Database
	private function connectDB() {
		
		$this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

		if(!$this->link) {
			$this->error = "Connection Failed! ".$this->link->connect_error;
			return false;
		}
	}


	//Select Query Run
	public function select($query) {
		$result = $this->link->query($query) or die($this->link->error.__LINE__); //Associative Array
		
		if($result->num_rows > 0) {
			return $result;
		}
		else {
			$this->error = "Connection Failed! ".$this->link->connect_error;
			return $result;
		}
	}

	public function insert($query, $location) {
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

		if($insert_row) {
			if($location == 1) {
				header('Location: register.php?msg='.urlencode('Data Inserted Successfully!!'));
				exit();
			}
			else {
				header('Location: add_branch.php?msg='.urlencode('Data Inserted Successfully!!'));
				exit();
			}
		}
		else {
			die("Error: (".$this->link->errno.") ".$this->link->error);
		}
	}

	public function update($query) {
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);

		if($insert_row) {
				header('Location: admin_panel.php?msg='.urlencode('Approved!!'));
				exit();
		}
		else {
			die("Error: (".$this->link->errno.") ".$this->link->error);
		}
	}

}
?>