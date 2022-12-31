<?php  
	include_once ("constants.php");

	// class defintion

	class Admin{
		// member variables
		public $emailaddress;
		public $password;
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
		public function listCustomers(){
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



# begin insert into LoanCat
		public function insertLoanCat($lcname, $lcinterest, $lcminamount, $lcmaxamount){
			// prepare the statements
			$stmt = $this->dbcon->prepare("INSERT INTO loan_categories(lc_name, lc_interest_rate, lc_minamount, lc_maxamount) VALUES(?,?,?,?)");


			// bind parameters
			$stmt->bind_param("ssii", $lcname, $lcinterest, $lcminamount, $lcmaxamount);
			// execute
			$stmt->execute();


			if ($stmt->affected_rows == 1){
				return true;
			}else{
				return $stmt->error;
			}


		}
# end insertLoanCat



# begin updatecustomer method
		public function updateCustomer($fname, $lname, $phone, $bank, $acc, $cust_id){

			// prepare the statement
			$stmt = $this->dbcon->prepare("UPDATE customer SET firstname=?, lastname=?, phonenumber=?, bank=?, accnumber=? WHERE cust_id =?");

			// bind parameters
			$stmt->bind_param("ssisii", $fname, $lname, $phone, $bank, $acc, $cust_id);

			// execute
			$stmt->execute();

			// check if record was updated
			return $stmt->affected_rows;
		}
# end updatecustomer method


# begin logout
		function logout(){
			session_start();
			session_destroy();

			// redirect to login
			header("Location: login.php");
			exit();
		}
# end logout
		
	}
?>