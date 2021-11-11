<?php
require_once 'app.php';

class ContactController extends BaseController {

    protected function index () {
        global $title ;
        $title= 'Nextgen | Contact';

        $this->loadView();
    }
}