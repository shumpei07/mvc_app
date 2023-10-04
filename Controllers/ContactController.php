<?php
require_once ROOT_PATH.'Controllers/Controller.php';

require_once ROOT_PATH.'Models/Contact.php';

class ContactController extends Controller
{
    private $name;
    private $kana;
    private $tel;
    private $email;
    private $inquiry;
    

    public function __construct()
    {
        // コンストラクター内でプロパティの初期化
        $this->name = "";
        $this->kana = "";
        $this->tel = "";
        $this->email = "";
        $this->inquiry = "";
    }

    public function validate()
    {
      $contact = new Contact();
        $result = $contact->read();
      // フォームがPOSTリクエストで送信された場合に実行される部分
      if ($_SERVER["REQUEST_METHOD"] == "POST") 
      {
        $this->name    = $_POST["name"];
        $this->kana    = $_POST["kana"];
        $tel     = $_POST["tel"];
        $this->email   = $_POST["email"];
        $this->inquiry = $_POST["inquiry"];

        $errorMessages = [];

          // 氏名のバリデーション
          if (empty($_POST['name'])) {
              $errorMessages['name'] = '氏名を入力してください。';
          } elseif (mb_strlen($_POST['name']) > 10) {
              $errorMessages['name'] = '氏名は10文字以内で入力してください。';
          }

          // フリガナのバリデーション
          if (empty($_POST['kana'])) {
              $errorMessages['kana'] = 'フリガナを入力してください。';
          } elseif (mb_strlen($_POST['kana']) > 10) {
              $errorMessages['kana'] = 'フリガナは10文字以内で入力してください。';
          }

          // 電話番号のバリデーション
          if (empty($_POST['tel'])) {
              $errorMessages['tel'] = '電話番号を入力してください。';
          } elseif (!preg_match('/^\d{11}$/',$_POST["tel"])){
              $errorMessages['tel'] = '電話番号は11桁で入力してください。';
          }

          // メールアドレスのバリデーション
          if (empty($_POST['email'])) {
              $errorMessages['email'] = 'メールアドレスを入力してください。';
          } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
              $errorMessages['email'] = '有効なメールアドレスを入力してください。';
          }

          // お問い合わせ内容のバリデーション
          if (empty($_POST['inquiry'])) {
              $errorMessages['inquiry'] = 'お問い合わせ内容を入力してください。';
          }

          // エラーメッセージがある場合は、エラーメッセージをセッションに保存し、入力画面にリダイレクト
            if (!empty($errorMessages)) {
              $_SESSION['errorMessages'] = $errorMessages;
              $_SESSION['post'] = $_POST;
              $this->view('contact/input',['errorMessages' => $errorMessages, 'post' => $_POST, 'result' => $result]); 
              // バリデーションに成功した場合、次の処理（データの保存など）を行う
              // ここでデータベースへの保存などを行うことができます
            
            }else{

              // POSTリクエスト以外の場合、通常の入力画面を表示する処理を追加できます
              // $_SESSION = $_POST;         
              // header("location: /contact/confirmation");
              $this->view('contact/confirmation', ['post' => $_POST]);
            }
      }
        
    }
        
    public function input()
    {
      if ($_SERVER['REQUEST_METHOD'] === 'GET')
      {
       
        $_SESSION = array();

        $contact = new Contact();
        $result = $contact->read();

        $this->view('contact/input',['result' => $result]);
      
      } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') 
      {
          $postData = $_SESSION;
          $_SESSION = array();

          $this->view('contact/input', ['post' => $postData]);
      }
    }

    public function cancel()
    {
      $contact = new Contact();
        $result = $contact->read();

      $postData = $_POST;
      $this->view('contact/input', ['post' => $postData,'result'=>$result]);
    }

      public function completion()
    {      
        $this->name    = $_POST["name"];
        $this->kana    = $_POST["kana"];
        $this->tel     = $_POST["tel"];
        $this->email   = $_POST["email"];
        $this->inquiry = $_POST["inquiry"];

      $contact = new Contact();            
      $contact->save($this->name, $this->kana, $this->tel, $this->email, $this->inquiry);
      $this->view('contact/completion');
    }
  
    

} 