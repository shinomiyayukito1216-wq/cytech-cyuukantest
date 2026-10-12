document.addEventListener('DOMContentLoaded', function() {

    // 1. フォーム送信時の未入力チェック & 確認アラート
    const form = document.querySelector('form');

    if (form) {
        form.addEventListener('submit', function(event) {
            // DOM から値を取得 (getElementById)
            const nameInput = document.getElementById('name');
            const companyInput = document.getElementById('companyName');
            const emailInput = document.getElementById('email');
            const ageInput = document.getElementById('age');
            const messageInput = document.getElementById('message');

            const name = nameInput ? nameInput.value.trim() : '';
            const companyName = companyInput ? companyInput.value.trim() : '';
            const email = emailInput ? emailInput.value.trim() : '';
            const age = ageInput ? ageInput.value.trim() : '';
            const message = messageInput ? messageInput.value.trim() : '';

            // 未入力チェック：1つでも空欄があれば送信を中止してアラート表示
            if (name === "" || companyName === "" || email === "" || age === "" || message === "") {
                event.preventDefault();
                alert("必須項目が未入力です。入力内容をご確認ください。");
                return;
            }

            // 入力が正しい場合、確認ダイアログを表示
            const confirmMessage = 
                "下記の内容を本当に送信しますか？\n\n" +
                "お名前➡️ " + name + "\n" +
                "会社名➡️ " + companyName + "\n" +
                "メールアドレス➡️ " + email + "\n" +
                "年齢➡️ " + age + "\n" +
                "お問い合わせ内容➡️ " + message;

            if (!confirm(confirmMessage)) {
                event.preventDefault();
            }
        });
    }

    // 2. フッターの背景色切り替え処理 (指定要件を完全反映)
    // 要件b) document.querySelector を使用してボタンを取得
    const colorBtn = document.querySelector('#color-btn');
    // 要件c) 背景色を変更する要素「footer」を取得
    const footer = document.querySelector('footer');

    // 要件d) 4色（青、赤、黄色、灰色）を配列に保存
    var colors = ['blue', 'red', 'yellow', 'gray'];
    // 現在の色を管理する変数
    var currentIndex = 0;

    if (colorBtn && footer) {
        colorBtn.addEventListener('click', function(event) {
            event.preventDefault();
            
            // 背景色を変更
            footer.style.backgroundColor = colors[currentIndex];
            
            // 要件f) %演算子を使って次の色のインデックスに切り替え（循環）
            currentIndex = (currentIndex + 1) % colors.length;
        });
    }

});