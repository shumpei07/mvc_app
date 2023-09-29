<?php
function route($path, $httpMethod){
    try {
        list($controller, $method) = explode('/', $path);
        $case = [$method, $httpMethod];
        switch ($controller) {
            case 'home':
                $controllerName = 'HomeController';
                switch ($case) {
                    case ['index', 'get']:
                        $methodName = 'index';
                        break;
                    default:
                        $controllerName = '';
                        $methodName = '';
                }
                break;

            case 'user':
              $controllerName = 'UserController';
              switch ($case) {
                  case ['log-in', 'get']:
                      $methodName = 'logIn';
                      break;
                  case ['sign-up', 'get']:
                      $methodName ='signUp';
                      break;
                  case ['create', 'post']:
                      $methodName = 'create';
                      break;
                  case ['log-out', 'get']:
                      $methodName = 'logOut';
                      break;
                  case ['certification', 'post']:
                      $methodName = 'certification';
                      break;
                  case ['my-page', 'get']:
                      $methodName ='myPage';
                      break;
                  case ['edit', 'get']:
                      $methodName = 'edit';
                      break;
                  case ['update', 'post']:
                      $methodName = 'update';
                      break;
                  case ['delete', 'get']:
                      $methodName = 'delete';
                      break;
                    }
                break;

            case 'contact':
              $controllerName = 'ContactController';
              switch ($case) {
                  case ['input', 'get']:
                      $methodName = 'input';
                      break;
                  case ['input', 'post']:
                      $methodName = 'validate';
                      break;
                  // case ['confirmation', 'post']:
                  //     $methodName = 'confirmation';
                  //     break;
                  case ['completion', 'post']:
                      $methodName = 'completion';
                      break;
                  case ['cancel', 'post']:
                    $methodName = 'cancel';
                    break;
                  // case ['read', 'get']:
                  //     $methodName = 'read';
                  //      break;
                  // case ['input', 'post']:
                  //       $methodName = 'edit';
                  //       break;
                  // case ['input', 'post']:
                  //       $methodName = 'edit';
                  //       break;
                    }
                break;

            default:
                $controllerName = '';
                $methodName = '';
        }

        require_once (ROOT_PATH."Controllers/{$controllerName}.php");

        $obj = new $controllerName();
        $obj->$methodName();
    }

      catch (Throwable $e) 
      {
        error_log($e->getMessage());
        header("HTTP/1.0 404 Not Found");
                              exit();
      }
}