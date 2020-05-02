</div>
   </div>
   <footer id="footer"></footer>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
<script type="text/javascript">
    
    //for checking whether everything is selected or not to view attendance .
    $("#homeSubmit").click(function(){
        if($("#homeClass").val() == ""){
            $("#errorHomeClass").html("Please select class.");
            event.preventDefault();
        }
        else if($("#homeClass").val()){
            $("#errorHomeClass").html("");
        }
        
        if($("#homeSection").val() == ""){
            $("#errorHomeSection").html("Please select Section.");
            event.preventDefault();
        }
        else if($("#homeSection").val()){
            $("#errorHomeSection").html("");
        }
        
        if($("#homeRoll").val() == ""){
            $("#errorHomeRoll").html("Please enter roll number.");
            event.preventDefault();
        }
        else if($("#homeRoll").val()){
            $("#errorHomeRoll").html("");
        }
    }); 
    
    
    //for checking whether everything is selected or not to fill attendance.
    $("#fillSubmit").click(function(){
        
        if($("#fillClass").val() == ""){
            $("#errorFillClass").html("Please select Class.");
            event.preventDefault();
        }
        else if($("#fillClass").val()){
            $("#errorFillClass").html("");
        }
        
        if($("#fillSection").val() == ""){
            $("#errorFillSection").html("Please select Section.");
            event.preventDefault();
        }
        else if($("#fillSection").val()){
            $("#errorHomeRoll").html("");
        }
        
    });
    
    
    //check whether everything is selected or not to update attendance.
    $("#editSubmit").click(function(){
        
        if($("#editClass").val() == ""){
            $("#errorEditClass").html("Please select Class.");
            event.preventDefault();
        }
        else if($("#editClass").val()){
            $("#errorEditClass").html("");
        }
        
        if($("#editSection").val() == ""){
            $("#errorEditSection").html("Please select Section.");
            event.preventDefault();
        }
        else if($("#editSection").val()){
            $("#errorEditSection").html("");
        }
        
    });
    
    //check whether everything is selected or not to add student.
    $("#addStudent").click(function(){
        
        if($("#f_name").val() == ""){
            $("#errorFname").html("Please enter first name.");
            event.preventDefault();
        }
        else if($("#f_name").val()){
            $("#errorFname").html("");
        }
        
        if($("#l_name").val() == ""){
            $("#errorLname").html("Please enter last name.");
            event.preventDefault();
        }
        else if($("#l_name").val()){
            $("#errorLname").html("");
        }
        
        if($("#addClass").val() == ""){
            $("#errorAddClass").html("Please select Class.");
            event.preventDefault();
        }
        else if($("#addClass").val()){
            $("#errorAddClass").html("");
        }
        
        if($("#addSection").val() == ""){
            $("#errorAddSection").html("Please select Section.");
            event.preventDefault();
        }
        else if($("#addSection").val()){
            $("#errorAddSection").html("");
        }
        
        if($("#addRoll").val() == ""){
            $("#errorAddRoll").html("Please select Roll Number.");
            event.preventDefault();
        }
        else if($("#addRoll").val()){
            $("#errorAddRoll").html("");
        }
        
        if($("#addImage").val() == ""){
            $("#errorAddImage").html("Please select image.");
            event.preventDefault();
        }
        else if($("#addImage").val()){
            $("#errorAddImage").html("");
        }
        
    });
    
    
       </script>
</body>
</html>