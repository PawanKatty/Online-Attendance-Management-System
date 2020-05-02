<?php 
include("../action.php");
include("header.php");?>

<!--              <div id="error" style="float:right"><?php //echo $error; echo $_SESSION['id']; ?></div>-->
      
      <div class="container">
          <!-- Content here -->
          <div class="card border-success mb-3 mt-5 w-50 "  style="min-width: 17rem;">
              <div class="card-header bg-transparent border-success"><h5>Select and submit to view attendance</h5></div>
              <div class="card-body text-success m-auto">
                   <form action="../action.php" method="get">
            <select name="class" id="homeClass" class="homeClass border-primary form-control">
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
            <small id="errorHomeClass" class="form-text text-danger"></small>
            <br><br>
            <select name="section" id="homeSection" class="border-primary form-control">
                <option value="">Select Section</option>
                <option value="a">A</option>
                <option value="b">B</option>
                <option value="c">C</option>
                <option value="d">D</option>
                <option value="e">E</option>
                <option value="f">F</option>
            </select>
            <small id="errorHomeSection" class="form-text text-danger"></small>
            <br><br>
<!--            dropdown for Roll_no.-->
            <input list="rollNo" name="roll_no" id="homeRoll" placeholder="Enter Roll_No" class="s border-primary form-control">
            <small id="errorHomeRoll" class="form-text text-danger"></small>
            <datalist id="rollNo">
                <option value=1>
                <option value=2>
                <option value=3>
                <option value=4>
                <option value=5>
                <option value=6>
                <option value=7>
                <option value=8>
                <option value=9>
                <option value=10>
                <option value=11>
                <option value=12>
                <option value=13>
                <option value=14>
                <option value=15>
                <option value=16>
                <option value=17>
                <option value=18>
                <option value=19>
                <option value=20>
                <option value=21>
            </datalist>
            <br><br>
            <button type="submit" id="homeSubmit" class="btn btn-primary" value="submit"name="viewSubmitParent" >Submit</button>
<!--            <input type="submit" id="viewSubmit" value="submit" class="border-primary" name="viewSubmitParent">-->
        </form>
    </div>
 </div>
</div>
    <?php include("footer.php")?>