function deleteCheck() {
	
}




function listSubForm() {
	//変数の定義
	var gender = document.getElementsByName("gender_search[]");
	var isRight = true;


	// ---------- 性別のチェック ----------
	var flag = false;

	for (var i = 0; i < gender.length; i++) {
		if (gender[i].checked) {
			flag = true;
		}
	}

	if (!flag) {
		document.getElementById("gender_error_Id").innerHTML = "※入力が必須です";
		isRight = false;
	}

	return isRight;
}





function regSubForm() {
	//変数の定義
	var name = document.getElementById("nameID").value;
	var kana = document.getElementById("kanaID").value;
	var email = document.getElementById("emailID").value;
	var email_pattern = /^[\S]+@[\S]+\.[\S]+$/;
	var tel = document.getElementById("telID").value;
	var tel_pattern = /^[0-9]{9,10}$/;
	var gender = document.getElementsByName("gender");
	var birth = document.getElementById("birthID").value;
	var company = document.getElementById("companyID").value;
	var isRight = true;

	
	// console.log(gender);
	// console.log(gender.length);
	// document.getElementById("name_error_Id").innerHTML = "";
	// document.getElementById("kana_error_Id").innerHTML = "";
	// document.getElementById("email_error_Id").innerHTML = "";
	// document.getElementById("tel_error_Id").innerHTML = "";
	// document.getElementById("gender_error_Id").innerHTML = "";
	// document.getElementById("birth_error_Id").innerHTML = "";
	// document.getElementById("company_error_Id").innerHTML = "";



	// ---------- 名前のチェック ----------
	if (name == '') {
		document.getElementById("name_error_Id").innerHTML = "※入力が必須です";
		isRight = false;
	} else if (name.length < 3) {
		document.getElementById("name_error_Id").innerHTML = "※3文字以上入力してください";
		isRight = false;
	}


	// ---------- フリガナのチェック ----------
	if (kana == '') {
		document.getElementById("kana_error_Id").innerHTML = "※入力が必須です";
		isRight = false;
	} else if (kana.length < 3) {
		document.getElementById("kana_error_Id").innerHTML = "※3文字以上入力してください";
		isRight = false;
	}


	// ---------- メールアドレスのチェック ----------
	if (email == '') {
		document.getElementById("email_error_Id").innerHTML = "※入力が必須です";
		isRight = false;
	} else if (!email_pattern.test(email)) {
		document.getElementById("email_error_Id").innerHTML = "※xxx@xxx.xxx の形式で入力してください";
		isRight = false;
	}


	// ---------- 電話番号のチェック ----------
	if (tel == '') {
		document.getElementById("tel_error_Id").innerHTML = "※入力が必須です";
		isRight = false;
	} else if (!tel_pattern.test(tel)) {
		document.getElementById("tel_error_Id").innerHTML = "※「-（ハイフン）」 なしの9桁または10桁の数字で入力してください";
		isRight = false;
	}


	// ---------- 性別のチェック ----------
	var flag = false;

	for (var i = 0; i < gender.length; i++) {
		if (gender[i].checked) {
			flag = true;
		}
	}

	if (!flag) {
		document.getElementById("gender_error_Id").innerHTML = "※入力が必須です";
		isRight = false;
	}


	// ---------- 生年月日のチェック ----------
	if (birth == '') {
		document.getElementById("birth_error_Id").innerHTML = "※入力が必須です";
		isRight = false;
	}


	// ---------- 所属会社のチェック ----------
	if (company == '') {
		document.getElementById("company_error_Id").innerHTML = "※入力が必須です";
		isRight = false;
	}

	
	return isRight;
}