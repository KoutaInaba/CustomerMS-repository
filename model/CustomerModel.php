<?php

require_once dirname(__FILE__) . '/Model.php';

class CustomerModel extends Model
{
	// ---------- プロパティ ----------
	protected $table = 'customers';			//データベースから取得するテーブルの指定
	protected $primary = 'id';

	protected $table2 = 'companies';

	protected $inputName = 'customer_id';	//プライマリーキーを取得しているinputタグのname属性の指定


	// ---------- コンストラクタ ----------
	public function __construct()
	{
		parent::__construct();
	}


	// ---------- メソッド ----------
	// ----- 新規登録メソッド -----
	public function insert($data)
	{
		// 新規登録用のSQL文
		$sql = "INSERT INTO {$this->table} ({$this->primary}, `name`, `kana`, `email`, `tel`, `gender`, `birth`, company_id, `created_at`, `updated_at`) 
			VALUES (NUll, '" . $data['name'] . "', '" . $data['kana'] . "', '" . $data['email'] . "', '" . $data['tel'] . "', '" . $data['gender'] . "', '" . $data['birth'] . "', '" . $data['company_id'] . "', '" . date('Y-m-d H:i:s') . "', '" . date('Y-m-d H:i:s') . "'
			);";

		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}


	// ----- 一覧メソッド -----
	public function search($data)
	{
		// 一覧用のSQL文
		// $sql = "SELECT * FROM {$this->table} ORDER BY created_at DESC;";

		// 結合一覧
		$sql = 
		"SELECT 
			{$this->table}.{$this->primary}, 
			{$this->table}.name,
			{$this->table}.kana,
			{$this->table}.email,
			{$this->table}.tel,
			{$this->table}.gender,
			{$this->table}.birth,
			{$this->table}.company_id,
			{$this->table}.created_at,
			{$this->table}.updated_at,
			{$this->table2}.id AS company_id, 
			{$this->table2}.name AS company_name
		FROM 
			{$this->table} 
		INNER JOIN 
			{$this->table2} 
		ON 
			{$this->table}.company_id = {$this->table2}.id
		WHERE
			$data
		ORDER BY created_at DESC
		;";

		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}


	// ----- 更新メソッド -----
	public function update($data)
	{
		// 更新用のSQL文
		$sql = "UPDATE {$this->table} 
		SET 
			`name`='" . $data['name'] . "', 
			`kana`='" . $data['kana'] . "', 
			`email`='" . $data['email'] . "', 
			`tel`='" . $data['tel'] . "', 
			`gender`='" . $data['gender'] . "', 
			`birth`='" . $data['birth'] . "', 
			company_id='" . $data['company_id'] . "',
			`updated_at`='" . date('Y-m-d H:i:s') . "'
		WHERE 
			{$this->primary} = " . $data[$this->inputName] . ";";
		$result = $this->dbCon->query($sql);
		$this->dbCon->close();

		return $result;
	}
}
