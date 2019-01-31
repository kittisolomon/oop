 	<?php
  
  function insert_BandDetails($tablename,$fullname,$address,$dob,$gender,$bank_name,$routineno){

 			$getEmail="";
 		if(isset($_SESSION["email"])){

 		$getEmail =  $_SESSION["email"];
 		}
 		$email = $getEmail;
 		$sql = null;
 		$sql.="INSERT INTO ". $tablename;
        $sql .= "(email,fullname,address,dob,gender,bank_name,routineno) VALUES ";
        $sql .= "('{$email}','{$fullname}','{$address}','{$dob}','{$gender}','{$bank_name}','{$routineno}')";
 			$query = mysqli_query($this->con,$sql);
 			if($query){
 			return true;
 			}else {
 		die("cannot send record".mysqli_error($this->con));
 		}
 	}
  
  ?>
