<?php
session_start();

require_once "util.inc.php";

//---------------------
// 変数の初期化
//---------------------
$name 	 = "";
$kana 	 = "";
$email 	 = "";
$message = "";

//---------------------
// セッション変数が登録されている場合は読み出す
//---------------------
if (isset($_SESSION["contact"])) {
	$contact = $_SESSION["contact"];
	$name 	 = $contact["name"];
	$kana 	 = $contact["kana"];
	$email 	 = $contact["email"];
	$message = $contact["message"];
}

//---------------------
// 「確認する」ボタン
//---------------------
if ($_SERVER["REQUEST_METHOD"] === "POST") {
	$isValidated = true;

	// 入力データの取得
	$name 	 = $_POST["_name"];
	$kana 	 = $_POST["_kana"];
	$email 	 = $_POST["_email"];
	$message = $_POST["_message"];

	// 名前のバリデーション
	if ($name === "") {
		$errorName 	 = "お名前を入力してください";
		$isValidated = false;
	}

	// フリガナのバリデーション
	if ($kana === "") {
		$errorKana 	 = "フリガナを入力してください";
		$isValidated = false;
	}
	elseif (!preg_match("/^[ァ-ヶー ]+$/u", $kana)) {
		$errorKana 	 = "全角カタカナで入力してください";
		$isValidated = false;
	}

	// メールアドレスのバリデーション
	if ($email === "") {
		$errorEmail  = "メールアドレスを入力してください";
		$isValidated = false;
	}
	elseif (!preg_match("/^[^@]+@[^@]+\.[^@]+$/", $email)) {
		$errorEmail  = "メールアドレスの形式が正しくありません";
		$isValidated = false;
	}

	// 問い合わせ内容のバリデーション
	if ($message === "") {
		$errorMessage = "お問い合わせ内容を入力してください";
		$isValidated  = false;
	}

	// エラーが無ければ基礎画面へ移動
	if ($isValidated == true) {
		$contact = [
			"name" 	  => $name,
			"kana" 	  => $kana,
			"email"   => $email,
			"message" => $message
		];
		$_SESSION["contact"] = $contact;
		header("Location: contact_conf.php");
		exit;
	}
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<title>Contact | Hirokazu Tsutsumi Portfolio</title>
	<?php css(); ?>
</head>
<body id="contact">
<main>
	<p class="reqired">* 入力必須項目</p>
	<form action="" method="post"  novalidate>
		<p <?php if (isset($errorName)) echo 'class="error"'; ?>>
			<label for="name">名前<span>*<?php if (isset($errorName)) echo h($errorName); ?></span></label>
			<input type="text" id="name" name="_name" value="<?php echo h($name); ?>" reqired>
		</p>
		<p <?php if (isset($errorKana)) echo 'class="error"'; ?>>
			<label for="kana">フリガナ
			<span>*<?php if (isset($errorKana)) echo h($errorKana); ?></span>
			</label>
			<input type="text" id="kana" name="_kana" value="<?php echo h($kana); ?>" placeholder="全角カタカナでご入力ください" reqired>
		</p>
		<p <?php if (isset($errorEmail)) echo 'class="error"'; ?>>
			<label for="email">メールアドレス<span>*<?php if (isset($errorEmail)) echo h($errorEmail); ?></span></label>
			<input type="email" id="email" name="_email" value="<?php echo h($email); ?>" required>
		</p>
		<p <?php if (isset($errorMessage)) echo 'class="error"'; ?>>
			<label for="message">お問い合わせ内容<span>*<?php if (isset($errorMessage)) echo h($errorMessage); ?></span></label>
			<textarea id="message" name="_message" required><?php echo h($message); ?></textarea>
		</p>
		<p><input type="submit" value="確認する"></p>
	</form>
</main>
</body>
</html>