<?php
require_once dirname(__FILE__) . '/model/CustomerModel.php';

$bm = new CustomerModel();
$result = $bm->delete($_POST);

header('Location: ./2_list.php');
