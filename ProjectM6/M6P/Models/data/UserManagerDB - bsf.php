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
        $sql="select * from tb_user where Email='$email'";
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
        $stmt->bind_param("issssssss", $user->id,$user->firstName,$user->lastName, $user->email,$user->password,$user->job,$user->companyname,$user->city,$user->country); 
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
}

?>