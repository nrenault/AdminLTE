<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Tables
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Ads</a></li>
    <li class="active">Adsense</li>
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
              <th>Right Menu</th>
              <th>Products</th>
              <th>Brands</th>
            </tr>
            </thead>
            <tbody>
              <?php
              $sql_select_active_websites = "SELECT id,name FROM websites";
              $req_select_active_websites = mysql_query($sql_select_active_websites) or die('<br>Erreur SQL !<br>'.$sql_select_active_websites.'<br>'.mysql_error());
              while ($active_websites = mysql_fetch_assoc($req_select_active_websites)) {
                $active_websites_id = $active_websites['id'];
                $active_websites_name = $active_websites['name'];
                echo "<tr><td>";
                echo $active_websites_name;
                echo "</td><td>";
                $sql_select_right_menu_ads = "SELECT active,code from ads where website_id = '$active_websites_id' and name = 'adsense' and position = 'right_menu_bottom'";
                $req_select_right_menu_ads = mysql_query($sql_select_right_menu_ads) or die('<br>Erreur SQL !<br>'.$sql_select_right_menu_ads.'<br>'.mysql_error());
                if (!mysql_num_rows($req_select_right_menu_ads)) {
                  echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                } else {
                  while ($right_menu_ads = mysql_fetch_assoc($req_select_right_menu_ads)) {
                    $right_menu_ads_active = $right_menu_ads['active'];
                    $right_menu_ads_code = $right_menu_ads['code'];
                    if ($right_menu_ads_active == '1') {
                      echo "<a href='#' data-toggle='tooltip' data-trigger='hover focus click' title='".$right_menu_ads_code."'><font color='green'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span></font></a>";
                    } else {
                      echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                    }
                  }
                }
                echo "</td><td>";
                $sql_select_products_ads = "SELECT active,code from ads where website_id = '$active_websites_id' and name = 'adsense' and position = 'products_bottom'";
                $req_select_products_ads = mysql_query($sql_select_products_ads) or die('<br>Erreur SQL !<br>'.$sql_select_products_ads.'<br>'.mysql_error());
                if (!mysql_num_rows($req_select_products_ads)) {
                  echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                } else {
                  while ($products_ads = mysql_fetch_assoc($req_select_products_ads)) {
                    $products_ads_active = $products_ads['active'];
                    $products_ads_code = $products_ads['code'];
                    if ($products_ads_active == '1') {
                      echo "<a href='#' data-toggle='tooltip' data-trigger='hover focus click' title='".$products_ads_code."'><font color='green'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span></font></a>";
                    } else {
                      echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                    }
                  }
                }
                echo "</td><td>";
                $sql_select_brands_ads = "SELECT active,code from ads where website_id = '$active_websites_id' and name = 'adsense' and position = 'brands_bottom'";
                $req_select_brands_ads = mysql_query($sql_select_brands_ads) or die('<br>Erreur SQL !<br>'.$sql_select_brands_ads.'<br>'.mysql_error());
                if (!mysql_num_rows($req_select_brands_ads)) {
                  echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                } else {
                  while ($brands_ads = mysql_fetch_assoc($req_select_brands_ads)) {
                    $brands_ads_active = $brands_ads['active'];
                    $brands_ads_code = $brands_ads['code'];
                    if ($brands_ads_active == '1') {
                      echo "<a href='#' data-toggle='tooltip' data-trigger='hover focus click' title='".$brands_ads_code."'><font color='green'><span class='glyphicon glyphicon-ok-circle' aria-hidden='true'></span></font></a>";
                    } else {
                      echo "<font color='red'><span class='glyphicon glyphicon-ban-circle' aria-hidden='true'></span></font>";
                    }
                  }
                }
                echo "</td></tr>";
              }
              ?>
            </tbody>
            <tfoot>
            <tr>
              <th>Website</th>
              <th>Right Menu</th>
              <th>Products</th>
              <th>Brands</th>
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
