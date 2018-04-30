<?php
namespace App\Models;

use \Illuminate\Database\Eloquent as Eloquent;

class SkillsModel extends Eloquent\Model {
  protected $table      = 'skills';

  public function getSkillsByPerson($personId) {
  	$data = array();
  	$SkillsPeople = new SkillsPeopleModel();
  	$arrWhere = [];
  	$arrWhere['person_id'] = $personId;
  	$skillsPeopleData = $SkillsPeople->where($arrWhere)->get()->toArray();
  	if(count($skillsPeopleData)) {
	  	$skillsIds = array();
	  	foreach ($skillsPeopleData as $key => $skill) {
	  		$skillsIds[] = $skill['skill_id'];
	  	}
  	}
  	$skillData = $this->whereIn('skill_id', $skillsIds)->get();
  	return $skillData->toArray();
  }
}