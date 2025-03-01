<?php

require_once dirname(__FILE__) . '/Model.php';

class CompanyModel extends Model
{

	// ---------- プロパティ ----------
	protected $table = 'companies';			//データベースから取得するテーブルの指定
	protected $primary = 'id';
	protected $inputName = 'customer_id';	//プライマリーキーを取得しているinputタグのname属性の指定


	// ---------- コンストラクタ ----------
	public function __construct()
	{
		parent::__construct();
	}


	// ---------- メソッド ----------


	// ----- 一覧メソッド -----
	public function search($data)
	{
		$sql = "SELECT * FROM {$this->table};";		// 一覧用のSQL文

		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}


	// ----- 選択メソッド -----
	public function select($data)
	{
		$sql = "SELECT * FROM {$this->table} WHERE {$this->primary} = " . $data . ";";		// 選択用のSQL文

		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}


	// ----- 新規登録メソッド -----
	// public function insert($data)
	// {
		// 新規登録用のSQL文
		// $sql = "INSERT INTO {$this->table} ({$this->primary}, `name`, `kana`, `email`, `tel`, `gender`, `birth`, {$this->foreign}, `created_at`, `updated_at`) 
		// 	VALUES (NUll, '" . $data['name'] . "', '" . $data['kana'] . "', '" . $data['email'] . "', '" . $data['tel'] . "', '" . $data['gender'] . "', '" . date('Y/m/d') . "', '" . $data['company_id'] . "', '" . date('Y-m-d H:i:s') . "', '" . date('Y-m-d H:i:s') . "'
		// 	);";

		// $result = $this->dbCon->query($sql);
		// $this->dbCon->close();

		// return $result;
	// }


	// ----- 更新メソッド -----
	// public function update($data)
	// {
	// 	$sql = "UPDATE {$this->table} SET `detail` = '" . $data['detail'] . "' WHERE {$this->primary} = " . $data[$this->inputName] . ";";		// 更新用のSQL文

	// 	$result = $this->dbCon->query($sql);
	// 	$this->dbCon->close();

	// 	return $result;
	// }
}
