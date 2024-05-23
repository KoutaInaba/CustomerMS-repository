<?php

require_once dirname(__FILE__) . '/model/CustomerModel.php';
$bm = new CustomerModel();
var_dump("");
$result = $bm->insert($_POST);

if (!$result) {
	exit('登録に失敗しました。' . $dbCon->error);
}

header('Location: ./2_list.php');