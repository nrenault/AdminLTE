<?php
if (isset($_GET['module'])) {
    require_once("../../config/database.php");
    $module=mysql_real_escape_string($_GET['module']);
    if ($module == 'nodes'){
      $id=mysql_real_escape_string($_GET['id']);
      $name=$_GET['name'];
      $lang=$_GET['lang'];
      if ($_GET['status'] == "on") {
        $status = "1";
      } else {
        $status = "0";
      }
      $sql_add = "insert into $module (id,name,lang,active) values ('$id','$name','$lang','$status')";
      $req_add = mysql_query($sql_add) or die('<br>Erreur SQL !<br>'.$sql_add.'<br>'.mysql_error());
    }
    if ($module == 'partners') {
      $website_id = $_GET['website_id'];
      $text = $_GET['text'];
      $title = $_GET['title'];
      $url = $_GET['url'];
      $lang = $_GET['lang'];
      if ($_GET['status'] == "on") {
        $status = "1";
      } else {
        $status = "0";
      }
      $sql_add = "insert into $module (link_text,link_title,link_url,website_id,lang,active) values ('$text','$title','$url','$website_id','$lang','$status')";
      $req_add = mysql_query($sql_add) or die('<br>Erreur SQL !<br>'.$sql_add.'<br>'.mysql_error());
    }
    if ($module == 'brands') {
      // $name=mysql_real_escape_string(.html_entity_decode($_GET['name'], ENT_NOQUOTES, "UTF-8"));
      $name=mysql_real_escape_string(htmlentities($_GET['name']));
      $sql_add = "insert into $module (name,img,active) values ('$name','','1')";
      $req_add = mysql_query($sql_add) or die('<br>Erreur SQL !<br>'.$sql_add.'<br>'.mysql_error());
    }
    if ($module == 'product') {
      $product_asin = $_GET['asin'];
      $product_node = $_GET['node'];
      //$title = $_GET['title'];
      //$url = $_GET['url'];
      //$lang = $_GET['lang'];
      //if ($_GET['status'] == "on") {
        //$status = "1";
      //} else {
        //$status = "0";
      //}
      if (!empty($product_asin))
        {
          $sql_insert_products = "insert into products_fr (ASIN,title,img_url,price,description,node_id,url,groupe) values ('$product_asin','','','','','$product_node','','NewReleases')";
          $req_insert_products = mysql_query($sql_insert_products) or die('<br>Erreur SQL !<br>'.$sql_insert_products.'<br>'.mysql_error());
      }
      //$sql_add = "insert into $module (link_text,link_title,link_url,website_id,lang,active) values ('$text','$title','$url','$website_id','$lang','$status')";
      //$req_add = mysql_query($sql_add) or die('<br>Erreur SQL !<br>'.$sql_add.'<br>'.mysql_error());
    }
}

?>
