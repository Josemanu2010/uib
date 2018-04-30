<?php
namespace App\Controllers;

use App\Models\SkillsModel;
use App\Models\FacultiesModel;

class RegisterController extends Controller {
    
    public function getRegister($request, $response, $args) {
    	if (!$this->session->has('user')) {
    			$dataRegister = array('faculties' => array(), 'skills' => array());
                $this->FacultiesModel = new FacultiesModel();
                $facultyData = $this->FacultiesModel->get();
                $facultyData = $facultyData->toArray();
                if(count($facultyData)) {
                    $dataRegister['faculties'] = $facultyData;
                }
                $this->SkillsModel = new SkillsModel();
                $skillData = $this->SkillsModel->get();
                $skillData = $skillData->toArray();
                if(count($skillData)) {
                    $dataRegister['skills'] = $skillData;
                }
        	return $this->view->render($response, '/register.html', $dataRegister);
    	} else {
			return $response->withRedirect('home');
    	}
    }
}