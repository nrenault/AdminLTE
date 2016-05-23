  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Data Tables
      <small>advanced tables</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Administration</a></li>
      <li class="active">Websites</li>
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
                <th>id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Status</a>
              </tr>
              </thead>
              <tbody>
<?php
                $sql_select_users = "SELECT * FROM users";
              	$req_select_users = mysql_query($sql_select_users) or die('<br>Erreur SQL !<br>'.$sql_select_users.'<br>'.mysql_error());
                while ($row_user = mysql_fetch_assoc($req_select_users))
                  $userinfo[] = $row_user;
                  foreach ($userinfo as $user) {
                  $user_id = $user['id'];
                  $user_firstname = $user['firstname'];
                  $user_lastname = $user['lastname'];
                  $user_email = $user['email'];
                  $user_admin = $user['admin'];
                  $user_status = $user['active'];
                  echo "<tr><td>";
                  echo $user_id;
                  echo "</td><td>";
                  echo $user_firstname;
                  echo "</td><td>";
                  echo $user_lastname;
                  echo "</td><td>";
                  echo $user_email;
                  echo "</td><td>";
                  if ($user_admin = "1") {
                    echo "Yes";
                  } else if ($user_status = "0") {
                    echo "No";
                  }
                  echo "</td><td>";
                  if ($user_status = "1") {
                    echo "<font color='green'>On</font>";
                  } else if ($user_status = "0") {
                    echo "<font color='red'>Off</font>";
                  }
                  echo "</td></tr>";
                }
?>
              </tbody>
              <tfoot>
              <tr>
                <th>id</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Status</a>
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
