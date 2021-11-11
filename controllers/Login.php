<?php

class LoginController extends BaseController {

    public function index () {
        global $title ;
        $title= 'Nextgen | Login';

        //$this->viewParams['users'] = User::createUser();

        $this->loadView();
    }

    public function profile() {
        $user_id = $_SESSION['user_id'];
        $user = User::getUserById($user_id);

        print_r($user);

        include BASE_URL . 'views/login/profile.php';
    }
}