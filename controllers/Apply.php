<?php
require_once 'app.php';

class ApplyController extends BaseController {

    protected function index () {
        global $title ;
        $title= 'Nextgen | Apply';

        $this->loadView();
    }
}