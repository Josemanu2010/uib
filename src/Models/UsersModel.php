<?php
namespace App\Models;

use \Illuminate\Database\Eloquent as Eloquent;

class UsersModel extends Eloquent\Model {
  protected $table      = 'users';

  public function setLogin($user, $pass) {
  	$arrWhere = [];
  	$arrWhere['user_name'] = $user;
  	$arrWhere['user_pass'] = $pass;
  	$userData = $this->where($arrWhere)->get();
  	return $userData->toArray();
  }
}