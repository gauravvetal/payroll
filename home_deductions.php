<?php
  include("auth.php"); //include auth.php file on all secure pages
  include("add_employee.php");
?>

<?php

  $conn = mysqli_connect('localhost', 'root', 'MySQL@123#');
  if (!$conn)
  {
    die("Database Connection Failed" . mysqli_error());
  }

  $select_db = mysqli_select_db($conn,'payroll');
  if (!$select_db)
  {
    die("Database Selection Failed" . mysqli_error());
  }

  $query  = mysqli_query($conn,"SELECT * from deductions");
  while($row=mysqli_fetch_array($query))
  {
    $id           = $row['deduction_id'];
    $med_alw   = $row['philhealth'];
    $ed_alw          = $row['bir'];
    $mealc         = $row['gsis'];
    $lta         = $row['pag_ibig'];
    $hra        = $row['loans'];

    $total        = $med_alw + $ed_alw + $mealc + $lta + $hra;
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title></title>

    <script>
      <!--
        var ScrollMsg= "Payroll and Management System - "
        var CharacterPosition=0;
        function StartScrolling() {
        document.title=ScrollMsg.substring(CharacterPosition,ScrollMsg.length)+
        ScrollMsg.substring(0, CharacterPosition);
        CharacterPosition++;
        if(CharacterPosition > ScrollMsg.length) CharacterPosition=0;
        window.setTimeout("StartScrolling()",150); }
        StartScrolling();
      // -->
    </script>

    <link href="assets/must.png" rel="shortcut icon">
    <link href="assets/css/justified-nav.css" rel="stylesheet">


    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="data:text/css;charset=utf-8," data-href="assets/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet"> -->
    <!-- <link href="assets/css/docs.min.css" rel="stylesheet"> -->
    <link href="assets/css/search.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="assets/css/styles.css" /> -->
    <link rel="stylesheet" type="text/css" href="assets/css/dataTables.min.css">

  </head>
  <body>

    <div class="container">
      <div class="masthead">
        <h3>
          <b><a href="index.php">Payroll and Management System</a></b>
            <a data-toggle="modal" href="#colins" class="pull-right"><b>Admin</b></a>
        </h3>
        <nav>
          <ul class="nav nav-justified">
            <li>
              <a href="home_employee.php">Employee</a>
            </li>
            <li class="active">
              <a data-toggle="modal" href="#deductions">Deductions</a>
            </li>
            <li>
              <a href="home_salary.php">Income</a>
            </li>
          </ul>
        </nav>
      </div><br><br>

              <form class="form-horizontal" action="#" name="form">
                <div class="form-group">
                  <label class="col-sm-5 control-label"> Medical Allowances  :</label>
                  <div class="col-sm-4">
                    <?php echo $med_alw; ?>.00
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label">Education Allowances :</label>
                  <div class="col-sm-4">
                    <?php echo $ed_alw; ?>.00
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label">Meal Coupon  :</label>
                  <div class="col-sm-4">
                    <?php echo $mealc; ?>.00
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label">LTA  :</label>
                  <div class="col-sm-4">
                    <?php echo $lta; ?>.00
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-5 control-label">HRA :</label>
                  <div class="col-sm-4">
                    <?php echo $hra; ?>.00
                  </div>
                </div><br><br>
                <div class="form-group">
                  <label class="col-sm-5 control-label">Total Deductions :</label>
                  <div class="col-sm-4">
                    <?php echo $total; ?>.00
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-5 control-label"><button type="button" data-toggle="modal" data-target="#deductions" class="btn btn-danger">Update</button></label>
                </div>
              </form>

      <!-- this modal is for update an DEDUCTIONS -->
      <div class="modal fade" id="deductions" role="dialog">
        <div class="modal-dialog">
        
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center"><b>Deduction</b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">

              <form class="form-horizontal" action="add_deductions.php" name="form" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label"> Medical Allowances</label>
                  <div class="col-sm-8">
                    <input type="text" name="philhealth" class="form-control" required="required" value="<?php echo $med_alw; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Education Allowances</label>
                  <div class="col-sm-8">
                    <input type="text" name="bir" class="form-control" value="<?php echo $ed_alw; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">Meal Coupon</label>
                  <div class="col-sm-8">
                    <input type="text" name="gsis" class="form-control" value="<?php echo $mealc; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">LTA</label>
                  <div class="col-sm-8">
                    <input type="text" name="pag_ibig" class="form-control" value="<?php echo $lta; ?>" required="required">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-4 control-label">HRA</label>
                  <div class="col-sm-8">
                    <input type="text" name="loans" class="form-control" value="<?php echo $hra; ?>" required="required">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-4 control-label"></label>
                  <div class="col-sm-8">
                    <input type="submit" name="submit" class="btn btn-success" value="Submit">
                  </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>

      <!-- this modal is for my Colins -->
      <div class="modal fade" id="colins" role="dialog">
        <div class="modal-dialog modal-sm">
              
          <!-- Modal content-->
          <div class="modal-content">
            <div class="modal-header" style="padding:20px 50px;">
              <button type="button" class="close" data-dismiss="modal" title="Close">&times;</button>
              <h3 align="center">You are logged in as <b><?php echo $_SESSION['username']; ?></b></h3>
            </div>
            <div class="modal-body" style="padding:40px 50px;">
              <div align="center">
                <a href="logout.php" class="btn btn-block btn-danger">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/docs.min.js"></script> -->
    <script src="assets/js/search.js"></script>
    <script type="text/javascript" charset="utf-8" language="javascript" src="assets/js/dataTables.min.js"></script>

    <!-- FOR DataTable -->
    <script>
      {
        $(document).ready(function()
        {
          $('#myTable').DataTable();
        });
      }
    </script>

    <!-- this function is for modal -->
    <script>
      $(document).ready(function()
      {
        $("#myBtn").click(function()
        {
          $("#myModal").modal();
        });
      });
    </script>

  </body>
</html>