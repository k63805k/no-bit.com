<?php

class Account extends System_controller{
    public function __construct() {
        parent::__construct();
        if(!isset($_SESSION['id'])){
            $this->redirect('login/user');
        }
    }

    public function index()
    {
        if(isset($_SESSION['id']))
        {
            $account = new Models_users();
            $x = $account->response($_SESSION['id']);
            $this->view->fname = $x['fname'];
            $this->view->lname = $x['lname'];
            $this->view->avatar = $x['avatar'];
            $this->view->err = '';
            $users = new  Models_users;
            $friends = $users->getFriends($_SESSION['id']);
            $this->view->friends = $friends;
        }
        
        $this->view->render('account',FALSE);
    }
    function logout()
    {
        if(isset($_POST['logout']))
        {
            session_destroy();
            $this->redirect("login/user");
        }
    }
    function upload()
    {
        $users = new  Models_users;
        if(isset($_FILES['file']) && !empty($_FILES['file'])){
                $ext_array=['jpg','jpeg','gif','png'];
                $exp=explode('.',$_FILES['file']['name']);
                $extension=end($exp);
                if($_FILES['file']['size']<2000000000 && in_array($extension,$ext_array)){
                        move_uploaded_file($_FILES['file']['tmp_name'],'public/images/'.$_FILES['file']['name']);
                        $file=$_FILES['file']['name'];
                        $array = [
                                'avatar' => $file
                        ];
                        $id = [
                                'id' => $_SESSION['id']
                        ];
                                $update = $users->update_avatar($array, $id);
                                $_SESSION['avatar'] = $file;
                                
                                $this->redirect("account");
                                
                }else{
                    $this->redirect("account");
               
            }
        }
    }
    function friend($id){
        $users = new Models_users();
        $az = $users->response($id);
        var_dump($az);
    }
}

