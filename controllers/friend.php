<?php

class Friend extends System_controller{
    function index($arg){
        echo "friend id=".$arg."<br>";
        echo "user id=".$_SESSION['id'];
    }
}

