<!---------- データベース接続 ---------->
<?php
$item = "company_id = 3";

require_once dirname(__FILE__) . '/model/CustomerModel.php';
$bm = new CustomerModel();
$result = $bm->search($item);

?>