<?php
include("../action.php");
?>
<?php if($_SESSION['id']){
include("header.php"); ?>
    
    <div class="fillStatus">
        <h5>Date: <?php 
    date_default_timezone_set('Asia/Kolkata');
    echo date('d/m/y',time()); ?></h5>
        <h5>Class: <?php echo $_GET['class']." , "; ?> 
            Section: <?php echo strtoupper($_GET['section']); ?></h5>
    </div>
    
    <form  method="get" action="../action.php">
          <input type="hidden" name="class" value="<?php echo $_GET['class'];?>">
          <input type="hidden" name="section" value="<?php echo $_GET['section'];?>">
           <ol>
            <?php
    
    //writing checkboxes.
                $n = 1;
                $string2 = "";
                while($n <= 30){    
                    $string1 =  "<li> <input type='checkbox' name='check[]' value=".$n." "; 
                    $string3 = "></li>";
                    echo $string1.$string2.$string3;
                    $n++;
                }
               
               ?>
           </ol >       
           <div style="text-align: center;">
            <input class="submitView" type="submit" value="Submit" name="submitAttendance">
            </div>
        </form>
        
<?php }else{?>
<h1>Not Found</h1>
<p>The requested URL /fill.php was not found on this server.</p>
<?php }?>



<?php
include("footer.php");
?>