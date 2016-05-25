<?php
// if (!empty($_GET['id'])) {
//   if (isset($_GET['module'])) {
    require_once("../../config/database.php");
    $id=mysql_real_escape_string($_GET['id']);
    $module=mysql_real_escape_string($_GET['module']);
    $sql_update_status = "update $module set active = '1' where id = '$id' ";
    $req_update_status = mysql_query($sql_update_status) or die('<br>Erreur SQL !<br>'.$sql_update_status.'<br>'.mysql_error());
//   }
// }

?>
