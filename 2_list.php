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

	require_once dirname(__FILE__) . '/model/CustomerModel.php';
	$bm = new CustomerModel();
	$result = $bm->search();

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
						<form action="./2_list.php" onsubmit="return listSubForm()">

							<div class="search-form__label">
								<p>顧客名</p>
								<input type="text" id="nameID">
							</div>
							<div id="name_error_Id" class="error-box"></div> <!-- error -->

							<div class="search-form__label">
								<p>顧客名(カナ)</p>
								<input type="text" id="kanaID">
							</div>
							<div id="kana_error_Id" class="error-box"></div> <!-- error -->

							<div class="search-form__radio">
								<p>性別</p>
								<label class="radio">
									<input class="radio__btn" type="radio" name="gender" value="全て" checked="checked">
									<span class="radio__text">全て</span>
								</label>
								<label class="radio">
									<input class="radio__btn" type="radio" name="gender" value="男性">
									<span class="radio__text">男性</span>
								</label>
								<label class="radio">
									<input class="radio__btn" type="radio" name="gender" value="女性">
									<span class="radio__text">女性</span>
								</label>
							</div>
							<div class="search-form__label">
								<p>生年月日</p>
								<div class="date-box">
									<input type="date" id="min-date">
									<p>~</p>
									<input type="date" id="max-date">
								</div>
							</div>
							<div class="search-form__label">
								<p>所属会社</p>
								<select name="" id="">
									<option value=""></option>
									<option value=""></option>
									<option value=""></option>
									<option value=""></option>
									<option value=""></option>
								</select>
							</div>

							<button class="btm-search" type="submit">
								<p>検索</p>
							</button>
						</form>
					</div>
				</div>
				<div class="content-box2">
					<!-- 一覧 -->
					<div class="table-wrap">
						<table class="table">
							<tr>
								<th>顧客ID</th>
								<th>
									<p>顧客名</p>
									<p>(カナ)</p>
								</th>
								<th>メールアドレス</th>
								<th>電話番号</th>
								<th>所属会社</th>
								<th>新規日時</th>
								<th>最終更新日時</th>
								<th>編集ボタン</th>
								<th>削除ボタン</th>
							</tr>


							<?php
							if ($result->num_rows === 0) {
							?>
							<div>
								顧客は登録されていません。
							</div>
								<?php
							} else {
								while ($row = $result->fetch_assoc()) {
								?>

									<tr>
										<td><?= $row['id']; ?></td>
										<td>
											<p><?= $row['name']; ?></p>
											<p><?= $row['kana']; ?></p>
										</td>
										<td><?= $row['email']; ?></td>
										<td><?= $row['tel']; ?></td>
										<td><?= $row['company_id']; ?></td>
										<td><?= $row['created_at']; ?></td>
										<td><?= $row['updated_at']; ?></td>
										<td>
											<button class="btm-edit" type="button">
												<p>編集</p>
											</button>
										</td>
										<td>
											<dialog id="dialog-delete">
												<h2>削除確認</h2>
												<p>データを削除してもよろしいでしょうか？</p>
												<button type="button" onclick="document.getElementById('dialog-delete').close();">
													いいえ
												</button>
												<button type="button" onclick="document.getElementById('dialog-delete').close();">
													はい
												</button>
											</dialog>
											<button class="btm-delete" type="button" onclick="document.getElementById('dialog-delete').show();">
												<p>削除</p>
											</button>
										</td>
									</tr>
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