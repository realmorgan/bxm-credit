<?php  
	include_once ("constants.php");

	// class defintion

	class User{
		// member variables
		public $firstname;
		public $lastname;
		public $emailaddress;
		public $phonenumber;
		public $username;
		public $password;
		public $bank;
		public $accnumber;
		public $bvn;
		public $dbcon; // DB connection handler

		// member functions

# begin constructor
		public function __construct(){
			// create object of mysqli class
			$this->dbcon = new Mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASENAME);

			if ($this->dbcon->connect_error) {
				die("Connection Failed: ".$this->dbcon->connect_error);
			}else{
				// echo "DB Connection Successful";
			}
		}
# end constructor


# begin signup
		public function signUp($fname, $lname, $email, $phone, $username, $password, $bank, $acc, $bvn){
			// initialize member variables
			$this->firstname = $fname;
			$this->lastname = $lname;
			$this->phonenumber = $phone;

			// hash password
			$pswd = password_hash($password, PASSWORD_DEFAULT);

			// prepare statements
			$statement = $this->dbcon->prepare("INSERT INTO customer(firstname, lastname, emailaddress, phonenumber, username, password, bank, accnumber, bvn) VALUES(?,?,?,?,?,?,?,?,?)");

			// bind parameters
			$statement->bind_param("sssssssss", $fname, $lname, $email, $phone, $username, $pswd, $bank, $acc, $bvn);

			// execute
			$statement->execute();

			if ($statement->affected_rows == 1) {
				return true;
			}else{
				return false;
			}
		}
#end signup


# begin customer login
		public function login($email, $password){
			// prepare statement
			$statement = $this->dbcon->prepare("SELECT * FROM customer WHERE emailaddress = ?");

			// bind the parameter
			$statement->bind_param("s", $email);

			// execute
			$statement->execute();

			// get result
			$result = $statement->get_result();

			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();

				// check if password match
				if(password_verify($password, $row['password'])){

					// create session variables
					session_start();
					$_SESSION['cust_id'] = $row['cust_id'];
					$_SESSION['fname'] = $row['firstname'];
					$_SESSION['lname'] = $row['lastname'];
					$_SESSION['phone'] = $row['phonenumber'];
				

					return true;

				}else{
					return false;
				}			
			}else{
				return false;
			}

		}
# end customer login    


# begin admin login
			public function adminLogin($email, $password){
			// prepare statement
			$statement = $this->dbcon->prepare("SELECT * FROM admin WHERE admin_emailaddress = ?");

			// bind the parameter
			$statement->bind_param("s", $email);

			// execute
			$statement->execute();

			// get result
			$result = $statement->get_result();

			if ($result->num_rows == 1) {
				$row = $result->fetch_assoc();

				// check if password match
				if(password_verify($password, $row['admin_password'])){

					// create session variables
					session_start();
					$_SESSION['admin_id'] = $row['admin_id'];

					return true;

				}else{
					return false;
				}
			}else{
				return false;
			}

		}
# end admin login

		
# begin fetch all customers
			function listCustomers(){
				//prepare the statement
				$stmt = $this->dbcon->prepare("SELECT * FROM customer");

				//execute
				$stmt->execute();

				// get result
				$result = $stmt->get_result();

				$records = array();

				if ($result->num_rows > 0){
					// loop through the result set to fetch all customer records
					while ($row = $result->fetch_assoc()){
						$records[] = $row;
					}
				}
				   return $records;
			}

# end fetch all customers


# begin logout
		function logout(){
			session_start();
			session_destroy();

			// redirect to login
			header("Location: login.php");
			exit();
		}
# end logout

	} # class close
?>