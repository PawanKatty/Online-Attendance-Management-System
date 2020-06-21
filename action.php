<?php
include("functions.php");
$id = "xyzschool";
$password = "1234xyzschool";
$error = "";


if(array_key_exists("login",$_POST)){
    if(!$_POST['idd']){
    $error .= "<p>Enter Id.</p>";
    }
    if(!$_POST['password']){
    $error .= "<p>Password required.</p>";
    }
    if(($_POST['idd'] != "")&&($_POST['password']!="")){
        if(($_POST['idd'] != $id)||($_POST['password']!=$password)){
            $error .= "<p>Id or Password not correct</p>";
        }
        else if(($_POST['idd'] == $id)&&($_POST['password'] ==$password)){
            $_SESSION['id'] = $id;
            header("Location: admin.php");
        }
    }
    
}
if($error!="" ){
    $error;
    }
//for filling aatendance.
if(array_key_exists("fill",$_GET)){
    $class = $_GET['class'];
    $section =strtoupper($_GET['section']);
    //get number of student in particular section.
    $query = "SELECT `roll` FROM `student` WHERE class = 
    '".mysqli_real_escape_string($link,$class)."'AND section= 
    '".mysqli_real_escape_string($link,$section)."' ";
    $result = mysqli_query($link,$query);
    $total_student = mysqli_num_rows( $result);
    header("Location: view/fill.php?class=".$class."&section=".$section."&total=".$total_student);
}

/*------------------Insert attendance------------------*/
if(array_key_exists("submitAttendance",$_GET)){
    foreach($_GET['check'] as $value){
        //code to fetch data.
    $query = "SELECT `studentid` FROM `student` WHERE class= '".mysqli_real_escape_string($link,$_GET['class'])."' AND section= '".mysqli_real_escape_string($link,$_GET['section'])."' AND roll= '".mysqli_real_escape_string($link,$value)."'";
    $result = mysqli_query($link,$query);
    //$row = mysqli_fetch_array($result);
    while($row = mysqli_fetch_array($result)){
        $roww = $row["studentid"];
        echo $roww." = id<br>";
        date_default_timezone_set('Asia/Kolkata');
        $datee = date('Y-m-d',time());
        echo $datee;
        echo "<p>Roll= ".$value."</p>";
        echo "<p>class= ".$_GET['class']."</p>";
        echo "<p>section= ".$_GET['section']."<br><br></p>";
        
        $query = "INSERT INTO `date`(`date`,`id`) VALUES ('".mysqli_real_escape_string($link,$datee)."','".mysqli_real_escape_string($link,$roww)."')";
        $run = mysqli_query($link,$query);
    }
        
        
    }
}

/*---------- geting Student Id ----------------*/
if(array_key_exists("monthlyView",$_GET)){
    //fetch name and id.
    $query = "SELECT * FROM `student` WHERE class= '".mysqli_real_escape_string($link,$_GET['class'])."' AND 
    section= '".mysqli_real_escape_string($link,$_GET['section'])."' AND 
    roll= '".mysqli_real_escape_string($link,$_GET['roll_no'])."'";
    $result = mysqli_query($link,$query);
    $found= mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
//    print_r($row);
    $student_id = $row['studentid'];
    header("Location: view/calenderView.php?id=".$student_id);
    echo $student_id;
}





/*---------------------to view attendance by Parent-------------*/

if(array_key_exists("viewSubmitParent",$_GET)){
    //fetch name and id.
    $query = "SELECT * FROM `student` WHERE class= '".mysqli_real_escape_string($link,$_GET['class'])."' AND 
    section= '".mysqli_real_escape_string($link,$_GET['section'])."' AND 
    roll= '".mysqli_real_escape_string($link,$_GET['roll_no'])."'";
    $result = mysqli_query($link,$query);
    $found= mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
//    print_r($row);
    $student_id = $row['studentid'];
    $first_name = $row['firstname'];
    $last_name = $row['lastname'];
    
    //getting  date and id from date table.
    date_default_timezone_set('Asia/Kolkata');
    $datee = date('Y-m-d',time());
    $queryy = "SELECT * FROM `date` WHERE date= '".mysqli_real_escape_string($link,$datee)."' AND id= '".mysqli_real_escape_string($link,$student_id)."'";
    $resultt = mysqli_query($link,$queryy);
    $ro = mysqli_fetch_array($resultt);
    if(mysqli_num_rows($resultt)>0){
        $status = 1;
    }else{
        $status = 2;
    }
    echo $status;
    print_r($ro);
    
    echo "<p>".$student_id."</p>";
    echo "<p>".ucfirst($first_name)."</p>";
    echo "<p>".ucfirst($last_name)."</p>";
    echo "<p>".$_GET['class']."</p>";
    echo "<p>".$_GET['section']."</p>";
    echo "<p>".$_GET['roll_no']."</p>";
    
    $class = $_GET['class'];
    $section = $_GET['section'];
    $roll = $_GET['roll_no'];
    //redirect page to parent_view.
    header("Location: view/parentview.php?class=".$class."&roll_no=".$roll."&section=".$section."&first_name=".ucfirst($first_name)."&last_name=".ucfirst($last_name)."&status=".$status."&found=".$found);
}


/*------------------Add student to data base.-------------------*/ 

//declaring vatiables for student picture.
$image = $_FILES['image']['tmp_name'];
$imgContent = addslashes(file_get_contents($image));
$target_file = basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$uploadOk = 1;

if(array_key_exists("addStudent",$_POST)){
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    $f_name = ucfirst($_POST['f_name']);
    $l_name = ucfirst($_POST['l_name']);
    $class = $_POST['class'];
    $section = ucfirst($_POST['section']);
    $roll_no = $_POST['roll_no'];
    
    //upload student pic if all condtions are satisfied.
    // Check file size
    if ($_FILES["image"]["size"] > 51300) {
        echo "Sorry, your file is large from 50kb.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
        echo "Sorry, only JPG, JPEG & PNG files are allowed.";
        $uploadOk = 0;
    }
    
    //verify roll number
     $query = "SELECT `roll` FROM `student` WHERE class='".mysqli_real_escape_string($link,$class)."' AND section= '".mysqli_real_escape_string($link,$section)."' AND roll='".mysqli_real_escape_string($link,$roll_no)."'";
    $result = mysqli_query($link,$query);
    if(mysqli_num_rows($result) > 0){
        echo "<br>Already roll exists";
        while($row = mysqli_fetch_array($result)){
        $roww = $row["studentid"];
        echo $roww." = id<br>";
        
        $uploadOk = 0;
    }
    }else{
        echo "<br>New Roll" ; 
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
            $query = "INSERT INTO `student`(`firstname`,`lastname`,`class`,`section`,`roll`,`image`) VALUES ('".mysqli_real_escape_string($link,$f_name)."',
            '".mysqli_real_escape_string($link,$l_name)."',
            '".mysqli_real_escape_string($link,$class)."',
            '".mysqli_real_escape_string($link,$section)."',
            '".mysqli_real_escape_string($link,$roll_no)."',
            '$imgContent')";
            $run = mysqli_query($link,$query);
            if($run){
                echo "Data uploaded";
            }
            else{
                echo "ops there is some error";
            }
    }
}


/*------------------Edit Attendance-------------------*/
if(array_key_exists("editAttendance",$_GET)){
    $checked = array();
    $query = "SELECT `studentid` , `roll` FROM `student` WHERE 
    class= '".mysqli_real_escape_string($link,$_GET['class'])."' AND section= '".mysqli_real_escape_string($link,$_GET['section'])."'";
    $result = mysqli_query($link,$query);
    $total_student = mysqli_num_rows($result);
    while($row = mysqli_fetch_array($result)){
        $roww = $row["studentid"];
        $roll = $row["roll"];
        echo $roww." = id<br>";
        echo $roll." = roll<br>";
        
        $queryy = "SELECT `date` FROM `date` WHERE id= '".mysqli_real_escape_string($link,$roww)."'
        AND date= '".mysqli_real_escape_string($link,$_GET['date'])."'";
        $resultt = mysqli_query($link,$queryy);
        while( $fetched_date = mysqli_fetch_array($resultt)){
            $fetched_datee = $fetched_date["date"];
            echo $fetched_datee." <br>" ;
            if($fetched_datee == $_GET['date']){
                echo "present";
                $checked[] = $roll;
            }
        }
        echo "<br><br>";
        
    }
    $implodeChecked = implode(",",$checked);
    header("Location: view/adminView.php?date=".$_GET['date']."&class=".$_GET['class']."&section=".$_GET['section']."&total=".$total_student."&checked=".$implodeChecked);
    
    echo "<p>class= ".$_GET['class']."</p>";
    echo "<p>section= ".$_GET['section']."<br><br></p>";
    print_r($checked);
    echo $implodeChecked;
}


if(array_key_exists("updateAttendance",$_GET)){
    //print_r($_GET['check']);
    $explodeChecked = explode(",",$_GET['checked']);
    //print_r($explodeChecked);
    
    $addDiff = array_diff($_GET['check'],$explodeChecked);
    print_r($addDiff);
    
    $minusDiff = array_diff($explodeChecked,$_GET['check']);
    print_r($minusDiff);
    
    echo "<br>to Add.<br>";
    foreach($addDiff as $toAdd){
        echo $toAdd;
        $query = "SELECT `studentid` FROM `student` WHERE class= '".mysqli_real_escape_string($link,$_GET['class'])."' AND section= '".mysqli_real_escape_string($link,$_GET['section'])."' AND roll= '".mysqli_real_escape_string($link,$toAdd)."'";
    $result = mysqli_query($link,$query);
    //$row = mysqli_fetch_array($result);
    while($row = mysqli_fetch_array($result)){
        $roww = $row["studentid"];
        echo "<br>".$roww." = id<br>";
//        date_default_timezone_set('Asia/Kolkata');
//        $datee = date('Y-m-d',time());
//        echo $datee;
        echo "<p>Roll= ".$toAdd."</p>";
        echo "<p>class= ".$_GET['class']."</p>";
        echo "<p>section= ".$_GET['section']."<br><br></p>";
        
        $query = "INSERT INTO `date`(`date`,`id`) VALUES ('".mysqli_real_escape_string($link,$_GET['date'])."','".mysqli_real_escape_string($link,$roww)."')";
        $run = mysqli_query($link,$query);
        if(!$run){
            echo " Not added";
        }else{
            echo "Added";
        }
    }
    }
    
    echo "<br>to delete.<br>";
    foreach($minusDiff as $toDelete){
        echo $toDelete;
        $query = "SELECT `studentid` FROM `student` WHERE class= '".mysqli_real_escape_string($link,$_GET['class'])."' AND section= '".mysqli_real_escape_string($link,$_GET['section'])."' AND roll= '".mysqli_real_escape_string($link,$toDelete)."'";
    $result = mysqli_query($link,$query);
    //$row = mysqli_fetch_array($result);
    while($row = mysqli_fetch_array($result)){
        $roww = $row["studentid"];
        echo "<br>".$roww." = id<br>";
//        date_default_timezone_set('Asia/Kolkata');
//        $datee = date('Y-m-d',time());
//        echo $datee;
        echo "<p>Roll= ".$toDelete."</p>";
        echo "<p>class= ".$_GET['class']."</p>";
        echo "<p>section= ".$_GET['section']."<br><br></p>";
        
        $query = "DELETE FROM `date` WHERE id='".mysqli_real_escape_string($link,$roww)."'
        AND date='".mysqli_real_escape_string($link,$_GET['date'])."' LIMIT 1";
        $run = mysqli_query($link,$query);
        if(!$run){
            echo " Not deleted";
        }else{
            echo "Deleted";
        }
    }
    }
}

/*-------------Delete All-------------------*/
    if(array_key_exists("deleteAll",$_GET)){
        $explodeChecked = explode(",",$_GET['checked']);
        print_r($explodeChecked);
        foreach($explodeChecked as $toDeleteAll){
        echo $toDeleteAll;
        $query = "SELECT `studentid` FROM `student` WHERE class= '".mysqli_real_escape_string($link,$_GET['class'])."' AND section= '".mysqli_real_escape_string($link,$_GET['section'])."' AND roll= '".mysqli_real_escape_string($link,$toDeleteAll)."'";
    $result = mysqli_query($link,$query);
    //$row = mysqli_fetch_array($result);
    while($row = mysqli_fetch_array($result)){
        $roww = $row["studentid"];
        echo "<br>".$roww." = id<br>";
//        date_default_timezone_set('Asia/Kolkata');
//        $datee = date('Y-m-d',time());
//        echo $datee;
        echo "<p>Roll= ".$toDeleteAll."</p>";
        echo "<p>class= ".$_GET['class']."</p>";
        echo "<p>section= ".$_GET['section']."<br><br></p>";
        
        $query = "DELETE FROM `date` WHERE id='".mysqli_real_escape_string($link,$roww)."'
        AND date='".mysqli_real_escape_string($link,$_GET['date'])."' LIMIT 1";
        $run = mysqli_query($link,$query);
        if(!$run){
            echo " Not deleted";
        }else{
            echo "Deleted";
        }
    }
    }
        
        
    }






?> 
























