
<?php
try {
  $db=new pdo("mysql:host=localhost; dbname=chat; charset=utf8","root","");

} catch (PDOException $e) {
  echo $e->getMessage();
}

?>
