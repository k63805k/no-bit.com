<?php
class Models_message extends System_model{
    public function sel_mess($to_id, $from_id , $last = 0) {
       
        $y =  $this->db->select("SELECT m.*,u.fname,u.lname,u.avatar FROM `messages` as m "
                . "left join users as u on (m.from_id = u.id) "
                . "where ((m.from_id = $to_id and m.to_id=$from_id)"
                . " or (m.from_id = $from_id and m.to_id=$to_id)) and m.id > $last order by date asc")->all();
        return $y;
    }
    public function insert_mess($from_id,$to_id,$text) {
        $arr = [
            'from_id'=>$from_id,
            'to_id'=>$to_id,
            'body'=>$text
                ];
        return $this->db->insert("messages",$arr);
    }
}

