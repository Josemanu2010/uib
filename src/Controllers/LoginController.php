<?php
namespace App\Controllers;

use App\Models\UsersModel;

class LoginController extends Controller {
    
    public function getLogin($request, $response, $args) {
    	if (!$this->session->has('user')) {
        	return $this->view->render($response, '/login.html', []);
    	} else {
			return $response->withRedirect('home');
    	}
    }
    public function postLogin($request, $response, $args) {
    	$dataPost = $request->getParsedBody();
        $this->UserModel    = new UsersModel();

        $dataUser = $this->UserModel->setLogin($dataPost['username'], $dataPost['pass']);
        if(count($dataUser)) {
        	$this->session->set('user', $dataUser[0]);
			return $response->withRedirect('home');
        }
    }

    public function setLogout($request, $response, $args) {
        $this->session->destroy();
		return $response->withRedirect('home');
    }
}