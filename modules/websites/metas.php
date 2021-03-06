<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Tables
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Websites</a></li>
    <li class="active">Metas</li>
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
              <th>Website</th>
              <th>Title FR</th>
              <th>Description FR</th>
              <th>Title EN</th>
              <th>Description EN</th>
            </tr>
            </thead>
            <tbody>
<?php
              $sql_select_metas = "SELECT content_metas.*,websites.id,websites.name FROM content_metas,websites where content_metas.website_id = websites.id";
              $req_select_metas = mysql_query($sql_select_metas) or die('<br>Erreur SQL !<br>'.$sql_select_metas.'<br>'.mysql_error());
              while ($metas = mysql_fetch_assoc($req_select_metas)) {
                $metas_name = $metas['name'];
                $metas_title_fr = $metas['title_fr'];
                $metas_title_en = $metas['title_en'];
                $metas_description_fr = $metas['description_fr'];
                $metas_description_en = $metas['description_en'];
                echo "<tr><td>";
                echo $metas_name;
                echo "</td><td>";
                echo $metas_title_fr;
                echo "</td><td>";
                echo $metas_description_fr;
                echo "</td><td>";
                echo $metas_title_en;
                echo "</td><td>";
                echo $metas_description_en;
                echo "</td></tr>";
              }
?>
            </tbody>
            <tfoot>
            <tr>
              <th>Website</th>
              <th>Title FR</th>
              <th>Description FR</th>
              <th>Title EN</th>
              <th>Description EN</th>
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
