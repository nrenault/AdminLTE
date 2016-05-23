<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Tables
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Modules</a></li>
    <li class="active">Default</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Hover Data Table</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Websites</th>
              <th>Error</th>
              <th>Contact</th>
              <th>Search</th>
              <th>Legal</th>
            </tr>
            </thead>
            <tbody>
<?php
              $sql_select_websites = "SELECT * FROM `websites`;";
              $req_select_websites = mysql_query($sql_select_websites) or die('<br>Erreur SQL !<br>'.$sql_select_websites.'<br>'.mysql_error());
              // $sql_select_websites = "SELECT users.*,websites.* FROM users,websites where users.id = websites.owner";
              // $req_select_websites = mysql_query($sql_select_websites) or die('<br>Erreur SQL !<br>'.$sql_select_websites.'<br>'.mysql_error());
              while ($website = mysql_fetch_assoc($req_select_websites)) {
                //$websiteinfo[] = $row_website;
                //foreach ($websiteinfo as $website) {
                $website_id = $website['id'];
                $website_name = $website['name'];
                echo "<tr><td>";
                echo $website_name;
                echo "</td><td>";
                $sql_select_module_error = "SELECT * from modules where website_id = '$website_id' and name = 'error' ";
                $req_select_module_error = mysql_query($sql_select_module_error) or die('<br>Erreur SQL !<br>'.$sql_select_module_error.'<br>'.mysql_error());
                while ($module_error = mysql_fetch_assoc($req_select_module_error)) {
                  $module_error_status = $module_error['active'];
                  if ($module_error_status = "1") {
                    echo "<font color='green'>On</font>";
                  } else if ($module_error_status = "0") {
                    echo "<font color='red'>Off</font>";
                  }
                }
                echo "</td><td>";
                $sql_select_module_contact = "SELECT * from modules where website_id = '$website_id' and name = 'contact' ";
                $req_select_module_contact = mysql_query($sql_select_module_contact) or die('<br>Erreur SQL !<br>'.$sql_select_module_contact.'<br>'.mysql_error());
                while ($module_contact= mysql_fetch_assoc($req_select_module_contact)) {
                  $module_contact_status = $module_contact['active'];
                  if ($module_contact_status = "1") {
                    echo "<font color='green'>On</font>";
                  } else if ($module_contact_status = "0") {
                    echo "<font color='red'>Off</font>";
                  }
                }
                echo "</td><td>";
                $sql_select_module_search = "SELECT * from modules where website_id = '$website_id' and name = 'search' ";
                $req_select_module_search = mysql_query($sql_select_module_search) or die('<br>Erreur SQL !<br>'.$sql_select_module_search.'<br>'.mysql_error());
                while ($module_search= mysql_fetch_assoc($req_select_module_search)) {
                  $module_search_status = $module_search['active'];
                  if ($module_search_status = "1") {
                    echo "<font color='green'>On</font>";
                  } else if ($module_search_status = "0") {
                    echo "<font color='red'>Off</font>";
                  }
                }
                echo "</td><td>";
                $sql_select_module_legal = "SELECT * from modules where website_id = '$website_id' and name = 'legal' ";
                $req_select_module_legal = mysql_query($sql_select_module_legal) or die('<br>Erreur SQL !<br>'.$sql_select_module_legal.'<br>'.mysql_error());
                while ($module_legal= mysql_fetch_assoc($req_select_module_legal)) {
                  $module_legal_status = $module_legal['active'];
                  if ($module_legal_status = "1") {
                    echo "<font color='green'>On</font>";
                  } else if ($module_legal_status = "0") {
                    echo "<font color='red'>Off</font>";
                  }
                }
                echo "</td><tr>";
              }
            //}
              //   echo "<a href='".$website_url."' target='_blank'>".$website_url."</a>";
              //   echo "</td><td>";
              //   echo "".$owner_firstname." ".$owner_lastname."";
              //   echo "</td><td>";
              //   if ($website_status = "1") {
              //     echo "<font color='green'>On</font>";
              //   } else if ($website_status = "0") {
              //     echo "<font color='red'>Off</font>";
              //   }
              //   echo "</td></tr>";
?>
            </tbody>
            <tfoot>
            <tr>
              <th>Websites</th>
              <th>Error</th>
              <th>Contact</th>
              <th>Search</th>
              <th>Legal</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
