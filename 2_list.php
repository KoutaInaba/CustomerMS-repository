<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="トップページです。">
	<title>検索＆一覧</title>
	<link href="./css/reset.css" rel="stylesheet" type="text/css" />
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!---------- データベース接続 ---------->
	<?php




	// require_once dirname(__FILE__) . '/model/CustomerModel.php';
	// $bm = new CustomerModel();
	// $result = $bm->search(null);

	?>


	<div class="main-wrapper">
		<!--================== 共通ヘッダー開始 ==================-->
		<header class="main-header">
			<div class="logo">
				<button class="btm-logo" type="button" onclick="location.href='./2_list.php'">
					<p><span>C</span>ustomer</p>
					<p><span>M</span>anagement</p>
					<p><span>S</span>ystem</p>
				</button>
			</div>
			<nav>
				<ul>
					<li><a href="./1_top.php">Top</a></li>
					<li><a href="./2_list.php">List</a></li>
					<li><a href="./3_register.php">Register</a></li>
				</ul>
			</nav>
		</header>
		<!--================== 共通ヘッダー終了 ==================-->


		<!--================== コンテンツ開始 ==================-->
		<main class="main-content">
			<div class="content-list">
				<div class="content-header">
					<h1>顧客情報一覧ページ</h1>
				</div>
				<div class="content-box1">
					<div class="box1-child1">

						<!-- 登録ボタン -->
						<button class="btm-register" onclick="location.href='./3_register.php'">
							<p>新規登録</p>
						</button>
					</div>
					<div class="box1-child2">





						<!-- 検索欄 -->

						<form method="post" action="./2_list.php" name="customer_form" onsubmit="return listSubForm()">


							<div class="search-form__label">
								<p>顧客名</p>
								<input type="text" id="nameID" name="name_search" value="">
							</div>
							<div id="name_error_Id" class="error-box"></div> <!-- error -->


							<div class="search-form__label">
								<p>顧客名(カナ)</p>
								<input type="text" id="kanaID" name="kana_search" value="">
							</div>
							<div id="kana_error_Id" class="error-box"></div> <!-- error -->


							<div class="search-form__radio">
								<p>性別</p>
								<label class="radio">
									<input class="radio__btn" type="checkbox" name="gender_search[]" value="0" checked>
									<span class="radio__text">男性</span>
								</label>
								<label class="radio">
									<input class="radio__btn" type="checkbox" name="gender_search[]" ] value="1" checked>
									<span class="radio__text">女性</span>
								</label>
								<label class="radio">
									<input class="radio__btn" type="checkbox" name="gender_search[]" value="2" checked>
									<span class="radio__text">その他</span>
								</label>
							</div>
							<!-- error -->
							<div id="gender_error_Id" class="error-box"></div>


							<div class="search-form__label">
								<p>生年月日</p>
								<div class="date-box">
									<input type="date" name="min_date_search" value=">">
									<p>~</p>
									<input type="date" name="max_date_search" value="<?= date("Y-m-d"); ?>">
								</div>
							</div>


							<div class="search-form__label">
								<p>所属会社</p>
								<select name="company_id_search" id="">
									<option value=""><span>所属会社を選択してください</span></option>
									
									<?php
									$condition = "1";

									require_once dirname(__FILE__) . '/model/CompanyModel.php';
									$bm = new CompanyModel();
									$result = $bm->search($condition);

									if (!$result) {
										exit('登録に失敗しました。' . $dbCon->error);
									}
									
									while ($row = $result->fetch_assoc()) {
									?>
										<option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
									<?php
									}
									?>
								</select>
							</div>


							<button class="btm-search" type="submit" name="search" id="search">
								<p>検索</p>
							</button>


						</form>
					</div>
				</div>





				<div class="content-box2">
					<!-- 一覧 -->
					<?php
					// ---------- 検索条件 ---------- 

					$condition = "1";

					//
					if (isset($_POST['search'])) {

						$name = $_POST['name_search'];
						$kana = $_POST['kana_search'];
						$gender = $_POST['gender_search'];
						$gender_arr = implode(",", $_POST['gender_search']);
						$min_date = $_POST['min_date_search'];
						$max_date = $_POST['max_date_search'];
						$company = $_POST['company_id_search'];


						//name
						if (isset($name)) {
							$condition .= " AND customers.name LIKE '%" . $name . "%'";
						}


						//kana
						if (isset($kana)) {
							$condition .= " AND kana LIKE '%" . $kana . "%'";
						}

						//gender
						if (isset($gender) && $gender != "") {
							$condition .= " AND ( gender IN (" . $gender_arr . "))";
						}


						//birth
						if (isset($min_date)) {
							$condition .= " AND birth >= '" . $min_date . "'";
						}

						if (isset($max_date)) {
							$condition .= " AND birth <= '" . $max_date . "'";
						}


						//company
						if (isset($company) && $company != "") {
							$condition .= " AND company_id = " . $company;
						}
					}






					require_once dirname(__FILE__) . '/model/CustomerModel.php';
					$bm = new CustomerModel();
					$result = $bm->search($condition);

					if ($result->num_rows === 0) {
					?>
						<div>
							未登録
						</div>
					<?php
					} else {
					?>
						<div class="table-wrap">
							<table class="table">
								<tr>
									<th>顧客ID</th>
									<th>
										<p>顧客名</p>
										<p>(カナ)</p>
									</th>
									<th>
										<p>メールアドレス</p>
										<p>電話番号</p>
									</th>
									<th>所属会社</th>
									<th>
										<p>新規登録日時</p>
										<p>最終更新日時</p>
									</th>
									<th>編集ボタン</th>
									<th>削除ボタン</th>
								</tr>

								<?php
								while ($row = $result->fetch_assoc()) {
								?>
									<form name="deleteForm" method="post" action="?">
										<input type="hidden" name="customer_id" value="<?= $row['id']; ?>">
										<tr>
											<td><?= $row['id']; ?></td>
											<td>
												<p><?= $row['name']; ?></p>
												<p><?= $row['kana']; ?></p>
											</td>
											<td>
												<p><?= $row['email']; ?></p>
												<p><?= $row['tel']; ?></p>
											</td>
											<td>
												<?= $row['company_name']; ?>
											</td>
											<td>
												<p><?= $row['birth']; ?></p>
												<p><?= $row['updated_at']; ?></p>
											</td>
											<td>
												<button class="btm-edit" type="submit" formaction="./4_edit.php">
													<p>編集</p>
												</button>
											</td>
											<td>
												<button class="btm-delete" type="submit" formaction="delete_submit.php">
													<p>削除</p>
												</button>
												<!-- <button class="btm-delete" type="button" onclick="document.getElementById('dialog-delete').show();">
													<p>削除</p>
												</button> -->
											</td>
										</tr>

										<!-- <dialog id="dialog-delete">
											<h2>削除確認</h2>
											<p>データを削除してもよろしいでしょうか？</p>
											<button type="button" onclick="document.getElementById('dialog-delete').close();">
												いいえ
											</button>
											<button type="submit" name="action">
												はい
											</button>
										</dialog> -->
									</form>
							<?php
								}
							}
							?>
							</table>
						</div>
				</div>
			</div>
		</main>
		<!--================== コンテンツ終了 ==================-->

	</div>
	<script src="./js/validation.js"></script>
</body>

</html>




<!--================== 開始 ==================-->
<!--================== 終了 ==================-->