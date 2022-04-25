<?php


   include "connect.php";
   include "function.php";
   $ad=$_COOKIE['ad'];
   $email=$_COOKIE['email'];
   $kullanici= $db->query("SELECT user_id FROM livechat where isim='$ad' and email='$email' ")->fetch();
  
  
   
   $sendId=$kullanici['user_id'];

   $userId=1;

   









   $text =strip_tags($_POST['text']);
   if($text!=""){

       $c= $db->query("SELECT * FROM messages where user_id='$userId' and send_id='$sendId' or user_id='$sendId' and send_id='$userId'")->rowcount();
       if($c==0){
           $insert=$db->query("INSERT INTO messages(user_id,send_id)VALUES('$userId','$sendId')");
           $ensonid=$db->lastInsertId();
           
           
           $icerikinsert=$db->query("INSERT INTO messages_sub  (messagesid,yazi,tarih,user_id) values ('$ensonid','$text','$date','$sendId')");
           if ($icerikinsert) {
               
           }
           else{

           }
       }

           else {
               $w= $db->query("SELECT * FROM messages where user_id='$userId' and send_id='$sendId' or user_id='$sendId' and send_id='$userId'")->fetch();
               $sonid=$w['id'];

               $icerikinsert=$db->query("INSERT INTO messages_sub  (messagesid,yazi,tarih,user_id) values ('$sonid','$text','$date','$sendId')");
              
              
           }
       
      
   }
   else{

   }

























  
?>