<style>
    .list{ padding: 7px; border-bottom:1px solid #eee;}
    .alert{background-color:red; color:white; padding:7px;}
    .succses{background-color:green; color:white; padding:7px;}
</style>
<?php
include "connect.php";
include "function.php";
$sendId=2;


$list=$db->query("SELECT * from messages where user_id='$sendId' or send_id='$sendId'")->fetchAll(PDO::FETCH_ASSOC);
foreach ($list as $key => $value) {
    if($value['user_id']==$sendId){$useId=$value['send_id'];}else {$useId=$value['user_id'];}
    $userinfo= userinfo($useId);
    $sonmesaj=$db->query("SELECT * FROM messages_sub where messagesid='".$value['id']."' order by id desc limit 0,01 ")->fetch(PDO::FETCH_ASSOC);
    
?>


<div class="list"><a href="chat.php?id=<?=$useId;?>"><?=$userinfo['isim'];?></a> <br> Son Mesaj: <?=$sonmesaj['yazi'];?></div>
<?php
}



?>