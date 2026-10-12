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
            <form action="send.php" method="POST">
                <!-- データを hidden フィールドを使って send.php に渡す準備 -->
                <input type="hidden" name="name" value="<?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="companyName" value="<?php echo htmlspecialchars($companyName, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="email" value="<?php echo htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="age" value="<?php echo htmlspecialchars($age, ENT_QUOTES, 'UTF-8'); ?>">
                <input type="hidden" name="message" value="<?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?>">

                <!-- 受け取ったデータをテーブル形式で表示（特殊文字をエスケープ） -->
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
        </main>
    </div>

</body>
</html>