  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Administration</a></li>
      <li class="active">Websites</li>
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
                <th>id</th>
                <th>Name</th>
                <th>Url</th>
                <th>Owner</th>
                <th>Status</th>
              </tr>
              </thead>
              <tbody>
<?php
                $sql_select_websites = "SELECT users.*,websites.* FROM users,websites where users.id = websites.owner";
              	$req_select_websites = mysql_query($sql_select_websites) or die('<br>Erreur SQL !<br>'.$sql_select_websites.'<br>'.mysql_error());
                while ($row_website = mysql_fetch_assoc($req_select_websites))
                  $websiteinfo[] = $row_website;
                  foreach ($websiteinfo as $website) {
                  $website_id = $website['id'];
                  $website_name = $website['name'];
                  $website_url = $website['url'];
                  $website_status = $website['active'];
                  $owner_firstname = $website['firstname'];
                  $owner_lastname = $website['lastname'];
                  echo "<tr><td>";
                  echo $website_id;
                  echo "</td><td>";
                  echo $website_name;
                  echo "</td><td>";
                  echo "<a href='".$website_url."' target='_blank'>".$website_url."</a>";
                  echo "</td><td>";
                  echo "".$owner_firstname." ".$owner_lastname."";
                  echo "</td><td>";
                  if ($website_status = "1") {
                    echo "<font color='green'>On</font>";
                  } else if ($website_status = "0") {
                    echo "<font color='red'>Off</font>";
                  }
                  echo "</td></tr>";
                }
?>
              </tbody>
              <tfoot>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Url</th>
                <th>Owner</th>
                <th>Status</th>
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
