<?php
namespace M6P\Models\data;

use M6P\Models\entity\Job;
use M6P\Models\util\DBUtil;

class JobManagerDB
{
    public static function fillJob($row){
        $job=new Job();
        /* $job->id (entity attibutes) $row["id"] (id is from database */
        $job->id=$row["id"];
        $job->title=$row["Title"];
        $job->salary=$row["Salary"];
        $job->jobDescription=$row["Job_Description"];
        $job->location=$row["Location"];
        $job->qualification=$row["Qualifications"];
        $job->employer=$row["Employer"];
        $job->website=$row["website"];
        return $job;
    }
    public static function getJobById($id){
        $user=NULL;
        $conn=DBUtil::getConnection();
        
        $sql="select * from jobs where id=$id";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            if($row = $result->fetch_assoc()){
                $job=self::fillJob($row);
            }
        }
        $conn->close();
        return $job;
    }
    
    public static function getJobByTitle($title){
        $job=NULL;
        
        $conn=DBUtil::getConnection();
        
        $sql="select * from jobs where Title like '%".$title."%'";
        $result = $conn->query($sql);
        
        $num_rows = mysqli_num_rows($result);
        
        if ( mysqli_num_rows( $result ) > 0 ) {
            while( $row = mysqli_fetch_assoc( $result ) ) {
                $job=self::fillJob($row);
                $Jobs[]=$job;
            }
            
            $conn->close();
            return $Jobs;
        }
        else
        {
            echo"record not found";
        }
        
    }
    
    
    public static function getJobByLocation($location){
        
        $job=NULL;
        $conn=DBUtil::getConnection();
        $sql="select * from jobs where Location like '%".$location."%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $job=self::fillJob($row);
                $Jobs[]=$job;
            }
            $conn->close();
            return $Jobs;
        }
        else
        {
            echo"record not found";
        }
        
    }
    
    
    public static function getJobByEmployer($employer){
        $user=NULL;
        $conn=DBUtil::getConnection();
        
        $sql="select * from jobs where Employer like '%".$employer."%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $job=self::fillJob($row);
                $Jobs[]=$job;
            }
            
            $conn->close();
            return $Jobs;
        }
        else
        {
            echo"record not found";
        }
        
    }
    
    
    public static function getJob(){
        $Jobs[]=array();
        $conn=DBUtil::getConnection();
        $sql="select * from jobs";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()){
                $job=self::fillJob($row);
                $Jobs[]=$job;
            }
        }
        $conn->close();
        return $Jobs;
    }
    
    
    public static function saveJob(Job $job){
        
        $conn=DBUtil::getConnection();
        try{
            $sql="call procSaveJob(?,?,?,?,?,?,?,?)";
        }catch (Exception $e)
        {
            echo $e->getMessage();
        }
        
        $stmt = $conn->prepare($sql);
        
        $stmt->bind_param("isssssss", $job->id,$job->title,$job->salary,$job->jobDescription,$job->location,$job->qualification,$job->employer,$job->website);
		
        echo"<h1> Hi, Welcome!! </h1>";
        $stmt->execute();
        if($stmt->errno!=0){
            printf("Error: %s.\n",$stmt->error);
        }
        $stmt->close();
        $conn->close();
    }
    
    public static function deleteJob($id){
        $user=NULL;
        $conn=DBUtil::getConnection();
        $sql = "DELETE FROM tb_feedback WHERE id='$id'";
        if ( mysqli_num_rows( $result ) > 0 ) {
            while( $row = mysqli_fetch_assoc( $result ) ) {
                $job=self::fillSearchUser($row);
                $Job[]=$job;
            }
        }
        $conn->close();
        return $Job;
        
    }
    
}

?>