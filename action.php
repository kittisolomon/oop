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
}

?>




