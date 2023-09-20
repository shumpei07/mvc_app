window.addEventListener('DOMContentLoaded', () => {

  // 「送信」ボタンの要素を取得
  const submit = document.querySelector('.btn');
 
  // 「送信」ボタンの要素にクリックイベントを設定する
  submit.addEventListener('click', (e) => {
      // デフォルトアクションをキャンセル
      e.preventDefault();
      // 「お名前」入力欄の空欄チェック
      // フォームの要素を取得
      const name = document.querySelector('input[name="name"]');
      // エラーメッセージを表示させる要素を取得
      const errMsgName = document.querySelector('.error-text-name');
      if(!name.value){
          // クラスを追加(エラーメッセージを表示する)
          // errMsgName.classList.add('form-invalid');
          // エラーメッセージのテキスト
          errMsgName.textContent = '氏名が入力されていません';
      }else if(name.value.length > 10){
        errMsgName.textContent = '氏名は10文字以内で入力してください';
      }else{
          // エラーメッセージのテキストに空文字を代入
          errMsgName.textContent ='';
      }
    
      
          // フリガナ入力欄のチェック
      const kana = document.querySelector('input[name="kana"]');
      const errMsgKana = document.querySelector('.error-text-kana');
      console.log(1);
      if (!kana.value) {
        errMsgKana.textContent = 'フリガナが入力されていません';
      }else if(kana.value.length > 10){
        errMsgKana.textContent = 'フリガナは10文字以内で入力してください';
      } else {
        errMsgKana.textContent = '';
      }

            // 電話番号入力欄のチェック
      const tel = document.querySelector('input[name="tel"]');
      const errMsgTel = document.querySelector('.error-text-tel');
      if (!tel.value) {
          errMsgTel.textContent = '電話番号が入力されていません';
        }else if(tel.value.length == 11){
          errMsgTel.textContent = '電話番号は11桁で入力してください';    
      } else {
          errMsgTel.textContent = '';
      }

      // メールアドレス入力欄のチェック
      const email = document.querySelector('input[name="email"]');
      const errMsgEmail = document.querySelector('.error-text-email');
      // メールアドレスの正規表現パターン
      const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
          const emailValue = email.value;
    
    if (!emailValue) {
        // メールアドレスが未入力の場合
        errMsgEmail.textContent = 'メールアドレスが入力されていません';
    } else if (!emailPattern.test(emailValue)) {
        // 正規表現パターンに一致しない場合
        errMsgEmail.textContent = '正しいメールアドレスの形式ではありません';
    } else {
        // エラーメッセージをクリア
        errMsgEmail.textContent = '';
    }

      // お問い合わせ内容入力欄のチェック
      const inquiry = document.querySelector('textarea[name="inquiry"]');
      const errMsgInquiry = document.querySelector('.error-text-inquiry');
      if (!inquiry.value) {
          errMsgInquiry.textContent = 'お問い合わせ内容が入力されていません';
      } else {
          errMsgInquiry.textContent = '';
      }
  }, false);
}, false);