<?php

class Message extends System_controller{
    public function chat($friend_id = false){
            $chat = new Models_message;
            if($friend_id){
                $res=$chat->sel_mess($friend_id,$_SESSION['id']);
                if(isset($_POST['ajax_text'])){
                    $text=$_POST['ajax_text'];
                    $insert=$chat->insert_mess($_SESSION['id'], $friend_id, $text);
                    if($insert){
                        echo 1;
                    }
                    else{
                        echo 0;
                    }
                }
                if(isset($_POST['ajax_mess'])){
                    $last = $_POST['ajax_mess'];
                    $res=$chat->sel_mess($friend_id, $_SESSION['id'], $last);
                    $array = json_encode($res);
                    echo $array;
                    exit;
                }
                
                $this->view->msg=$res;
                $this->view->render('message');
            }
   
        }
}
