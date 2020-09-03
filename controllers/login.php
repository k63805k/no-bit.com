<?php

class Login extends System_controller{
    public function user() {
        
        $this->view->error = FALSE;
        
        if(isset($_POST['login'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            
            if(!empty($email) && !empty($pass)){
                $userObj = new Models_users();
                $login = $userObj->login($email, md5($pass));
                
                if(is_null($login)){
                    $this->view->error = "Wrong EMail or Password";
                }else{
                    $_SESSION['id'] = $login['id'];
                    setcookie("email", $login['email'],  time()+86400);
                    $this->redirect("account/");
                }
                
            }else{
                $this->view->error = 'Please enter the email and password';
            }
        }
        $this->view->render('user');
        //var_dump($login);
    }
    public function index(){
        echo 'login->index';
    }
}

