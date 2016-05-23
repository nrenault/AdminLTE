<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Tables
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Users</a></li>
    <li class="active">Manage</li>
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
              <th>First name</th>
              <th>Last name</th>
              <th>Nickname</th>
              <th>email</th>
              <th>admin</th>
              <th>status</th>
            </tr>
            </thead>
            <tbody>
<?php
              $sql_select_users = "SELECT * FROM users";
              $req_select_users = mysql_query($sql_select_users) or die('<br>Erreur SQL !<br>'.$sql_select_users.'<br>'.mysql_error());
              while ($users = mysql_fetch_assoc($req_select_users)) {
              	 $user_id = $users['id'];
                $user_firstname = $users['firstname'];
					 $user_lastname = $users['lastname'];
					 $user_nickname = $users['nickname'];
                $user_email = $users['email'];
                $user_admin = $users['admin'];
                $user_status = $users['active'];
                echo "<tr><td>";
                echo $user_id;
                echo "</td><td>";
                echo $user_firstname;
                echo "</td><td>";
                echo $user_lastname;
                echo "</td><td>";
                echo $user_nickname;
                echo "</td><td>";
                echo $user_email;
                echo "</td><td>";
                if ($user_admin = "1") {
                    echo "<font color='green'>Yes</font>";
                  } else if ($user_admin = "0") {
                    echo "<font color='red'>No</font>";
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
              <th>First name</th>
              <th>Last name</th>
              <th>Nickname</th>
              <th>email</th>
              <th>admin</th>
              <th>status</th>
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
