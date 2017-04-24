<script type="text/javascript">
function desactivateBrand(id){
$.ajax(
{
       type: "GET",
       url: "/admin/modules/desactivate.php?module=brands&id="+id+"",
       success: function()
       {
        parent.fadeOut('slow', function() {$(this).remove();});
       }
 });
setTimeout(function() { location.reload(); }, 0500);
}
function activateBrand(id){
$.ajax(
{
       type: "GET",
       url: "/admin/modules/activate.php?module=brands&id="+id+"",
       success: function()
       {
        parent.fadeOut('slow', function() {$(this).remove();});
       }
 });
setTimeout(function() { location.reload(); }, 0500);
}
function createBrand(name){
$.ajax(
{
       type: "GET",
       url: "/admin/modules/add.php?module=brands&name="+name+"",
       success: function()
       {
        parent.fadeOut('slow', function() {$(this).remove();});
       }
 });
setTimeout(function() { location.reload(); }, 0500);
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
  <h1>Brands</h1>
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
      <div class="box">
        <!-- <div class="box-header">
          <h3 class="box-title">Hover Data Table</h3>
        </div> -->
        <!-- /.box-header -->
        <div class="box-body">
          <?php
          if($dossier = opendir('images/brands/')) {
            while(false !== ($fichier = readdir($dossier))) {
              if($fichier != '.' && $fichier != '..' && $fichier != 'index.php') {
                echo $fichier;
                echo "<br>";
              }
            }
          closedir($dossier);
          }

          ?>
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Img</th>
              <th>Products</th>
              <th>Status</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              <?php
              $sql_select_brands = "SELECT brand,COUNT(*) as count FROM products_fr where brand != '' GROUP BY brand ORDER by COUNT(*) desc limit 0,50";
              $req_select_brands = mysql_query($sql_select_brands) or die('<br>Erreur SQL !<br>'.$sql_select_brands.'<br>'.mysql_error());
              while ($row_brands = mysql_fetch_assoc($req_select_brands)) {
                  $brand = $row_brands['brand'];
                  $count = $row_brands['count'];
                  $sql_select_brands_infos = "SELECT * from brands where name = '$brand'";
                  $req_select_brands_infos = mysql_query($sql_select_brands_infos) or die('<br>Erreur SQL !<br>'.$sql_select_brands_infos.'<br>'.mysql_error());
                  if (mysql_num_rows($req_select_brands_infos)) {
                    $brands_img = mysql_fetch_array($req_select_brands_infos);
                    $brand_id = $brands_img['id'];
                    $brand_img = $brands_img['img'];
                    $brand_status = $brands_img['active'];
                  } else {
                    $brand_id = '';
                    $brand_img = '';
                    $brand_status = '';
                  }
                  echo "<tr><td>";
                  echo $brand_id;
                  echo "</td><td>";
                  echo $brand;
                  echo "</td><td>";
                  echo $brand_img;
                  echo "</td><td>";
                  echo $count;
                  echo "</td><td align='center'>";
                  if ($brand_status == "1") {
                    echo "<font color='green'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    $confirm_desactivate = "desactivateBrand('".$brand_id."')";
                    echo '<button type="button" class="btn btn-xs btn-warning" onclick="'.$confirm_desactivate.'"><i class="fa fa-ban"></i> Desactivate</button>';
                  } else if ($brand_status == "0") {
                    echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    $confirm_activate = "activateBrand('".$brand_id."')";
                    echo '<button type="button" class="btn btn-xs btn-success" onclick="'.$confirm_activate.'"><i class="fa fa-check"></i> Activate</button>';
                  } else if ($brand_status == "") {
                    echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    $confirm_create = "createBrand('".$brand."')";
                    echo '<button type="button" class="btn btn-xs btn-primary" onclick="'.$confirm_create.'"><i class="fa fa-plus-square"></i> Create</button>';
                  }
                  // $confirm_delete = "confirmDeleteModal('".$brand_id."')";
                  // echo "&nbsp;&nbsp;";
                  // echo '<button type="button" class="btn btn-xs btn-danger" onclick="'.$confirm_delete.'"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
                  echo "</td><tr>";
              }
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Img</th>
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
    <div class="col-xs-6">
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
              <th>Products</th>
              <th>Status</th>
              <th></th>
            </tr>
            </thead>
            <tbody>
              <?php
              $sql_select_brands = "SELECT brand,COUNT(*) as count FROM products_fr where brand != '' GROUP BY brand ORDER by COUNT(*) desc limit 50,50";
              $req_select_brands = mysql_query($sql_select_brands) or die('<br>Erreur SQL !<br>'.$sql_select_brands.'<br>'.mysql_error());
              while ($row_brands = mysql_fetch_assoc($req_select_brands)) {
                  $brand = $row_brands['brand'];
                  $count = $row_brands['count'];
                  $sql_select_brands_infos = "SELECT * from brands where name = '$brand'";
                  $req_select_brands_infos = mysql_query($sql_select_brands_infos) or die('<br>Erreur SQL !<br>'.$sql_select_brands_infos.'<br>'.mysql_error());
                  if (mysql_num_rows($req_select_brands_infos)) {
                    $brands_img = mysql_fetch_array($req_select_brands_infos);
                    $brand_id = $brands_img['id'];
                    $brand_img = $brands_img['img'];
                    $brand_status = $brands_img['active'];
                  } else {
                    $brand_id = '';
                    $brand_img = '';
                    $brand_status = '';
                  }
                  echo "<tr><td>";
                  echo $brand_id;
                  echo "</td><td>";
                  echo $brand;
                  echo "</td><td>";
                  echo $brand_img;
                  echo "</td><td>";
                  echo $count;
                  echo "</td><td align='center'>";
                  if ($brand_status == "1") {
                    echo "<font color='green'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    $confirm_desactivate = "desactivateBrand('".$brand_id."')";
                    echo '<button type="button" class="btn btn-xs btn-warning" onclick="'.$confirm_desactivate.'"><i class="fa fa-ban"></i> Desactivate</button>';
                  } else if ($brand_status == "0") {
                    echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    $confirm_activate = "activateBrand('".$brand_id."')";
                    echo '<button type="button" class="btn btn-xs btn-success" onclick="'.$confirm_activate.'"><i class="fa fa-check"></i> Activate</button>';
                  } else if ($brand_status == "") {
                    echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                    echo "</td><td>";
                    $confirm_create = "createBrand('".$brand."')";
                    echo '<button type="button" class="btn btn-xs btn-primary" onclick="'.$confirm_create.'"><i class="fa fa-plus-square"></i> Create</button>';
                  }
                  // $confirm_delete = "confirmDeleteModal('".$brand_id."')";
                  // echo "&nbsp;&nbsp;";
                  // echo '<button type="button" class="btn btn-xs btn-danger" onclick="'.$confirm_delete.'"><i class="glyphicon glyphicon-remove"></i> Delete</button>';
                  echo "</td><tr>";
              }
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>id</th>
              <th>Name</th>
              <th>Img</th>
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
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
