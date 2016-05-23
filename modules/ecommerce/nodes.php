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
    <div class="col-xs-4">
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
                    echo "<font color='green'>On</font>";
                  } else if ($node_status = "0") {
                    echo "<font color='red'>Off</font>";
                  }
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