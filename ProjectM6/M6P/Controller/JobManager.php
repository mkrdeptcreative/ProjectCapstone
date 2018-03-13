<?php
namespace M6P\Controller;

use M6P\Models\entity\Job;
use M6P\Models\data\jobManagerDB;

class jobManager
{
    public function saveJob(Job $job){
        JobManagerDB::saveJob($job);
    }
    
    public function getJobByTitle($title){
        return JobManagerDB::getJobByTitle($title);
    }
    
    public function getJobByLocation($location){
        return JobManagerDB::getJobByLocation($location);
    }
    
    public function getJobByEmployer($employer){
        return JobManagerDB::getJobByEmployer($employer);
    }
    
    public function getJobById($id){
        return JobManagerDB::getJobById($id);
    }
    
    public function deleteJob($Id){
        return JobManagerDB::deleteJob($Id);
    }
    
    public function getJob(){
        return JobManagerDB::getJob();
    }
    
}
?>