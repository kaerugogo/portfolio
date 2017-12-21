<?php
session_start();

require_once "util.inc.php";
require_once "libs/qd/qdsmtp.php";
require_once "libs/qd/qdmail.php";


//--------------------
// セッション変数が登録されている場合は読み出す
//--------------------
if (isset($_SESSION["contact"])) {
    $contact = $_SESSION["contact"];
    $name    = $contact["name"];
    $kana    = $contact["kana"];
    $email   = $contact["email"];
    $message = $contact["message"];
}
else {
    // 不正なアクセス
    // 入力ページへ戻る
    header("Location: contact.php");
    exit;
}


//--------------------
// メール設定
//--------------------
$from = "zd3D10@sim.zdrv.com"; //zd???? には自分のIDを入れる
$to   = "zd3D10@sim.zdrv.com";
$cc   = "os0@mac.com";


//--------------------
// 「送信」ボタン
//--------------------
if (isset($_POST["send"])) {
    // 管理者へメール送信
    $body = <<<EOT
■お名前
{$name}

■フリガナ
{$kana}

■メールアドレス
{$email}

■お問い合わせ内容
{$message}

EOT;

    $mail = new Qdmail();
    $mail->errorDisplay(false);
    $mail->smtpObject()->error_display = false;
    // 基本設定
    $mail->from($from, "portfolioサイト");
    $mail->to($to, "Hirokazu Tsutsumi");
    $mail->cc($cc, "Hirakazu Tsutsumi");
    $mail->subject("portfolioサイト問い合わせ");
    $mail->text($body);
    // SMTP用設定
    $param = array(
        "host" => "w1.sim.zdrv.com",
        "port" => 25,
        "from" => $from,
        "protocol" => "SMTP",
    );
    $mail->smtp(TRUE);
    $mail->smtpServer($param);
    // 送信
    $flag = $mail->send();
    if ($flag == TRUE) {
        // 送信成功
        // セッション変数を破棄
        unset($_SESSION["contact"]);
        // 完了画面へ移動
        header("Location: contact_done.html");
        exit;
}
else {
    // 送信失敗
    // エラー画面へ移動
    // セッション変数は破棄しない
    header("Location: contact_error.html");
    exit;
    }
}
//--------------------
// 「修正」ボタン
//--------------------
if (isset($_POST["back"])) {
    // 入力ページへ戻る
    header("Location: contact.php");
    exit;
}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<meta charset="UTF-8">
	<title>Contact | Hirokazu Tsutsumi Portfolio</title>
	<?php css(); ?>
</head>
<body id="contact">
    <main>
    	<section class="leader">
            <h2>お問い合わせ（内容確認）</h2>
            <p>お問い合わせ内容をご確認いただき、よろしければ「送信」してください。近日中に返信いたします。</p>
        </section>
        <section class="inquiry">
            <dl>
                <dt>名前</dt>
                <dd><?php echo h($name); ?></dd>
                <dt>フリガナ</dt>
                <dd><?php echo h($kana); ?></dd>
                <dt>メールアドレス</dt>
                <dd><?php echo h($email); ?></dd>
                <dt>内容</dt>
                <dd><?php echo nl2br(h($message)); ?></dd>
            </dl>
            <form action="" method="post">
                <p>
                    <input type="submit" name="back" value="修正する">
                    <input type="submit" name="send" value="送信">
                </p>
            </form>
        </section>
    </main>
</body>
</html>
