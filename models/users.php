<?php

class Models_users extends System_model{
    public function getAllUsers(){
        $all = $this->db->select("select * from users")->all();
        return $all;
    }
    public function login($email,$pass){
        $user = $this->db->select("select * from users where email='$email' and pass='$pass'")->first();
        return $user;
    }
    public function response($arg)
    {
        return $this->db->select("select * from users where id=$arg")->first();
    }
    function update_avatar($data,$id)
    {
        return $this->db->update('users',$data,$id);
    }
    public function getFriends($id){
        $all = $this->db->select("select * from users where id!=$id")->all();
        return $all;
    }
}
