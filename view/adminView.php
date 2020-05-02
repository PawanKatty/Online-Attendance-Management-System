<?php
include("../action.php");
?>
<?php if($_SESSION['id']){
include("header.php");
?>
       
    <div class="fillStatus">
        <h5>Date:
        <?php 
    //way to change date format simply.
    $result = explode('-',$_GET['date']);
    $date = $result[2];
    $month = $result[1];
    $year = $result[0];
    echo $dateformat = $date.'-'.$month.'-'.$year;
    
            ?>
        </h5>
        <h5>Class: <?php echo $_GET['class']." , "; ?> 
            Section: <?php echo strtoupper($_GET['section']); ?></h5>
    </div>
    
    <?php
    //geting array of roll number for ticking the checkbox.
    $explodeChceked = explode(",",$_GET['checked']);
    ?>
    
    <form  method="get" action="../action.php">
          <input type="hidden" name="class" value="<?php echo $_GET['class'];?>">
          <input type="hidden" name="section" value="<?php echo $_GET['section'];?>">
          <input type="hidden" name="date" value="<?php echo $_GET['date'];?>">
          <input type="hidden" name="checked" value="<?php echo $_GET['checked'];?>">
           <ol>
           <?php
    
    //writing checkboxes.
    $n = 1;
    $string2 = "";
    while($n <= 30){    
        $string1 =  "<li> <input type='checkbox' name='check[]' value=".$n." "; 
            if(in_array($n,$explodeChceked)){
                $string2 = "checked";
            }else {
                $string2 = "";
            };
        $string3 = "></li>";
        echo $string1.$string2.$string3;
        $n++;
    }
               
               ?>
           </ol >       
           <div style="text-align: center;">
            <input class="submitView" type="submit" value="Update" name="updateAttendance">
            
            <button type="submit" id="deleteAll" class="btn btn-primary" value="deleteAll" name="deleteAll" >Delete All</button>
            </div>
        </form>
    
<!--
    <div style="text-align: center;" >
            <a href="admin.php"><input class="submitView" type="submit" value="Back"></a>
    </div>
-->
    
    
<?php }else{?>
<h1>Not Found</h1>
<p>The requested URL /fill.php was not found on this server.</p>
<?php }?>



<?php
include("footer.php");
?>