<?php

require_once dirname(__FILE__) . '/Model.php';

class BoardModel extends Model
{

	// ---------- プロパティ ----------
	protected $table = 'customers';			//データベースから取得するテーブルの指定
	protected $primary = 'id';				//テーブルのプライマリーキーの指定
	protected $inputName = 'customer_ms';	//プライマリーキーを取得しているinputタグのname属性の指定


	// ---------- コンストラクタ ----------
	public function __construct()
	{
		parent::__construct();
	}


	// ---------- メソッド ----------
	//
	public function insert($data)
	{
		$sql = "INSERT INTO {$this->table} ({$this->primary}, `detail`, `insert_at`) VALUES (NULL , '" . $data['detail'] . "', '" . date('Y-m-d H:i:s') . "');";	// 新規登録用のSQL文

		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}


	//
	public function update($data)
	{
		$sql = "UPDATE {$this->table} SET `detail` = '" . $data['detail'] . "' WHERE {$this->primary} = " . $data[$this->inputName] . ";";		// 更新用のSQL文

		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}
}
