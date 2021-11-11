<?php
session_start();

require 'config.php';

require BASE_DIR . '/libs/db.php';

//Models
require BASE_DIR . '/models/BaseModel.php';
require BASE_DIR . '/models/Auction.php';
require BASE_DIR . '/models/Admin.php';
require BASE_DIR . '/models/Login.php';

// Controllers
require BASE_DIR . '/controllers/BaseController.php';

