<?php
namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\PeopleModel;
use App\Models\SkillsModel;
use App\Models\ProgramsModel;
use App\Models\FacultiesModel;

class ProfileController extends Controller {
    
    public function getProfile($request, $response, $args) {
        if ($this->session->has('user')) {
            $this->PeopleModel = new PeopleModel();
            $dataUser = $this->session->get('user');
            $dataPerson = $this->PeopleModel->getPersonByUser($dataUser['user_id']);
            $dataPerson = $dataPerson[0];
            $this->SkillsModel = new SkillsModel();
            $dataSkills = $this->SkillsModel->getSkillsByPerson($dataPerson['person_id']);
            $this->ProgramsModel = new ProgramsModel();
            $arrWhere = [];
            $arrWhere['program_id'] = $dataPerson['person_program'];
            $programData = $this->ProgramsModel->where($arrWhere)->get();
            $programData = $programData->toArray();
            if(count($programData)) {
                $programData = $programData[0];
                $dataUser = array_merge($dataUser, $programData);
                $this->FacultiesModel = new FacultiesModel();
                $arrWhere = [];
                $arrWhere['faculty_id'] = $dataUser['program_faculty'];
                $facultyData = $this->FacultiesModel->where($arrWhere)->get();
                $facultyData = $facultyData->toArray();
                if(count($facultyData)) {
                    $facultyData = $facultyData[0];
                    $dataUser = array_merge($dataUser, $facultyData);
                }
            }
            $data = array_merge($dataUser, $dataPerson);
            return $this->view->render($response, '/profile.html', [ 'user' => $data, 'skills' =>  $dataSkills ]);
        } else {
            return $this->view->render($response, '/login.html', []);
        }
    }
}