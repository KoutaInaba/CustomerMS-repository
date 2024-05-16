<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="トップページです。">
	<title>登録</title>
	<link href="./css/reset.css" rel="stylesheet" type="text/css" />
	<link href="./css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<!---------- データベース接続 ---------->
	<?php

	require_once dirname(__FILE__) . '/model/CompanyModel.php';
	$bm = new CompanyModel();
	$result = $bm->search(null);
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
					<h1>顧客情報登録ページ</h1>
				</div>
				<div class="content-register-box1">

					<form method="post" action="./insert_submit.php" name="customer_form" onsubmit="return regSubForm()">

						<div class="search-form__label">
							<p>お名前</p>
							<input type="text" id="nameID" name="name" placeholder="例）山田 太郎" value="">
						</div>
						<div id="name_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>フリガナ</p>
							<input type="text" id="kanaID" name="kana" placeholder="例）ヤマダ タロウ" value="">
						</div>
						<div id="kana_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>メールアドレス</p>
							<input type="text" id="emailID" name="email" placeholder="例）" value="@xxx.jp">
						</div>
						<div id="email_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>電話番号</p>
							<input type="text" id="telID" name="tel" placeholder="例）" value="0000000000">
						</div>
						<div id="tel_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__radio">
							<p>性別</p>
							<label class="radio">
								<input class="radio__btn" type="radio" name="gender" value="0">
								<span class="radio__text">男性</span>
							</label>
							<label class="radio">
								<input class="radio__btn" type="radio" name="gender" value="1">
								<span class="radio__text">女性</span>
							</label>
							<label class="radio">
								<input class="radio__btn" type="radio" name="gender" value="2">
								<span class="radio__text">その他</span>
							</label>
						</div>
						<div id="gender_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>生年月日</p>
							<input type="date" id="birthID" name="birth" value=""> <!-- text => date -->
						</div>
						<div id="birth_error_Id" class="error-box"></div> <!-- error -->


						<div class="search-form__label">
							<p>所属会社</p>
							<select name="company_id" id="companyID">
								<?php

								if ($result->num_rows === 0) {
								?>
									<div>
										<option value="">会社は登録されていません。</option>
									</div>
								<?php
								} else {
								?>
									<option value=""><span>所属会社を選択してください</span></option>
									<?php
									while ($row = $result->fetch_assoc()) {
									?>
										<option value="<?= $row['id']; ?>"><?= $row['name']; ?></option>
								<?php
									}
								}
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
							<p>登録</p>
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