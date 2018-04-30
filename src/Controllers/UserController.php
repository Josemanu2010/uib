<?php
namespace App\Controllers;

use App\Models\UsersModel;

class UserController extends Controller {
    
    public function postUser($request, $response, $args) {
    	$dataPost = $request->getParsedBody();
        $this->UserModel    = new UsersModel();

        $dataUser = $this->UserModel->setUser($dataPost['username'], $dataPost['pass']);
        if(count($dataUser)) {
        	$this->session->set('user', $dataUser[0]);
			return $response->withRedirect('home');
        }
    }
}