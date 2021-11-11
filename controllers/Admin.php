<?php
//require_once 'app.php';

class AdminController extends BaseController {

    protected function index () {
        //title
        global $title ;
        $title= 'Nextgen | Admin';

        $this->viewParams['bids'] = Admin::getHighestBids();
        $this->viewParams['totalBids'] = Admin::totalBids();
        $this->viewParams['totalUsers'] = Admin::totalUsers();
        $this->viewParams['totalQuestions'] = Admin::totalQuestions();

        $this->loadView();
    }
}