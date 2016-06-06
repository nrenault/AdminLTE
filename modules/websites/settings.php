<script>
function addwebsite(form) {
    //TestVar =form.inputbox.value;
    name =form.website_name.value;
    url =form.website_url.value;
    owner =form.website_owner.value;
    nodeid =form.website_nodeid.value;
    nodeid2 =form.website_nodeid2.value;
    nodeid3 =form.website_nodeid3.value;
    nodeid4 =form.website_nodeid4.value;
    status =form.website_status.value;
    $.ajax(
    {
           type: "GET",
           url: "/admin/modules/add.php?module=websites&url="+url+"&name="+name+"&owner="+owner+"&nodeid="+nodeid+"&nodeid2="+nodeid2+"&nodeid3="+nodeid3+"&nodeid4="+nodeid4+"&status="+status+"",
           success: function()
           {
            parent.fadeOut('slow', function() {$(this).remove();});
           }
     });
     setTimeout(function() { location.reload(); }, 3000);
}
</script>
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
    <div class="col-xs-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Add new website</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" name="addwebsite" action ="" method="GET">
          <div class="box-body">
            <div class="form-group">
              <label for="website_name">Name</label>
              <input type="text" class="form-control" id="website_name" placeholder="Website Name">
            </div>
            <div class="form-group">
              <label for="website_url">URL</label>
              <input type="text" class="form-control" id="website_url" placeholder="Enter Website URL">
            </div>
            <div class="form-group">
              <label for="website_nodeid">node_id</label>
              <input type="number" class="form-control" id="website_nodeid" placeholder="Enter Website node_id">
            </div>
            <div class="form-group">
              <label for="website_nodeid2">node_id2</label>
              <input type="number" class="form-control" id="website_nodeid2" placeholder="Enter Website node_id2">
            </div>
            <div class="form-group">
              <label for="website_nodeid3">node_id3</label>
              <input type="number" class="form-control" id="website_nodeid2" placeholder="Enter Website node_id3">
            </div>
            <div class="form-group">
              <label for="website_nodeid4">node_id4</label>
              <input type="number" class="form-control" id="website_nodeid4" placeholder="Enter Website node_id4">
            </div>
            <div class="form-group">
              <label for="website_owner">Owner</label>
              <select id="website_owner" class="form-control">
                <?php
                $sql_select_users = "SELECT * FROM users";
                $req_select_users = mysql_query($sql_select_users) or die('<br>Erreur SQL !<br>'.$sql_select_users.'<br>'.mysql_error());
                while ($user = mysql_fetch_assoc($req_select_users)) {
                  $user_id = $user['id'];
                  $user_firstname = $user['firstname'];
                  $user_lastname = $user['lastname'];
                  echo '<option value="'.$user_id.'">'.$user_firstname.' '.$user_lastname.'</option>';
                }
                ?>
              </select>
            </div>
            <div class="checkbox">
              <label>
                <input type="checkbox" id="website_status"> Active Website
              </label>
            </div>
          </div>
          <!-- /.box-body -->

          <div class="box-footer">
            <button type="button" class="btn btn-primary" onclick="addwebsite(this.form)">Add Website</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
  </div>
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
