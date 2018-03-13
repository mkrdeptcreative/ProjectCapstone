<?php
namespace M6P\Controller;

use M6P\Models\entity\User;
use M6P\Models\data\UserManagerDB;

class UserManager
{
    public static function getAllUsers(){
        return UserManagerDB::getAllUsers();
    }
    public function getUserByEmailPassword($email,$password){
        return UserManagerDB::getUserByEmailPassword($email,$password);
    }
    public function getUserByEmail($email){
        return UserManagerDB::getUserByEmail($email);
    }
    public function saveUser(User $user){
        UserManagerDB::saveUser($user);
	}	
	public function getUserBySearch($searchvalue){
		return UserManagerDB::getUserBySearch($searchvalue);
	}	
	public function deleteUser($email){
		return UserManagerDB::deleteUser($email);
    }	
    
}
?>