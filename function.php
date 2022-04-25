<?php

function userinfo($id){
    global $db;
    return $db->query("SELECT * FROM livechat WHERE user_id='$id'")->fetch();
}



?>