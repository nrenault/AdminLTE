<?php
// if (!empty($_GET['id'])) {
//   if (isset($_GET['module'])) {
    require_once("../../config/database.php");
    $id=mysql_real_escape_string($_GET['id']);
    $module=mysql_real_escape_string($_GET['module']);
    $name=$_GET['name'];
    $lang=$_GET['lang'];
    if ($_GET['status'] == "on") {
      $status = "1";
    } else {
      $status = "0";
    }
    $sql_add = "insert into $module (id,name,lang,active) values ('$id','$name','$lang','$status')";
    $req_add = mysql_query($sql_add) or die('<br>Erreur SQL !<br>'.$sql_add.'<br>'.mysql_error());
//   }
// }

?>
