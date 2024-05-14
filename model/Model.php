<?php
require_once dirname(__FILE__) . '/../lib/DBCon.php';

abstract class Model
{
	// ---------- プロパティ ----------
	protected $dbCon;						//データベース接続するため
	protected $table = 'customers';			//データベースから取得するテーブルの指定
	protected $primary = 'id';				//テーブルのプライマリーキーの指定
	protected $inputName = 'customer_id';	//プライマリーキーを取得しているinputタグのname属性の指定


	// ---------- コンストラクタ ----------
	public function __construct()
	{
		$DBCon = new DBCon();
		$this->dbCon = $DBCon->getResource();
	}


	// ---------- メソッド ----------
	
	// ----- 一覧メソッド -----
	public function search()
	{
		$sql = "SELECT * FROM {$this->table} ORDER BY created_at DESC;";		// 一覧用のSQL文

		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}


	// ----- 選択メソッド -----
	public function select($data)
	{
		$sql = "SELECT * FROM {$this->table} WHERE {$this->primary} = " . $data['id'];		// 選択用のSQL文

		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}


	// ----- 削除メソッド -----
	public function delete($data)
	{
		$sql = "DELETE FROM {$this->table} WHERE {$this->primary} = " . $data[$this->inputName];	// 削除用のSQL文

		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}


	// ----- 新規登録メソッド -----
	public function insert($data){}
	

	// ----- 更新メソッド -----
	public function update($data){}
}

?>