<?php

require_once dirname(__FILE__) . '/model/CustomerModel.php';
$bm = new CustomerModel();
$result = $bm->insert($_POST);

header('Location: ./3_register.php');