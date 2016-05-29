<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Tables
    <small>advanced tables</small>
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
                echo "</td><td>";
                $edit_partners = "confirmEditModal('".$website_id."')";
                echo '<button type="button" class="btn btn-xs btn-info" onclick="'.$edit_partners.'"><i class="fa fa-edit"></i> Edit</button>';
                // $sql_select_module_legal = "SELECT * from modules where website_id = '$website_id' and name = 'legal' ";
                // $req_select_module_legal = mysql_query($sql_select_module_legal) or die('<br>Erreur SQL !<br>'.$sql_select_module_legal.'<br>'.mysql_error());
                // if (!mysql_num_rows($req_select_module_legal)) {
                //   echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                // } else {
                //   while ($module_legal= mysql_fetch_assoc($req_select_module_legal)) {
                //     $module_legal_status = $module_legal['active'];
                //     if ($module_legal_status = "1") {
                //       echo "<font color='green'><span class='glyphicon glyphicon-align-center glyphicon-ok-circle' aria-hidden='true'></span></font>";
                //     } else if ($module_legal_status = "0") {
                //       echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                //     }
                //   }
                // }
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
  </div>
</section>
