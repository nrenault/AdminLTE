<script>
function addPartner(form) {
    website_id =form.partner_website_id.value;
    text =form.partner_text.value;
    title =form.partner_title.value;
    url =form.partner_url.value;
    lang =form.partner_lang.value;
    status =form.partner_status.value;
    $.ajax(
    {
           type: "GET",
           url: "/admin/modules/add.php?module=partners&website_id="+website_id+"&text="+text+"&title="+title+"&url="+url+"&lang="+lang+"&status="+status+"",
           success: function()
           {
            parent.fadeOut('slow', function() {$(this).remove();});
           }
     });
     setTimeout(function() { location.reload(); }, 1000);
}
function desactivatePartner(id){
$.ajax(
{
       type: "GET",
       url: "/admin/modules/desactivate.php?module=partners&id="+id+"",
       success: function()
       {
        parent.fadeOut('slow', function() {$(this).remove();});
       }
 });
setTimeout(function() { location.reload(); }, 1000);
}
function activatePartner(id){
$.ajax(
{
       type: "GET",
       url: "/admin/modules/activate.php?module=partners&id="+id+"",
       success: function()
       {
        parent.fadeOut('slow', function() {$(this).remove();});
       }
 });
setTimeout(function() { location.reload(); }, 1000);
}
</script>
<section class="content-header">
  <h1>
    Partners
    <?php if (isset($_GET['website'])) {
      $id = $_GET['website'];
      $sql_select_website_name = "SELECT name FROM `websites` where id = '$id'";
      $req_select_website_name = mysql_query($sql_select_website_name) or die('<br>Erreur SQL !<br>'.$sql_select_website_name.'<br>'.mysql_error());
      $select_website_name = mysql_fetch_assoc($req_select_website_name);
      echo "<small>".$select_website_name['name']."</small>";
    }
    ?>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Modules</a></li>
    <li class="active">Partners</li>
  </ol>
</section>

<section class="content">
  <div class="row">
    <div class="col-xs-4">
      <div class="box">
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Websites</th>
              <th>Links Out</th>
              <th>Links In</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              <?php
              $sql_select_websites = "SELECT * FROM `websites`;";
              $req_select_websites = mysql_query($sql_select_websites) or die('<br>Erreur SQL !<br>'.$sql_select_websites.'<br>'.mysql_error());
              while ($website = mysql_fetch_assoc($req_select_websites)) {
                $website_id = $website['id'];
                $website_name = $website['name'];
                $website_url = preg_replace('#^https?://#', '', rtrim($website['url'],'/'));
                echo "<tr><td>";
                echo $website_name;
                echo "</td><td>";
                $sql_select_links_out = "SELECT COUNT(*) as total_out from partners where website_id = '$website_id'";
                $req_select_links_out = mysql_query($sql_select_links_out) or die('<br>Erreur SQL !<br>'.$sql_select_links_out.'<br>'.mysql_error());
                $links_out = mysql_fetch_assoc($req_select_links_out);
                echo $links_out['total_out'];
                echo "</td><td>";
                $sql_select_links_in = "SELECT COUNT(*) as total_in from partners where link_url like '%$website_url%'";
                $req_select_links_in = mysql_query($sql_select_links_in) or die('<br>Erreur SQL !<br>'.$sql_select_links_in.'<br>'.mysql_error());
                $links_in = mysql_fetch_assoc($req_select_links_in);
                echo $links_in['total_in'];
                echo "</td><td align='center'>";
                echo '<a href="/admin/index.php?module=modules&page=partners&website='.$website_id.'"><button type="button" class="btn btn-xs btn-info"><i class="fa fa-edit"></i> Edit Partners</button></a>';
                echo "</td><tr>";
              }
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Websites</th>
              <th>Links Out</th>
              <th>Links In</th>
              <th></th>
            </tr>
            </tfoot>
          </table>
        </div>
      </div>
    </div>
    <?php
    if (isset($_GET['website'])) {
      $website=$_GET['website'];
      echo '<div class="col-xs-8"><div class="box"><div class="box-body">';
      echo '<table id="example2" class="table table-bordered table-hover"><thead><tr>';
      echo '<th>Texte</th>';
      echo '<th>Title</th>';
      echo '<th>Url</th>';
      echo '<th>Lang</th>';
      echo '<th>Status</th>';
      echo '<th></th>';
      echo '</tr></thead><tbody>';
      $sql_select_links = "SELECT * from partners where website_id = '$website'";
      $req_select_links = mysql_query($sql_select_links) or die('<br>Erreur SQL !<br>'.$sql_select_links.'<br>'.mysql_error());
      while ($select_links = mysql_fetch_assoc($req_select_links)) {
        $partner_id = $select_links['id'];
        $partner_txt = $select_links['link_text'];
        $partner_title = $select_links['link_title'];
        $partner_url = $select_links['link_url'];
        $partner_lang = $select_links['lang'];
        $partner_status = $select_links['active'];
        echo "<tr><td>";
        echo $partner_txt;
        echo "</td><td>";
        echo $partner_title;
        echo "</td><td>";
        echo $partner_url;
        echo "</td><td>";
        echo $partner_lang;
        echo "</td><td>";
        if ($partner_status == "1") {
          echo "<font color='green'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span></font>";
          echo "</td><td>";
          $desactivate_partner = "desactivatePartner('".$partner_id."')";
          echo '<button type="button" class="btn btn-xs btn-warning" onclick="'.$desactivate_partner.'"><i class="fa fa-ban"></i> Desactivate</button>';
        } else {
          echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
          echo "</td><td>";
          $activate_partner = "activatePartner('".$partner_id."')";
          echo '<button type="button" class="btn btn-xs btn-success" onclick="'.$activate_partner.'"><i class="fa fa-check"></i> Activate</button>';
        }
        echo "</td><tr>";
      }
      echo '</tbody><tfoot><tr>';
      echo '<th>Texte</th>';
      echo '<th>Title</th>';
      echo '<th>Url</th>';
      echo '<th>Lang</th>';
      echo '<th>Status</th>';
      echo '<th></th>';
      echo '</tr></tfoot></table>';
      echo '</div></div></div></div>';
      echo '<div class="row"><div class="col-xs-12">';
      echo '<div class="box box-primary">';
      echo '<div class="box-header with-border">';
      echo '<h3 class="box-title">Add new partner link</h3>';
      echo '</div>';
      echo '<form role="form" name="addPartner" action ="" method="GET">';
      echo '<div class="box-body">';
      echo '<div class="form-group">';
      echo '<label for="partner_text">Link Text</label>';
      echo '<input type="text" class="form-control" id="partner_text" placeholder="Enter text link"></div>';
      echo '<div class="form-group">';
      echo '<label for="partner_title">Link title</label>';
      echo '<input type="text" class="form-control" id="partner_title" placeholder="Link title"></div>';
      echo '<div class="form-group">';
      echo '<label for="partner_url">Link url</label>';
      echo '<input type="text" class="form-control" id="partner_url" placeholder="Url"></div>';
      echo '<div class="form-group">';
      echo '<label for="partner_lang">Lang</label>';
      echo '<select id="partner_lang" class="form-control">';
      echo '<option>fr</option><option>en</option>';
      echo '</select></div>';
      echo '<input type="hidden" class="form-control" id="partner_website_id" value="'.$website.'">';
      echo '<div class="checkbox"><label>';
      echo '<input type="checkbox" id="partner_status"> Active partner link</label></div></div>';
      echo '<div class="box-footer">';
      echo '<button type="button" class="btn btn-primary" onclick="addPartner(this.form)">Add partner link</button>';
      echo '</div></form>';
      echo '</div></div>';
    } ?>
</section>
