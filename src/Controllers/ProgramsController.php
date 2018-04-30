<?php
namespace App\Controllers;

use App\Models\ProgramsModel;

class ProgramsController extends Controller {
    
    public function getPrograms($request, $response, $args) {
    	$allGetVars = $request->getQueryParams();
        $this->ProgramsModel = new ProgramsModel();
        $arrWhere = [];
        $arrWhere['program_faculty'] = $allGetVars['faculty'];
        $programData = $this->ProgramsModel->where($arrWhere)->get();
        $programData = $programData->toArray();
        return $response->getBody()->write(json_encode($programData));
    }
}