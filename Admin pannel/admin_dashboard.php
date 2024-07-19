<?php
  include('header.php');
  if(isset($_SESSION['email'])){
  include('../includes/connection.php');
  if(isset($_POST['submit_attendance'])){
    if($_POST['food_type'] == 'Breakfast'){
      $query = "insert into attendance1(sno,id,attendance) values(null,$_POST[id],'$_POST[attendance]')";
    }
    elseif($_POST['food_type'] == 'Lunch'){
      $query = "insert into attendance2(sno,id,attendance) values(null,$_POST[id],'$_POST[attendance]')";
    }
    elseif($_POST['food_type'] == 'Snacks'){
      $query = "insert into attendance3(sno,id,attendance) values(null,$_POST[id],'$_POST[attendance]')";
    }
    else{
      $query = "insert into attendance4(sno,id,attendance) values(null,$_POST[id],'$_POST[attendance]')";
    }
    $query_run = mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
        alert('Attendance submitted successfully...');
        window.location.href = 'admin_dashboard.php';
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
        alert('Failed...Plz try again.');
        window.location.href = 'admin_dashboard.php';
      </script>";
    }
  }


  if(isset($_POST['pay_fee'])){
    $query = "update users set fee_status = 1 where sno = $_POST[id]";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
      echo "<script type='text/javascript'>
        alert('Fee status updated successfully...');
        window.location.href = 'admin_dashboard.php';
      </script>";
    }
    else{
      echo "<script type='text/javascript'>
        alert('Failed...Plz try again.');
        window.location.href = 'admin_dashboard.php';
      </script>";
    }
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User Dashboard</title>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#view_users").click(function(){
          $("#action_div").load("view_users.php");
        });

        $("#edit_users").click(function(){
          $("#action_div").load("edit_users.php");
        });

        $("#pay_fees").click(function(){
          $("#action_div").load("payFee.php");
        });

        $("#view_fees_status").click(function(){
          $("#action_div").load("view_fee_status.php");
        });

        $("#edit_menu").click(function(){
          $("#action_div").load("edit_menu.php");
        });
      });
    </script>
  </head>
  <body style="background:yellow;">
    <br>
    <div class="row" style="margin-left:15px;margin-right:15px;">
     
    </div> <br><br>
    <div class="row" style="margin-left:15px;margin-right:15px;">
      <div class="col-md-8">
        <h3>Student Attendance For Each Meal</h3>
        <form action="" method="post">
          <div class="form-group">
            <label>Student ID No:</label>
            <input type="text" class="form-control" name="id" placeholder="Enter ID No.">
          </div>
          <div class="form-group">
            <label>Meal Type:</label>
            <select class="form-control" name="food_type">
              <option>-Select-</option>
              <option>Breakfast</option>
              <option>Lunch</option>
              <option>Snacks</option>
              <option>Dinner</option>
            </select>
          </div>
          <div class="form-group">
            <label>Attendance:</label>
            <select class="form-control" name="attendance">
              <option>-Select-</option>
              <option>Present</option>
              <option>Absent</option>
            </select><br>
            <div class="form-group">
              <input type="submit" class="form-control btn btn-primary" name="submit_attendance" value="Submit">
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-5">
        <h3>Admin</h3> <br>
        <button class="btn btn-block btn-primary" id="view_users">User Details</button> <br>
        <button class="btn btn-block btn-danger" id="edit_users">Delete user</button> <br>
        <button class="btn btn-block btn-success" id="edit_menu">Edit The Menu</button> <br>
        <button class="btn btn-block btn-info" id="pay_fees">Pay User's fees</button> <br>
        <button class="btn btn-block btn-primary" id="view_fees_status">View fees status of a Student</button>
      </div>
      <div class="col-md-7" style="background:whitesmoke;" id="action_div">

      </div>
    </div>
    <!-- Week Meal MODAL -->
    <div class="modal fade" id="meal_modal">
      <div class="modal-dialog">
        <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Full Week Menu</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <h4>Monday</h4>
        <p>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad. <br>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad.
        </p>
        <h4>Tuesday</h4>
        <p>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad. <br>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad.
        </p>
        <h4>Wednsday</h4>
        <p>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad. <br>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad.
        </p>
        <h4>Thrusday</h4>
        <p>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad. <br>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad.
        </p>
        <h4>Friday</h4>
        <p>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad. <br>
          <b>Breakfast: </b> Pohe, Milk, Egg <br>
          <b>Lunch:</b> Daal, Chapati, Mix vegetable and salad.
        </p>
      </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div>
  </body>
</html>
<?php }
else{
  header('location:../index.php');
}
