<?php
require_once './model/CustomerModel.php';

$bm = new CustomerModel();
$result = $bm->delete($_POST);

if (!$result) {
	exit('登録に失敗しました。' . $dbCon->error);
}

header('Location: ./2_list.php');
