<?php
namespace M6P\Models\data;

use M6P\Models\entity\User;
use M6P\Models\util\DBUtil;

class UserManagerDB
{
    public static function fillUser($row){
        $user=new User();
		$user->id=$row["id"];
        $user->firstName=$row["firstname"];
        $user->lastName=$row["lastname"];
        $user->email=$row["email"];
        $user->password=$row["upassword"];
		$user->job=$row["job"];
		$user->companyname=$row["companyname"];
		$user->city=$row["city"];
		$user->country=$row["country"];
        return $user;
    }
	public static function fillSearchUser($row){
        $user=new User();
		$user->id=$row["id"];
        $user->firstName=$row["firstname"];
        $user->lastName=$row["lastname"];
        $user->email=$row["email"];
       	$user->job=$row["job"];
		$user->companyname=$row["companyname"];
		$user->city=$row["city"];
		$user->country=$row["country"];
        return $user;
    }
    public static function getUserByEmailPassword($email,$password){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $password=mysqli_real_escape_string($conn,$password);
		$sql="select * from tb_user where email='$email' and upassword='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
				            }
        }
        $conn->close();
        return $user;
    }
	
    public static function getUserByEmail($email){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from tb_user where email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
            }
        }
        $conn->close();
        return $user;
    }
    public static function saveUser(User $user){
		
        $conn=DBUtil::getConnection();
		try{
        $sql="call procSaveUser(?,?,?,?,?,?,?,?,?)";
		}catch (Exception $e)
		{
			echo $e->getMessage();
		}

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssssss", $user->id,$user->firstname,$user->lastname, $user->email,$user->upassword,$user->job,$user->companyname,$user->city,$user->country); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
    public static function getAllUsers(){
        $users[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $user=self::fillUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
	 public static function getUserBySearch($searchvalue){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $valueToSearch=mysqli_real_escape_string($conn,$searchvalue);
        $sql="SELECT id,firstname,lastname,email,job,companyname,city,country from tb_user  
			  WHERE id LIKE '%" . $valueToSearch . "%' OR
				  firstname LIKE '%" . $valueToSearch . "%' OR 
				  lastname LIKE '%" . $valueToSearch  ."%' OR
				  email LIKE '%" . $valueToSearch . "%' OR
				  job LIKE '%" . $valueToSearch . "%' OR
				  companyname LIKE '%" . $valueToSearch . "%' OR
				  city LIKE '%" . $valueToSearch . "%' OR
				  country LIKE '%" . $valueToSearch . "%'"; 
		
		/*$logicStr="WHERE ";
		$count=mysqli_num_fields($sql_query);
		for($i=0 ; $i < mysqli_num_fields($sql_query) ; $i++){
		 if($i == ($count-1) )
		$logicStr=$logicStr."".mysqli_fetch_field_direct($sql_query,$i)." LIKE '%".$valueToSearch."%' ";
		else
		$logicStr=$logicStr."".mysqli_fetch_field_direct($sql_query,$i)." LIKE '%".$valueToSearch."%' OR ";
		}
		var_dump($sql-query);
		// start the search in all the fields and when a match is found, go on printing it .
		$sql="SELECT * from tb_user ".$logicStr;*/
        $result = $conn->query($sql);
        if ( mysqli_num_rows( $result ) > 0 ) {
            while( $row = mysqli_fetch_assoc( $result ) ) {
                $user=self::fillSearchUser($row);
                $users[]=$user;
            }
        }
        $conn->close();
        return $users;
    }
	 public static function deleteUser($email){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql = "DELETE FROM tb_user WHERE email='$email'";
		if ( mysqli_num_rows( $result ) > 0 ) {
         while( $row = mysqli_fetch_assoc( $result ) ) {
                $user=self::fillSearchUser($row);
                $users[]=$user;
            }
		 }
        $conn->close();
        return $users;
    
    }
	
}

?>