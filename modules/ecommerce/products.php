<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>Categories</h1><br><div id="successMessage" style="font-size:15px;color:green;font-weight:bold;"></div>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">E-Commerce</a></li>
    <li class="active">Categories</li>
  </ol>
</section>
<!-- Main content -->
<section class="content">
  <div class="row">
      <div class="col-xs-3">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Add new product</h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form role="form" name="addcat" action ="" method="GET">
            <div class="box-body">
              <div class="form-group">
                <label for="product_asin">ASIN</label>
                <input type="number" class="form-control" id="product_asin" placeholder="Enter Product ASIN">
              </div>
              <!-- <div class="form-group">
                <label for="cat_name">Name</label>
                <input type="text" class="form-control" id="cat_name" placeholder="Category Name">
              </div> -->
              <div class="form-group">
                <label for="product_node">Category</label>
                <select id="product_node" class="form-control">
                  <?php
                  $sql_select_nodes = "SELECT * FROM `nodes` where active = '1';";
                  $req_select_nodes = mysql_query($sql_select_nodes) or die('<br>Erreur SQL !<br>'.$sql_select_nodes.'<br>'.mysql_error());
                  while ($node = mysql_fetch_assoc($req_select_nodes)) {
                    $node_id = $node['id'];
                    $node_name = $node['name'];
                    echo "<tr><td>";
                    echo "<option>".$node_name." (".$node_id.")</option>";
                    echo "</td><td>";
                    }
                  ?>
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
