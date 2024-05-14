<?php
require_once dirname(__FILE__) . '/model/CustomerModel.php';

$bm = new CustomerModel();
var_dump($_POST);
$result = $bm->delete($_POST);

header('Location: ./2_list.php');
