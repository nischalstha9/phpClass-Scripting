<?php
session_start();
session_unset();
$_SESSION['message'] = array('type' => 'danger', 'msg' => 'Successfully Logged Out');
header("Location: ./login.php");
