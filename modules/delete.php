<?php
if (isset($_GET['module'])) {
    require_once("../../config/database.php");
    $id=mysql_real_escape_string($_GET['id']);
    $module=mysql_real_escape_string($_GET['module']);
    $sql_add = "delete from $module	 where id = ".$id."";
    $req_add = mysql_query($sql_add) or die('<br>Erreur SQL !<br>'.$sql_add.'<br>'.mysql_error());
}
?>
