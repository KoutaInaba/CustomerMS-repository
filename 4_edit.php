<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="トップページです。">
	<title>編集</title>
	<link href="./css/reset.css" rel="stylesheet" type="text/css" />
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!---------- データベース接続 ---------->
	<?php

	require_once dirname(__FILE__) . '/model/CustomerModel.php';
	$bm = new CustomerModel();
	$result = $bm->select($_POST);

	if (!$result) {
		exit('登録に失敗しました。' . $dbCon->error);
	}
	?>


	<!---------- データベース接続 ---------->
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
			<div class="content-register">
				<div class="content-header">
					<h1>編集ページ</h1>
				</div>
				<div class="content-register-box1">

					<?php
					$row = $result->fetch_assoc();
					?>

					<form method="post" action="./update_submit.php" name="customer_form" onsubmit="return regSubForm()">
						<input type="hidden" name="customer_id" value="<?= $row['id']; ?>">

						<div class="search-form__label">
							<p>お名前</p>
							<input type="text" id="nameID" name="name" value="<?= $row['name']; ?>">
						</div>
						<div id="name_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>フリガナ</p>
							<input type="text" id="kanaID" name="kana" value="<?= $row['kana']; ?>">
						</div>
						<div id="kana_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>メールアドレス</p>
							<input type="text" id="emailID" name="email" value="<?= $row['email']; ?>">
						</div>
						<div id="email_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>電話番号</p>
							<input type="text" id="telID" name="tel" value="<?= $row['tel']; ?>">
						</div>
						<div id="tel_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__radio">
							<p>性別</p>
							<label class="radio">
								<input class="radio__btn" type="radio" name="gender" <?php if ($row['gender'] === '0') { ?> checked <?php } ?> value="0">
								<span class="radio__text">男性</span>
							</label>
							<label class="radio">
								<input class="radio__btn" type="radio" name="gender" value="1" <?php if ($row['gender'] === '1') { ?> checked <?php } ?> value="1">
								<span class="radio__text">女性</span>
							</label>
							<label class="radio">
								<input class="radio__btn" type="radio" name="gender" value="2" <?php if ($row['gender'] === '2') { ?> checked <?php } ?> value="2">
								<span class="radio__text">その他</span>
							</label>
						</div>
						<div id="gender_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>生年月日</p>
							<input type="date" id="birthID" name="birth" value="<?= $row['birth']; ?>"> <!-- text => date -->
						</div>
						<div id="birth_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>所属会社</p>
							<select name="company_id" id="companyID">
								<?php
								require_once dirname(__FILE__) . '/model/CompanyModel.php';
								$bm = new CompanyModel();
								$result = $bm->select($row['company_id']);
								$row = $result->fetch_assoc();
								?>

								<option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>

								<?php
								require_once dirname(__FILE__) . '/model/CompanyModel.php';
								$bm = new CompanyModel();
								$result = $bm->search(null);

								if (!$result) {
									exit('登録に失敗しました。' . $dbCon->error);
								}

								while ($row = $result->fetch_assoc()) {
								?>
									<option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
								<?php
								};
								?>

							</select>
							<button class="btm-edit" type="button">
								追加・編集
							</button>
						</div>

						<div id="company_error_Id" class="error-box"></div> <!-- error -->


						<button class="btm-cancel" type="button" onclick="location.href='./2_list.php'">
							<p>キャンセル</p>
						</button>

						<button class="btm-register" type="submit">
							<p>編集完了</p>
						</button>
					</form>

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