<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Websites
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Websites</a></li>
    <li class="active">Settings</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Url</th>
              <th>Owner</th>
              <th>node_id</th>
              <th>node_id2</th>
              <th>node_id3</th>
              <th>node_id4</th>
              <th align="center">Status</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
<?php
              $sql_select_websites = "SELECT users.*,websites.* FROM users,websites where users.id = websites.owner";
              $req_select_websites = mysql_query($sql_select_websites) or die('<br>Erreur SQL !<br>'.$sql_select_websites.'<br>'.mysql_error());
              while ($website = mysql_fetch_assoc($req_select_websites)) {
                $website_id = $website['id'];
                $website_name = $website['name'];
                $website_url = $website['url'];
                $website_node_id = $website['node_id'];
                $website_node_id2 = $website['node_id2'];
                $website_node_id3 = $website['node_id3'];
                $website_node_id4 = $website['node_id4'];
                $website_status = $website['active'];
                $owner_firstname = $website['firstname'];
                $owner_lastname = $website['lastname'];
                if ($website_status == "1") {
                  echo "<tr><td>";
                } else {
                  echo "<tr class='danger'><td>";
                }
                echo $website_id;
                echo "</td><td>";
                echo $website_name;
                echo "</td><td>";
                echo "<a href='".$website_url."' target='_blank'>".$website_url."</a>";
                echo "</td><td>";
                echo "".$owner_firstname." ".$owner_lastname."";
                echo "</td><td>";
                echo $website_node_id;
                echo "</td><td>";
                echo $website_node_id2;
                echo "</td><td>";
                echo $website_node_id3;
                echo "</td><td>";
                echo $website_node_id4;
                echo "</td><td align='center'>";
                if ($website_status == "1") {
                  echo "<font color='green'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span></font>";
                  echo "</td><td>";
                  $confirm_desactivate = "desactivateBrand('".$website_id."')";
                  echo '<button type="button" class="btn btn-xs btn-warning" onclick="'.$confirm_desactivate.'"><i class="fa fa-ban"></i> Desactivate</button>';
                } else if ($website_status == "0") {
                  echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                  echo "</td><td>";
                  $confirm_activate = "activateBrand('".$website_id."')";
                  echo '<button type="button" class="btn btn-xs btn-success" onclick="'.$confirm_activate.'"><i class="fa fa-check"></i> Activate</button>';
                }
                // $confirm_delete = "confirmDeleteModal('".$brand_id."')";
                // echo "&nbsp;&nbsp;";
                // echo '<button type="button" class="btn btn-xs btn-danger" onclick="'.$confirm_delete.'"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
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
              <th>node_id</th>
              <th>node_id2</th>
              <th>node_id3</th>
              <th>node_id4</th>
              <th align="center">Status</th>
              <th></th>
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
