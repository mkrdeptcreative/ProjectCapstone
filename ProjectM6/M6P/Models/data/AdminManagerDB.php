<?php
namespace M6P\Models\data;

use M6P\Models\entity\Admin;
use M6P\Models\util\DBUtil;

class AdminManagerDB
{
    public static function fillAdmin($row){
        $admin=new Admin();
		$admin->id=$row["id"];
        $admin->firstName=$row["firstname"];
        $admin->lastName=$row["lastname"];
        $admin->email=$row["email"];
        $admin->password=$row["password"];
		return $admin;
    }
	public static function fillSearchAdmin($row){
        $admin=new Admin();
		$admin->id=$row["id"];
        $admin->firstName=$row["firstname"];
        $admin->lastName=$row["lastname"];
        $admin->email=$row["email"];
        return $admin;
    }
    public static function getAdminByEmailPassword($email,$password){
        $admin=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $password=mysqli_real_escape_string($conn,$password);
		$sql="select * from tb_admin where email='$email' and password='$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $admin=self::fillAdmin($row);
				            }
        }
        $conn->close();
        return $admin;
    }
	
    public static function getAdminByEmail($email){
        $admin=NULL;
        $conn=DBUtil::getConnection();
        $email=mysqli_real_escape_string($conn,$email);
        $sql="select * from tb_admin where Email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $admin=self::fillAdmin ($row);
            }
        }
        $conn->close();
        return $admin;
    }
    public static function saveUser(Admin $admin){
		
        $conn=DBUtil::getConnection();
		try{
        $sql="call procSaveUser(?,?,?,?,?,?,?,?,?)";
		}catch (Exception $e)
		{
			echo $e->getMessage();
		}

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("issssssss", $admin->id,$admin->firstName,$admin->lastName, $admin->email,$admin->password,$admin->job,$admin->companyname,$admin->city,$admin->country); 
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
    public static function getAllUsers(){
        $admins[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from tb_user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $admin=self::fillUser($row);
                $admins[]=$admin;
            }
        }
        $conn->close();
        return $admins;
    }
	 public static function getUserBySearch($searchvalue){
        $admin=NULL;
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
                $admin=self::fillSearchUser($row);
                $admins[]=$admin;
            }
        }
        $conn->close();
        return $admins;
    }
}

?>