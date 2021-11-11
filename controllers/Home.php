<?php
require_once 'app.php';

class HomeController extends BaseController {

    protected function index () {
        global $title ;
        $title= 'Nextgen | Home';

        $this->viewParams['auctions'] = Auction::getAll();

        $this->loadView();
    }
}