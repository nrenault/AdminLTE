<script type="text/javascript">

function confirmDeleteModal(id){
  $('#deleteModal').modal();
$('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData('+id+')">Delete</a>');
}
function deleteData(id){
// do your stuffs with id
$("#successMessage").html("Record With id "+id+" Deleted successfully!");
$('#deleteModal').modal('hide'); // now close modal
}
</script>
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Tables
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">E-Commerce</a></li>
    <li class="active">Categories</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div id='deleteModal' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
              <h4 class='modal-title'>Delete </h4>
            </div>
            <div class='modal-body'>
              <p>Do You Really Want to Delete This ?</p>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                  <span id= 'deleteButton'></span>
              </div>
          </div>
        </div>
      </div>
      <div class="box">
        <!-- <div class="box-header">
          <h3 class="box-title">Hover Data Table</h3>
        </div> -->
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Lang</th>
              <th>Products</th>
              <th>Status</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              <?php
              $sql_select_nodes = "SELECT nodes.id,nodes.name,nodes.lang,nodes.active,products_fr.node_id,COUNT(*) as products FROM nodes left join products_fr ON products_fr.node_id = nodes.id GROUP BY products_fr.node_id ORDER by COUNT(*) desc";
              $req_select_nodes = mysql_query($sql_select_nodes) or die('<br>Erreur SQL !<br>'.$sql_select_nodes.'<br>'.mysql_error());
              while ($node = mysql_fetch_assoc($req_select_nodes)) {
                  $node_id = $node['id'];
                  $node_name = $node['name'];
                  $node_lang = $node['lang'];
                  $node_products = $node['products'];
                  $node_status = $node['active'];
                  echo "<tr><td>";
                  echo $node_id;
                  echo "</td><td>";
                  echo $node_name;
                  echo "</td><td>";
                  echo $node_lang;
                  echo "</td><td>";
                  echo $node_products - 1;
                  echo "</td><td>";
                  if ($node_status = "1") {
                    echo "<font color='green'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    echo "<button type='button' class='btn btn-xs btn-warning'><i class='fa fa-ban'></i> Desactivate</button>";
                  } else {
                    echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    echo "<button type='button' class='btn btn-xs btn-success'><i class='fa fa-check'></i> Activate</button>";
                  }
                  $confirm_delete = "confirmDeleteModal('".$node_id."')";
                  echo "&nbsp;&nbsp;";
                  // echo "<form method='POST' action='http://example.com/admin/user/delete/12' accept-charset='UTF-8' style='display:inline'>";
                  // echo "<button class='btn btn-xs btn-danger' type='button' data-toggle='modal' data-target='#confirmDelete' data-title='Delete User' data-message='Are you sure you want to delete this user ?'>";
                  // echo "<i class='glyphicon glyphicon-trash'></i> Delete";
                  // echo "</button></form>";

                  // echo "<button class='btn btn-default' data-href=''/delete.php?id=54' data-toggle='modal' data-target='#confirm-delete'>Delete record #54</button>";
                  // echo "<script>$('[data-toggle='confirmation']').confirmation({ href: function(elem){ return $(elem).attr('href'); } });</script><a data-href='http://google.com' class='btn' data-toggle='confirmation'>Confirmation</a>";
                  echo '<button type="button" class="btn btn-xs btn-danger" onclick="'.$confirm_delete.'"><i class="glyphicon glyphicon-remove"></i> Delete</button><br><div id="successMessage" style="font-size:20px;color:green;font-weight:bold;"></div>';
                  // echo "<button type='button' class='btn btn-xs btn-danger' type='submit' data-toggle='modal' data-target='#confirmDelete' data-title='Delete User' data-message='Are you sure you want to delete this user ?'><i class='fa fa-remove'></i> Remove</button>";
                  echo "</td><tr>";
              }
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Lang</th>
              <th>Products</th>
              <th>Status</th>
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
      <div class="col-xs-3">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Add new category</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form">
            <div class="box-body">
              <div class="form-group">
                <label for="cat_id">ID</label>
                <input type="number" class="form-control" id="cat_id" placeholder="Enter Node ID">
              </div>
              <div class="form-group">
                <label for="cat_name">Name</label>
                <input type="text" class="form-control" id="cat_name" placeholder="Category Name">
              </div>
              <div class="form-group">
                <label for="cat_lang">Lang</label>
                <select id="cat_lang" class="form-control">
                  <option>fr</option>
                  <option>en</option>
                </select>
              </div>
              <div class="checkbox">
                <label>
                  <input type="checkbox" id="cat_status"> Active Category
                </label>
              </div>
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
          </form>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
