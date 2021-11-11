<?php
require_once 'app.php';

class AuctionController extends BaseController {

    protected function index () {
        //title
        global $title ;
        $title = 'Nextgen | Collection';

        // Var for search bar
        $search_str = $_POST['search_string'] ?? '';

        // Var for gender select
        $gender = $_POST['gender'] ?? '';
        
        $this->viewParams['auctions'] = Auction::getAll($search_str);
        $this->viewParams['auctions'] = Auction::getSearch($search_str, $gender);

        $this->loadView();
    }

    protected function detail ($params) {
        // Var for bid
        $bid = $_POST['bid'] ?? '';
        $question = $_POST['question'] ?? '';

        $newBid = (int)$bid;

        $this->viewParams['auction'] = Auction::getById($params[0]);

        if ($bid) {
            $this->viewParams['bid'] = Auction::placeBid($newBid, $params[0]);
        }

        $this->viewParams['highestBid'] = Auction::getBidById($params[0]);

        if($question) {
            $this->viewParams['question'] = Auction::putQuestion($params[0], $question);
        }

        $this->viewParams['messages'] = Auction::getMessages($params[0]);
        
        $this->loadView();
    }
}