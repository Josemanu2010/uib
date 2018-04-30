<?php
namespace App\Controllers;

use App\Models\UsersModel;

class AdminController extends Controller {
    
    public function __construct($c) {
        parent::__construct($c);
    }
    
    public function getAdmin($request, $response, $args) {
        if ($this->session->has('user')) {
            return $this->view->render($response, '/admin.html', []);
        } else {
            return $this->view->render($response, '/login.html', []);
        }
    }

    public function getUsers($request, $response, $args) {
        if ($this->session->has('user')) {
            $this->UserModel    = new UsersModel();
            $userData = $this->UserModel->get();
            return $this->view->render($response, '/admin/users.html', [
                'users' => $userData
            ]);
        } else {
            return $this->view->render($response, '/login.html', []);
        }
    }
}