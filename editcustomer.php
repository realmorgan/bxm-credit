 <?php include_once("headeradmin.php"); 
      include_once "shared/user.php";
      $output = new User();


      // fetch existing data
      $data = $output->listCustomers($_REQUEST['cust_id']);

      // var_dump($data);

      // echo "<pre>";
      // print_r($data);
      // echo "</pre>";


      // check if the button is clicked
     if (isset($_POST['btnEdit'])){
      // validate
        if(empty($_POST['firstname'])){
          $errors['firstname'] = "Firstname name cannot be empty!";
        }

        if(empty($_POST['lastname'])){
          $errors['lastname'] = "Lastname cannot be empty!";
        }

        if(empty($_POST['bank'])){
          $errors['bank'] = "Bank description cannot be empty!";
        }

        if(empty($_POST['accnumber'])){
          $errors['accnumber'] = "Account number cannot be empty!";
        }

      // sanitize
        include_once "shared/common.php";
				$cmobj = new Common;

        $fname = $cmobj->sanitizeInputs($_POST['firstname']);
				$lname = $cmobj->sanitizeInputs($_POST['lastname']);
        $phone = $cmobj->sanitizeInputs($_POST['phonenumber']);
        $bank = $cmobj->sanitizeInputs($_POST['bank']);
        $acc = $cmobj->sanitizeInputs($_POST['accnumber']);


      // update record


      
      // reference updatecustomer
      $output = $obj->updateCustomer($fname, $lname, $phone, $bank, $acc);

      // check if it's successfully updated
      if ($output == 1) {
          $feedback = "Customer was successfully added";
          // redirect to Customers
          header("Location: customers.php?m=$feedback");

        }elseif($output == 0){
          $feedback = "No changes was made!";
          // redirect
          header("Location: customers.php?m=$feedback");
        }else{
          $errors[] = "Oops! Could not update customer. ".$output;
       }


     }
 ?>

  <div class="container-fluid">
    <div class="row mt-5">
        <div class="col-md-5 mt-5">
          <img src="images/reggif.gif" alt="reggif" class="img-fluid" id="reggif">
        </div>
        <div class="col-md-6">
          <h3>Edit Customer</h3>

            <?php  
              if (!empty($errors)) {
                echo "<ul class='alert alert-danger'>";
                foreach ($errors as $key => $value) {
                  echo "<li>$value</li>";
                }
                echo "</ul>";
              
              }
            ?>
        <form action="" method="post" >
          <label>First Name</label>
          <input type="text" name="firstname" id="firstname" class="form-control" style="border-left: 5px solid purple;" value="<?php if(isset($data['firstname'])){ echo $data['firstname']; }?>" />

          <label>Last Name</label>
          <input type="text" name="lastname" id="lastname" class="form-control" style="border-left: 5px solid purple;" value="<?php if(isset($data['lastname'])){ echo $data['lastname']; }?>" />


          <label>Phone Number</label>
          <input type="text" name="phonenumber" id="phonenumber" placeholder="+234" class="form-control" style="border-left: 5px solid purple;" value="<?php if(isset($data['phonenumber'])){ echo $data['phonenumber']; }?>" />

          <label>Bank</label>
          <select name="bank" id="bank" class="form-control" style="border-left: 5px solid purple;" value="<?php if(isset($data['bank'])){ echo $data['bank']; }?>">
            <option value="">Select Bank</option>
            <option value="zenithbank">ZENITH BANK</option>
            <option value="accessbank">ACCESS BANK</option>
            <option value="firstbank">FIRST BANK</option>
            <option value="gtbank">GUARANTY TRUST BANK</option>
            <option value="unionbank">UNION BANK</option>
            <option value="kudamfb">KUDA MICROFINANCE BANK</option>
            <option value="ecobank">ECOBANK</option>
            <option value="fidelitybank">FIDELITY BANK</option>
            <option value="polarisbank">POLARIS BANK</option>
            <option value="uba">UNITED BANK FOR AFRICA</option>
            <option value="wemabank">WEMA BANK</option>
          </select>

          <label>Account Number</label>
          <input type="text" name="accnumber" id="accnumber" class="form-control" style="border-left: 5px solid purple;" value="<?php if(isset($data['accnumber'])){ echo $data['accnumber']; }?>" />

          <button type="submit" name="btnEdit" class="btn btn-warning mt-5" id="btnEdit" style="width: 150px;">Save Changes</button>


        </form> 
      </div>
    </div>
  </div>

<?php include_once('footer.php'); ?>