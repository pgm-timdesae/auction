<?php

//connectie maken met DB
$db = new PDO(DB_DSN, DB_PROFILE, DB_PWD);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
