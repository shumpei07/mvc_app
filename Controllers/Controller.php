<?php
class Controller
{
    function __construct()
    {
        if(session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function view(string $template, array $params = []): void
    {
        $Smarty = new Smarty();
        $Smarty->setTemplateDir(ROOT_PATH.'Views');
        $Smarty->setCompileDir(ROOT_PATH.'Views/compile');
        $Smarty->escape_html = true;
        $Smarty->assign($params);
        try {
            $Smarty->display($template . '.tpl');
        } catch (SmartyException|Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function certification(){
      $errorMessages = [];
      if(empty($_POST['email'])){
          $errorMessages['email'] = 'メールアドレスを入力してください。';
      }
  
      if(empty($_POST['password'])){
          $errorMessages['password'] = 'パスワードを入力してください';
      }
  
      if(!empty($errorMessages)){
          // バリデーション失敗
          $_SESSION['errorMessages'] = $errorMessages;
          $_SESSION['post'] = $_POST;
          header('Location: /user/log-in');
      }else{
          //認証処理
          $user = new User;
          $result = $user->certification(
              $_POST['email'],
              $_POST['password']
          );
  
          if(is_array($result)){
              $_SESSION['auth'] = $result['id'];
              header("Location: /");
              exit();
          }else{
              $errorMessages['auth'] = 'メールアドレスまたはパスワードが誤っています。';
              $this->view('user/login', ['post' => $_POST, 'errorMessages' => $errorMessages]);
          }
      }
  }
  
}