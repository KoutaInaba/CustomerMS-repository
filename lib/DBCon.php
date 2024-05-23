<?php

// ---------- クラス ----------
class DBCon
{

	// ---------- プロパティ ----------
	private $dbServer = "localhost";	// DBサーバ名
	private $dbUser = "root";			// ユーザ名
	private $dbPassword = "";			// パスワード 0000000
	private $dbName = "customer_ms";	// データベース名
	private $resource;					// データリソース



	// ---------- コンストラクタ ----------
	public function __construct()
	{
		$this->resource = new mysqli($this->dbServer, $this->dbUser, $this->dbPassword, $this->dbName);
		$this->resource->set_charset('utf8');
	}



	// ---------- メソッド ----------
	public function getResource()
	{
		return $this->resource;
	}
}

?>








<!--========== オブジェクト指向 ==========-->
<!-- 
	
-->



<!--========== クラス ==========-->
<!-- 
	
-->


<!----- 命名規則 ----->
<!-- 
	・グローバル変数名 ⇒ HUMAN_A
	・クラス名 ⇒ Human
	・変数名 ⇒ human_a

	・コンストラクタ ⇒ __construct
-->


<!----- プロパティ ----->
<!-- 
	
-->


<!----- メソッド ----->
<!-- 
	
-->



<!--========== インスタンス ==========-->
<!-- 
	
-->



<!--========== コンストラクタ ==========-->
<!-- 
	
-->



<!----------  ---------->
<!-- 
	
-->



<!----------  ---------->
<!-- 
	
-->