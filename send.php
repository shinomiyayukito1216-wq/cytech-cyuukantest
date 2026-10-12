<?php
// POSTメソッド以外からのアクセスは contact.php へリダイレクト
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// POSTメソッドで送信されたデータを受け取る
$name        = $_POST['name'] ?? '';
$companyName = $_POST['companyName'] ?? '';
$email       = $_POST['email'] ?? '';
$age         = $_POST['age'] ?? '';
$message     = $_POST['message'] ?? '';

// メール送信設定
mb_language("Japanese");
mb_internal_encoding("UTF-8");

$to = "test@example.com";
$subject = "お問い合わせがありました";

$body  = "名前 : " . $name . "\n";
$body .= "会社名 : " . $companyName . "\n";
$body .= "メールアドレス : " . $email . "\n";
$body .= "年齢 : " . $age . "\n";
$body .= "お問い合わせ内容 : \n" . $message . "\n";

$headers = "From: " . $email;

// メール送信実行（戻り値で成功・失敗を判定）
$isSuccess = mb_send_mail($to, $subject, $body, $headers);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム - 送信完了画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>お問い合わせフォーム - 送信完了画面</h1>
    </header>

    <div class="container">
        <main>
            <?php if ($isSuccess): ?>
                <p><?php echo "お問い合わせが送信されました。ありがとうございます！"; ?></p>
            <?php else: ?>
                <p style="color: red;">送信に失敗しました。時間をおいて再度お試しください。</p>
            <?php endif; ?>
            
            <p><a href="contact.php">お問い合わせフォームに戻る</a></p>
        </main>
    </div>

</body>
</html>