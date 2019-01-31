<?php
class Database {
 	public $error;
 	public	$con = null;

 	public function __construct(){

 		$this->con= mysqli_connect("localhost","root","","databasename");
 				if(!$this->con){
 					die("cannot connect to database".mysqli_error());
 					
 						}
 						}
  
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
	// initialize session method
   public function session_initialize($key, $value)
    {
        session_start();
        
        $_SESSION[$key] = $value;

    }

    // userlogin logic method 
 	public function user_Login($table,$email,$password){

        $condition = '';

        $condition =" WHERE email = '$email' AND password = '$password' ";

        $sql = " SELECT * FROM " . $table. $condition;

         $result = mysqli_query($this->con, $sql);

        $query = mysqli_num_rows($result);

        if($query==0) {

         $this->msg = "Invalid Username Or password";

        }
        else
        {

         while($check=mysqli_fetch_array($result)){

        $user=$check["email"];
                    
        $pass= $check["password"];
                        
        }
  
        if($email == $user && $password == $pass ){

        header("Location: userview.php");

        }

        }

        }

  
  }

// initializing the object of the class
$obj = new Database();

	if(isset($_POST["submit"])){
 	$fullname = $_POST['fullname'];
 	$address = $_POST['address'];
 	$dob = $_POST['dob'];
 	$occupation = $_POST['occupation'];
 	$gender = $_POST['gender'];
    	$bank_name = $_POST['bank_name'];
    	$routineno = $_POST['routineno'];
	$obj->insert_BandDetails("bank_details","{$fullname}","{$address}","{$dob}","{$occupation}","{$gender}","{$bank_name}","{$routineno}");
		
}
	
    if(isset($_POST["login"])){
        $email = $_POST["email"];
        $password = $_POST["password"];
        $obj->session_initialize('email', "{$email}");
        if($obj->user_login("users","{$email}","{$password}"))
    {
        header("Location: userview.php");
    }
 }
?>




