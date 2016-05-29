<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Partners
    <?php if (isset($_GET['website'])) {
      $sql_select_website_name = "SELECT name FROM `websites`;";
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
        <!-- <div class="box-header">
          <h3 class="box-title">Hover Data Table</h3>
        </div> -->
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
              // $sql_select_websites = "SELECT users.*,websites.* FROM users,websites where users.id = websites.owner";
              // $req_select_websites = mysql_query($sql_select_websites) or die('<br>Erreur SQL !<br>'.$sql_select_websites.'<br>'.mysql_error());
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
                $edit_partners = "confirmEditModal('".$website_id."')";
                echo '<button type="button" class="btn btn-xs btn-info" onclick="'.$edit_partners.'"><i class="fa fa-edit"></i> Edit Partners</button>';
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
        echo $partner_status;
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
      echo '</div></div>';
    } ?>
</section>
