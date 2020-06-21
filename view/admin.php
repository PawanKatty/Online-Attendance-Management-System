<?php
include("../action.php");
?>
<?php if($_SESSION['id']){
include("header.php"); ?>
    
   <div class="container">
    
<!------ Fill attendance --------------->
          <!-- Content here -->
          <div class="card border-success mb-3 mt-5 w-50"  style="min-width: 17rem;">
              <div class="card-header bg-transparent border-success"><h5>Select and submit to fill attendance</h5></div>
              <div class="card-body text-success m-auto ">
                  <h5 class="text-dark mb-3">Date: <?php date_default_timezone_set('Asia/Kolkata'); echo date('d/m/y',time());?></h5>
                   <form action="../action.php" method="get">
            <select name="class" id="fillClass" class="homeClass border-primary form-control">
                <option value="">Select class</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
                <option value=11>11</option>
                <option value=12>12</option>
            </select>
            <small id="errorFillClass" class="form-text text-danger"></small>
            <br>
            
            <select name="section" id="fillSection" class="border-primary form-control">
                <option value="">Select Section</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="e">E</option>
                <option value="f">F</option>
            </select>
            <small id="errorFillSection" class="form-text text-danger"></small>
            <br>
            <button type="submit" id="fillSubmit" class="btn btn-primary" value="submit" name="fill" >Submit</button>
            
        </form>
    </div>
  </div>
   
   
     <!--    Status of students-->
      <div class="card border-success mb-3 mt-5 w-50"  style="min-width: 17rem;">
              <div class="card-header bg-transparent border-success"><h5>Select and click View to view attendance</h5></div>
              <div class="card-body text-success m-auto">
                   <form action="../action.php" method="get">
                   <div class="mb-4">
        <p style="float: left" class="text-dark">Enter Date:</p>
           <input type="date" class="border-info ml-4 mb-3" name="date" required pattern="[0-9]{2}-[0-9]{2}-[0-9]{4}"></div>
            <select name="class" id="editClass" class="homeClass border-primary form-control">
                <option value="">Select class</option>
                <option value=1>1</option>
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
                <option value=6>6</option>
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
                <option value=11>11</option>
                <option value=12>12</option>
            </select>
            <small id="errorEditClass" class="form-text text-danger"></small>
            <br><br>
            <select name="section" id="editSection" class="border-primary form-control ">
                <option value="">Select Section</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="e">E</option>
                <option value="f">F</option>
            </select>
            <small id="errorEditSection" class="form-text text-danger"></small>
            <br>
            <button type="submit" id="editSubmit" class="btn btn-primary mt-2" value="View" name="editAttendance" >View</button>
        </form>
    </div>
  </div>


  <!--Add student-->
  <div class="card border-success mb-3 mt-5 w-50"  style="min-width: 17rem;">
              <div class="card-header bg-transparent border-success"><h5>Add a new Student</h5></div>
              <div class="card-body text-dark">
                  
                   <form action="../action.php" method="post" enctype="multipart/form-data">
                          
                           <div class="form-group">
                               <label for="f_name">First Name</label>
                               <input type="text" class="form-control" id="f_name" name="f_name" placeholder="First Name">
                               <small id="errorFname" class="form-text text-danger"></small>
                           </div>
                           
                           <div class="form-group">
                               <label for="L_name">Last Name</label>
                               <input type="text" class="form-control" id="l_name" placeholder="Last Name" name="l_name">
                               <small id="errorLname" class="form-text text-danger"></small>
                           </div>
                           <p>Class: <select name="class" id="addClass" class="homeClass form-control mt-1">
                                   <option value="">Select class</option>
                                   <option value=1>1</option>
                                   <option value=2>2</option>
                                   <option value=3>3</option>
                                   <option value=4>4</option>
                                   <option value=5>5</option>
                                   <option value=6>6</option>
                                   <option value=7>7</option>
                                   <option value=8>8</option>
                                   <option value=9>9</option>
                                   <option value=10>10</option>
                                   <option value=11>11</option>
                                   <option value=12>12</option>
                               </select>
                               <small id="errorAddClass" class="form-text text-danger"></small>
                               </p>
                               
                               <p>Section: <select name="section" id="addSection" class="form-control mt-1">
                                       <option value="">Select Section</option>
                                       <option value="a">A</option>
                                       <option value="b">B</option>
                                       <option value="c">C</option>
                                       <option value="d">D</option>
                                       <option value="e">E</option>
                                       <option value="f">F</option>
                                   </select>
                                   <small id="errorAddSection" class="form-text text-danger"></small>
                                   </p>
                                   
                                   <p>Roll_No: <input type="number" id="addRoll" placeholder="Roll Number" class="form-control mt-1" name="roll_no">
                                   <small id="errorAddRoll" class="form-text text-danger"></small>
                                   </p>
                                   
                                   <p>
                                       <label for="image">Image: </label>
                                       <input type="file" name="image" id="addImage" class="mt-3 ml-3" style="border: 1px solid gray;">
                                       <small id="errorAddImage" class="form-text text-danger"></small>
                                   </p>
                           <button type="submit" class="btn btn-primary" id="addStudent" value="Add Student" name="addStudent">Add Student</button>
        </form>
    </div>
  </div>

    
</div>
<?php }else{?>
<h1>Not Found</h1>
<p>The requested URL /fill.php was not found on this server.</p>
<?php }?>



<?php
include("footer.php");
?>