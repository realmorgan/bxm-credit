<?php  
	// class definition
	class Common{
		// member variables

		// member functions
		public function sanitizeInputs($data){
			$data = trim($data);
			$data = htmlspecialchars($data);
			$data = addslashes($data);

			return $data;
		}
	}
?>