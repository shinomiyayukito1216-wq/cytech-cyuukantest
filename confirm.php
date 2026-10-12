<?php
// 要件 c) POSTメソッド以外での直接アクセスは contact.php へリダイレクト
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: contact.php');
    exit;
}

// 要件 a) POSTデータを受け取る
$name        = $_POST['name'] ?? '';
$companyName = $_POST['companyName'] ?? '';
$email       = $_POST['email'] ?? '';
$age         = $_POST['age'] ?? '';
$message     = $_POST['message'] ?? '';

// 前後の空白を除去
$name        = trim($name);
$companyName = trim($companyName);
$email       = trim($email);
$age         = trim($age);
$message     = trim($message);

// 設問7 要件b) PHP側での未入力チェック（1つでも空欄があればエラーフラグを立てる）
$errors = [];
if ($name === '' || $companyName === '' || $email === '' || $age === '' || $message === '') {
    $errors[] = "必須項目が未入力です。入力内容をご確認ください。";
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム-確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h2>お問い合わせフォーム - 確認画面</h2>
    </header>

    <div class="container">
        <!-- サイドバー -->
        <aside>
            <ul>
                <li><a href="#">トップページ</a></li>
                <li><a href="#">人気投稿</a></li>
                <li><a href="#">エンジニアおすすめ商品</a></li>
                <li><a href="#">エンジニアおすすめ記事</a></li>
                <li><a href="#">投稿ページ</a></li>
            </ul>
        </aside>

        <!-- メイン部分 -->
        <main>
            <?php if (!empty($errors)): ?>
                <!-- 設問7 要件b) 入力漏れがある場合のエラー表示 -->
                <div style="color: red; margin-bottom: 20px;">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php endforeach; ?>
                </div>
                <input type="button" value="戻る" onclick="history.back();">
            <?php else: ?>
                <!-- 正しく入力されている場合のみフォームを表示 -->
                <form action="send.php" method="POST">
                    <!-- データを hidden フィールドで send.php に渡す -->
                    <input type="hidden" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="companyName" value="<?php echo htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="age" value="<?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?>">
                    <input type="hidden" name="message" value="<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>">

                    <table border="3">
                        <tr>
                            <th>お名前</th>
                            <td><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                        <tr>
                            <th>会社名</th>
                            <td><?php echo htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td><?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                        <tr>
                            <th>年齢</th>
                            <td><?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?></td>
                        </tr>
                        <tr>
                            <th>お問い合わせ内容</th>
                            <td><?php echo nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')); ?></td>
                        </tr>
                    </table>
                    <br>
                    <input type="button" value="戻る" onclick="history.back();">
                    <input type="submit" value="送信">
                </form>
            <?php endif; ?>
        </main>
    </div>

</body>
</html>