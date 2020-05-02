<?php
include("../action.php");
?>
<?php include("header.php"); ?>
<!--    Status of student -->

    <div class="container">
   <?php 
    if($_GET['found'] == 0){
        ?>
        <div class="card border-danger mb-3 mt-5 w-50"  style="min-width: 17rem;">
              <div class="card-body text-dark ">
              <h4>Student not found.</h4>
              <h4>Please enter valid information.</h4>
    </div>
 </div>
   
    <?php
    }
    else{
        if($_GET['status']==1){?> 
        <div class="card border-success mb-3 mt-5 w-50"  style="min-width: 17rem;">
        <div class="card-header bg-success border-success"><h4>Status: Present</h4></div>
    <?php } else {?>
    
    <div class="card border-danger mb-3 mt-5 w-50"  style="min-width: 17rem;">
    <div class="card-header bg-danger border-danger"><h4>Status: Absent</h4></div>
    <?php }?>
    <h5 class="mt-3">Date: <?php date_default_timezone_set('Asia/Kolkata'); echo date('d-m-y',time()); ?></h5>
    
  <?php 
    $query = "SELECT `image` FROM `student` WHERE class= '".mysqli_real_escape_string($link,$_GET['class'])."' AND section= '".mysqli_real_escape_string($link,$_GET['section'])."' AND roll= '".mysqli_real_escape_string($link,$_GET['roll_no'])."'";
    $result = mysqli_query($link,$query);
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result);
        echo '<img  class="border border-dark mt-3 mb-3" id="student-image" src="data:image/jpg;base64,'.base64_encode($row['image']).'"/>';
    }else{
        $status = 2;
    }
    ?>
    <h4>Name: <?php echo $_GET['first_name']." ".$_GET['last_name'];?></h4>
    <h4>Roll_No: <?php echo $_GET['roll_no']; ?></h4>
    <h4>Class: <?php echo $_GET['class']." ".strtoupper($_GET['section']); ?></h4>
    <?php }
    ?>
    <br>
    
    <form method="get" action="../action.php">
        <input type="hidden" name="class" value="<?php echo $_GET['class'];?>">
        <input type="hidden" name="section" value="<?php echo $_GET['section'];?>">
        <input type="hidden" name="roll_no" value="<?php echo $_GET['roll_no'];?>">
        <button type="submit" id="" class="btn btn-primary mt-4" value="" name="monthlyView" >Monthly View</button>
    </form>
    
    </div>
</div>    


<?php
include("footer.php");
?>