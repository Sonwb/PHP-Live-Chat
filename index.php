<style>
    .list{ padding: 7px; border-bottom:1px solid #eee;}
    .alert{background-color:red; color:white; padding:7px;}
    .succses{background-color:green; color:white; padding:7px;}
</style>

<meta charset="UTF-8">
<?php
include "connect.php";
include "function.php";
$sendId=1;
$userId=2;
$date=date("Y-m-d");
$userinfo= userinfo($userId);
if($_POST){
    $text =strip_tags($_POST['text']);
    if($text!=""){

        $c= $db->query("SELECT * FROM messages where user_id='$userId' and send_id='$sendId' or user_id='$sendId' and send_id='$userId'")->rowcount();
        if($c==0){
            $insert=$db->query("INSERT INTO messages(user_id,send_id)VALUES('$userId','$sendId')");
            $ensonid=$db->lastInsertId();
            
            
            $icerikinsert=$db->query("INSERT INTO messages_sub  (messagesid,yazi,tarih,user_id) values ('$ensonid','$text','$date','$sendId')");
            if ($icerikinsert) {
                echo ' <div class="succses"> Tebrikler</div>';
            }
            else{
                echo ' <div class="alert"> hata</div>';
            }
        }

            else {
                $w= $db->query("SELECT * FROM messages where user_id='$userId' and send_id='$sendId' or user_id='$sendId' and send_id='$userId'")->fetch();
                $sonid=$w['id'];

                $icerikinsert=$db->query("INSERT INTO messages_sub  (messagesid,yazi,tarih,user_id) values ('$sonid','$text','$date','$sendId')");
                if ($icerikinsert) {
                    echo ' <div class="succses"> Tebrikler</div>';
                }
                else{
                    echo ' <div class="alert"> hata</div>';
                }
            }
        
       
    }
    else{
        echo "<div class='alert'> Metin boş bırakılamaz </div>";
    }
}
?>

<div class="list"><?=$userinfo['isim']; ?> <?=$userinfo['email']; ?> İle sohbet</div>

<form action="" method="post">

<div class="list">
    <textarea name="text" id="" cols="30" rows="10"></textarea>
</div>
<div class="list"><button>Gönder</button></div>
</form>


<?php
   $w= $db->query("SELECT * FROM messages where user_id='$userId' and send_id='$sendId' or user_id='$sendId' and send_id='$userId'")->fetch(PDO::FETCH_ASSOC);
 
   $all=$db->query("SELECT * from messages_sub where messagesid='".$w['id']."'ORDER BY id desc")->fetchAll(PDO::FETCH_ASSOC);

    foreach ($all as $key=>  $value) {
                
        $userinfo= userinfo($value['user_id']);
        
   ?>
    <div class="list"><b><?= $userinfo['isim']?></b>: <?= $value['yazi']?>   </div>
    <?php  }
?>