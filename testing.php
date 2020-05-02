<?php include("functions.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Calender</title>
    
    <style type="text/css">
        *{
            margin: 0;
            box-sizing: border-box;
        }
        body{
            margin: 0;
            font-family: sans-serif;
        }
        .wrapper{
            width: 100vw;
            height: 100vh;
            display: flex;
            background-color: cornsilk;
        }
        .calender{
            width: 600px;
            margin: auto;
            box-shadow: 0px 0px 15px 3px rgba(0, 0, 0, 0.2);
        }
        .month{
            width: 100%;
            color: white;
            display: flex;
            justify-content: space-between;
            text-align: center;
            align-items: center;
            padding: 40px 30px;
            background-color: green;
        }
        .week{
            background-color: darkgreen;
            color: white;
            display: flex;
            padding: 7px 0;
        }
        .week div{
            text-align: center;
            width: 14.28%;
        }
        .days{
            display: flex;
            flex-wrap: wrap;
            text-align: center;
            font-weight: 200;
            padding: 10px 0;
        }
        .days div{
            width: 14.28%;
            margin-bottom: 10px;
            padding: 10px 0;
            transition: all 0.4s;
        }
        .days div:hover{
            background-color: lightgray;
            cursor: pointer;
        }
        .today{
            padding: 0 2px;
            border-radius: 50%;
            background-color: dodgerblue;
            color: white;
        }
        .prev_date{
            color: gray;
        }
        #month{
            font-size: 30px;
            font-weight: 500;
        }
        .prev,.next{
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 23px;
            width: 50px;
            height: 50px;
            background-color: rgba(0,0,0,0.1);
            border-radius: 50%;
            transition: all 0.4s;
        }
        .prev:hover,.next:hover{
            background-color: rgba(0,0,0,0.2);
            cursor: pointer;
        }
        
        .presentDays{
            padding: 0 2px;
            border-radius: 50%;
            background-color: yellow;
        }
        .TodayPresentDay{
            padding: 0 2px;
            border-radius: 50%;
            background-color: greenyellow;
        }
    </style>
    
</head>

<!--------- Getting Dates from databases of matching id.   ---------->
<?php
    $databaseDates = array();
    $query = "SELECT * FROM `date` WHERE id='".mysqli_real_escape_string($link,$_GET['id'])."'";
//    $query = "SELECT * FROM `date` WHERE id=24";
    $result = mysqli_query($link,$query);
    while($row = mysqli_fetch_array($result)){
        array_push($databaseDates,$row['date']);
    }
    print_r($databaseDates);
    ?>


<body onload="renderDate()">
    <div class="wrapper">
        <div class="calender">
           
            <div class="month">
                <div class="prev" onclick="moveDate('prev')"><span>&#10094</span></div>
                <div>
                <h2 id="month">June</h2>
                <p id="date_str"></p>
                </div>
                <div class="next" onclick="moveDate('next')"><span>&#10095</span></div>
            </div>
            
            <div class="week">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            
            <div class="days">
    
            </div>
        </div>
    </div>
    
<!-------- javascript ----------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    
//    dt.setMonth();

//    appending zero before number
    function prependZero(number) {
            if (number <= 9)
                return "0" + number;
            else
                return number;
        }
    
// function of render date.
    var dt = new Date();
    
    function renderDate(){
        dt.setDate(1);//for starting month from one. 
    var day = dt.getDay();
//    get month total days
    var endDate= new Date(
        dt.getFullYear(),
        dt.getMonth() + 1,
        0
    ).getDate();
    var months = ["January","Feburary","March","April","May","June","July","August","September","October","November","December"];
    document.getElementById("date_str").innerHTML = dt.toDateString();
    document.getElementById("month").innerHTML = months[dt.getMonth()];
    
//    console.log(months[dt.getMonth()]);
//    console.log(day);
    
    var cells = "";
//    writing some dates of past month
     var prevDate= new Date(
        dt.getFullYear(),
        dt.getMonth(),
        0
    ).getDate();
    
    console.log("------------------");
    
// Access the array elements of php 
    var passedArray =  <?php echo json_encode($databaseDates); ?>;
    // Display the array elements 
//    for(var i = 0; i < passedArray.length; i++){ 
//        console.log(passedArray[i]); 
//    } 
    
    console.log("----------JS dates ----------");
    var boxDay ="";
    var boxDate = "";
    for(x=day;x>0;x--){
        cells+="<div class='prev_date dateBox'>"+(prevDate - x+1)+"</div>";
    }
    
//    setting dates
    var today = new Date();
    for(i=1;i<=endDate;i++){
        boxDay+=prependZero(i);
        boxDate+=dt.getFullYear()+"-"+prependZero(dt.getMonth()+1)+"-"+boxDay;
//        console.log(boxDate);
        // Check if a js exists in the php date array list.
        if(passedArray.indexOf(boxDate) !== -1){
            if((i==today.getDate()) && (dt.getMonth() == today.getMonth())){
            cells+="<div class='TodayPresentDay dateBox'>"+i+"</div>";
            }
            else{
            cells+="<div class='dateBox presentDays'>"+i+"</div>";
            }
//            console.log("Value exists!");
        } else{
            if((i==today.getDate()) && (dt.getMonth() == today.getMonth())){
            cells+="<div class='today dateBox'>"+i+"</div>";
            }
            else{
            cells+="<div class='dateBox'>"+i+"</div>";
            }
//            console.log("Not exists!");
        }
        
        boxDay = "";
        boxDate="";
    } 
    document.getElementsByClassName("days")[0].innerHTML = cells;
    }
    
    
    //    moving months
    function moveDate(para){
        if(para == "prev"){
            dt.setMonth(dt.getMonth()-1);
        }
        else if(para == "next"){
            dt.setMonth(dt.getMonth()+1);
        }
        renderDate();
    }
    
    
//    console.log(boxDate);
//    $(".dateBox").click(function(){
//        alert($('.dateBox').html());
//    })
//    
    
    </script>
    
    
    
</body>
</html>