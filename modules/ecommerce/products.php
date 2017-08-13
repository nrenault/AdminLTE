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
            <h3 class="box-title">Add new product/h3>
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
