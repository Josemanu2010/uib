<?php
namespace App\Models;

use \Illuminate\Database\Eloquent as Eloquent;

class PeopleModel extends Eloquent\Model {
  protected $table      = 'people';

  public function getPersonByUser($userId) {
  	$arrWhere = [];
  	$arrWhere['person_user'] = $userId;
  	$userData = $this->where($arrWhere)->get();
  	return $userData->toArray();
  }
}