<?php

require_once '../auth-class.php';

AuthClass::deleteCookie();
header('location:http://localhost/project/');

