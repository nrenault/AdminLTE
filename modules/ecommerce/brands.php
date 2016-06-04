<script type="text/javascript">
function confirmDesactivateModal(id){
$('#desactivateModal').modal();
$('#desactivateButton').html('<a class="btn btn-danger" onclick="desactivateData('+id+')">Desactivate</a>');
}
function desactivateData(id){
// do your stuffs with id
$.ajax(
{
       type: "GET",
       url: "/admin/modules/desactivate.php?module=nodes&id="+id+"",
       success: function()
       {
        parent.fadeOut('slow', function() {$(this).remove();});
       }
 });
$("#successMessage").html("Record With id "+id+" Desactivate successfully!");
$('#desactivateModal').modal('hide');
setTimeout(function() { location.reload(); }, 3000);
}
function confirmActivateModal(id){
$('#activateModal').modal();
$('#activateButton').html('<a class="btn btn-danger" onclick="activateData('+id+')">Activate</a>');
}
function activateData(id){
$.ajax(
{
       type: "GET",
       url: "/admin/modules/activate.php?module=nodes&id="+id+"",
       success: function()
       {
        parent.fadeOut('slow', function() {$(this).remove();});
       }
 });
$("#successMessage").html("Record With id "+id+" activate successfully!");
$('#activateModal').modal('hide');
setTimeout(function() { location.reload(); }, 3000);
}
function confirmDeleteModal(id){
$('#deleteModal').modal();
$('#deleteButton').html('<a class="btn btn-danger" onclick="deleteData('+id+')">Delete</a>');
}
function deleteData(id){
$.ajax(
{
       type: "GET",
       url: "/admin/modules/delete.php?module=nodes&id="+id+"",
       success: function()
       {
        parent.fadeOut('slow', function() {$(this).remove();});
       }
 });
$("#successMessage").html("Record With id "+id+" Deleted successfully!");
$('#deleteModal').modal('hide');
setTimeout(function() { location.reload(); }, 3000);
}
function addCat(form) {
    //TestVar =form.inputbox.value;
    id =form.cat_id.value;
    name =form.cat_name.value;
    lang =form.cat_lang.value;
    status =form.cat_status.value;
    $.ajax(
    {
           type: "GET",
           url: "/admin/modules/add.php?module=nodes&id="+id+"&name="+name+"&lang="+lang+"&status="+status+"",
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
  <h1>Categories</h1><br><div id="successMessage" style="font-size:15px;color:green;font-weight:bold;"></div>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">E-Commerce</a></li>
    <li class="active">Brands</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-6">
      <div id='desactivateModal' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
              <h4 class='modal-title'>Desactivate </h4>
            </div>
            <div class='modal-body'>
              <p>Do You Really Want to Desactivate This ?</p>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                  <span id= 'desactivateButton'></span>
              </div>
          </div>
        </div>
      </div>
      <div id='activateModal' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
          <div class='modal-content'>
            <div class='modal-header'>
              <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>×</button>
              <h4 class='modal-title'>Activate </h4>
            </div>
            <div class='modal-body'>
              <p>Do You Really Want to Activate This ?</p>
            </div>
            <div class='modal-footer'>
              <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>
                  <span id= 'activateButton'></span>
              </div>
          </div>
        </div>
      </div>
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
              <th>Img</th>
              <th>Status</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              <?php
              $sql_select_brands = "SELECT brand,COUNT(*) as count FROM products_fr GROUP BY brand ORDER by COUNT(*) desc";
              $req_select_brands = mysql_query($sql_select_brands) or die('<br>Erreur SQL !<br>'.$sql_select_brands.'<br>'.mysql_error());
              while ($row_brands = mysql_fetch_assoc($req_select_brands)) {
                  $brand = $row_brands['brand'];
                  $sql_select_brands_infos = "SELECT * from brands where name = '$brand'";
                  $req_select_brands_infos = mysql_query($sql_select_brands_img) or die('<br>Erreur SQL !<br>'.$sql_select_brands_img.'<br>'.mysql_error());
                  $brand_id = $brands['id'];
                  $brand_name = $brands['name'];
                  $brand_img = $brands['img'];
                  $brand_status = $brands['active'];
                  echo "<tr><td>";
                  echo $brand_id;
                  echo "</td><td>";
                  echo $brand_name;
                  echo "</td><td>";
                  echo $brand_img;
                  echo "</td><td align='center'>";
                  if ($brand_status == "1") {
                    echo "<font color='green'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    $confirm_desactivate = "confirmDesactivateModal('".$node_id."')";
                    echo '<button type="button" class="btn btn-xs btn-warning" onclick="'.$confirm_desactivate.'"><i class="fa fa-ban"></i> Desactivate</button>';
                  } else {
                    echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    $confirm_activate = "confirmActivateModal('".$node_id."')";
                    echo '<button type="button" class="btn btn-xs btn-success" onclick="'.$confirm_activate.'"><i class="fa fa-check"></i> Activate</button>';
                  }
                  $confirm_delete = "confirmDeleteModal('".$node_id."')";
                  echo "&nbsp;&nbsp;";
                  echo '<button type="button" class="btn btn-xs btn-danger" onclick="'.$confirm_delete.'"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
                  echo "</td><tr>";
              }
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Img</th>
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
          <form role="form" name="addcat" action ="" method="GET">
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
              <button type="button" class="btn btn-primary" onclick="addCat(this.form)">Add Category</button>
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
