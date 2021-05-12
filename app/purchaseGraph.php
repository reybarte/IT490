<?php
session_start();
require(__DIR__ . "/MQPublish.inc.php");
if (isset($_SESSION["user"])) {
    $user = $_SESSION["user"]["user_name"];

    ob_start();
    $purchase_date = (array)((array)getTransactionHistory($user))["data"];
    ob_end_clean();
} else {
    echo "<script>alert('You must be logged in to access this page.')</script>";
    echo "<script>window.location = 'login.php'; </script>";
}
require(__DIR__ . "/header.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.1.0/chart.js" integrity="sha512-LlFvdZpYhQdASf4aZfSpmyHD6+waYVfJRwfJrBgki7/Uh+TXMLFYcKMRim65+o3lFsfk20vrK9sJDute7BUAUw==" crossorigin="anonymous"></script>
    <title>Statistics</title>
</head>

<body>
	<br>
    <div id="btnDiv">
         <button class="statsBtn" id="today">Today</button>
         <button class="statsBtn" id="week">Week</button>
         <button class="statsBtn" id="month">Month</button>
         <button class="statsBtn" id="6months">6 Months</button>
         <button class="statsBtn" id="year">Year</button>
    </div>
    <div class="canvas" id="todayDiv"><canvas id="todayChart"></canvas></div>
    <div class="canvas" id="weekDiv"><canvas id="weekChart" ></canvas></div>
    <div class="canvas" id="monthDiv"><canvas id="monthChart"></canvas></div>
    <div class="canvas" id="6MonthsDiv"><canvas id="6MonthsChart"></canvas></div>
    <div class="canvas" id="yearDiv"><canvas id="yearChart"></canvas></div>
    <script>
        function getToday(data) {
            var ctx = document.getElementById('todayChart');
            var newData = {
                type: 'line',
                data: {
                    labels: ['12:00 a.m', '1:00 a.m', '2:00 a.m', '3:00 a.m', '4:00 a.m', "5:00 a.m", "6:00 a.m", "7:00 a.m", "8:00 a.m", "9:00 a.m", "10:00 a.m", "11:00 a.m",
                        '12:00 p.m', '1:00 p.m', '2:00 p.m', '3:00 p.m', '4:00 p.m', "5:00 p.m", "6:00 p.m", "7:00 p.m", "8:00 p.m", "9:00 p.m", "10:00 p.m", "11:00 p.m"
                    ],
                    datasets: [{
                        label: '# of Purchases Today',
                        data: [0, 2, 4, 5, 9],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            newData["data"]["datasets"][0]["data"] = data;
            var myChart = new Chart(ctx, newData);
            <?php //echo json_encode($data, 1); 
            ?>;
        }

        function getWeek(data, labels) {
            var ctx = document.getElementById('weekChart');
            var newData = {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: '# of Purchases This Week',
                        data: [0, 2, 4, 5, 9],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            newData["data"]["datasets"][0]["data"] = data;
            newData["data"]["labels"] = labels;
            var myChart = new Chart(ctx, newData);
	}
	function getMonth(data, labels) {
            var ctx = document.getElementById('monthChart');
            var newData = {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: '# of Purchases This Month',
                        data: [],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            newData["data"]["datasets"][0]["data"] = data;
            newData["data"]["labels"] = labels;
            var myChart = new Chart(ctx, newData);
	}
	function get6Months(data, labels) {
            var ctx = document.getElementById('6MonthsChart');
            var newData = {
                type: 'line',
                data: {
                    labels: [],
                    datasets: [{
                        label: '# of Purchases Last 6 Months',
                        data: [],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            newData["data"]["datasets"][0]["data"] = data;
            newData["data"]["labels"] = labels;
            var myChart = new Chart(ctx, newData);
	}
	function getYear(data) {
            var ctx = document.getElementById('yearChart');
            var newData = {
                type: 'line',
                data: {
                    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
                    datasets: [{
                        label: '# of Purchases This Year',
                        data: [],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            newData["data"]["datasets"][0]["data"] = data;
            var myChart = new Chart(ctx, newData);
	}
	function showToday(){
		document.getElementById("todayDiv").style.display="block"; 
		document.getElementById("weekDiv").style.display="none";
		document.getElementById("monthDiv").style.display="none";
		document.getElementById("6MonthsDiv").style.display="none";
		document.getElementById("yearDiv").style.display="none";
	}
	function showWeek(){
                document.getElementById("todayDiv").style.display="none";
                document.getElementById("weekDiv").style.display="block";
                document.getElementById("monthDiv").style.display="none";
                document.getElementById("6MonthsDiv").style.display="none";
                document.getElementById("yearDiv").style.display="none";
	}
	function showMonth(){
                document.getElementById("todayDiv").style.display="none";
                document.getElementById("weekDiv").style.display="none";
                document.getElementById("monthDiv").style.display="block";
                document.getElementById("6MonthsDiv").style.display="none";
                document.getElementById("yearDiv").style.display="none";
	}
	function show6Months(){
                document.getElementById("todayDiv").style.display="none";
                document.getElementById("weekDiv").style.display="none";
                document.getElementById("monthDiv").style.display="none";
                document.getElementById("6MonthsDiv").style.display="block";
                document.getElementById("yearDiv").style.display="none";
	}
	function showYear(){
                document.getElementById("todayDiv").style.display="none";
                document.getElementById("weekDiv").style.display="none";
                document.getElementById("monthDiv").style.display="none";
                document.getElementById("6MonthsDiv").style.display="none";
                document.getElementById("yearDiv").style.display="block";
	}
	showToday();
	document.getElementById("today").addEventListener("click", showToday);
	document.getElementById("week").addEventListener("click", showWeek);
	document.getElementById("month").addEventListener("click", showMonth);
	document.getElementById("6months").addEventListener("click", show6Months);
	document.getElementById("year").addEventListener("click", showYear);
    </script>
    <?php
    $currenty = date("Y");
    $currentm = date("m");
    $currentd = date("d");
    $currenth = date("H");
    $currentmin = date("i");
    $daysIndex = ["Monday" => 0, "Tuesday" => 1, "Wednesday" => 2, "Thursday" => 3, "Friday" => 4, "Saturday" => 5, "Sunday" => 6];
    $indexDays = ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday"];
    $countd = ["Monday" => 0, "Tuesday" => 0, "Wednesday" => 0, "Thursday" => 0, "Friday" => 0, "Saturday" => 0, "Sunday" => 0];
    $counth = ['00' => 0, '01' => 0, '02' => 0, '03' => 0, '04' => 0, '05' => 0, '06' => 0, '07' => 0, '08' => 0, '09' => 0, '10' => 0, '11' => 0, '12' => 0, '13' => 0, '14' => 0, '15' => 0, '16' => 0, '17' => 0, '18' => 0, '19' => 0, '20' => 0, '21' => 0, '22' => 0, '23' => 0];
    //echo "$currenty-$currentm-$currentd $currenth-$currentmin";
    //$purchase_time = ((array)$info)["purchase_time"];
    function getTodayChart($currentDate, $hourCount, $purchases)
    {
        foreach ($purchases as $value) { //value = time of each purchase 
            $dayOfWeek = date("l", strtotime($value));
            //echo $dayOfWeek . "\n";
            $value = ((array)$value)["purchase_date"];
            $date = explode(" ", $value);
            $ymd = explode("-", $date[0]);
            $hms = explode(":", $date[1]);
            if ($currentDate[0] == $ymd[0] && $currentDate[1] == $ymd[1] && $currentDate[2] == $ymd[2]) {
                $hourCount[$hms[0]]++;
            }
            //echo $value;
        }
        foreach ($hourCount as $value) {
            $data[] = $value;
        }
        echo "<script>getToday(" . json_encode($data, 1) . ")</script>";
    }
    
    
    function getWeekChart($currentDate, $purchases, $daysIndex, $indexDays)
    {
    	$monthDays = ["January" => 31, "February" => 28, "March" => 31, "April" => 30, "May" => 31, "June" => 30, "July" => 31, "August" => 31, "September" => 30, "October" => 31, "November" => 30, "December" => 31];
	$monthIndex = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
	$dayOfWeek = date("l", mktime(0, 0, 0, intval($currentDate[1]), intval($currentDate[2]), intval($currentDate[0])));
	
	$counter = $daysIndex[date('l', strtotime($currentDate[0] . "-" . $currentDate[1] . "-" . $currentDate[2]))] + 1;
        $counter1 = 0;
	//creates new array for day labels
	while ($counter1 < 7) {
            if ($counter == 7) {
                $counter = 0;
                $newDays[] = $indexDays[$counter];
	    	$dayCount[$indexDays[$counter]] = 0;
	    } else {
                $newDays[] = $indexDays[$counter];
	    	$dayCount[$indexDays[$counter]] = 0;
            }
            $counter++;
            $counter1++;
	}
	

        foreach ($purchases as $value) { //value = time of each purchase 
            //echo $dayOfWeek . "\n";
            $value = ((array)$value)["purchase_date"];
            $date = explode(" ", $value);
	    //year, month, day of purchase
	    $ymd = explode("-", $date[0]);
	    //hour, minute, second of purchase
            $hms = explode(":", $date[1]);
            $dayOfPurchase = date("l", mktime(0, 0, 0, intval($ymd[1]), intval($ymd[2]), intval($ymd[0])));
            $monthOfPurchase = date("F", mktime(0, 0, 0, intval($ymd[1]), intval($ymd[2]), intval($ymd[0])));
	    //echo "Purchased: $monthOfPurchase $dayOfPurchase";
	    //check if same year
	    if ($currentDate[0] == $ymd[0]) {
		    //echo "same year";
		    //check if same month
		    if($currentDate[1] == $ymd[1]) {
			//check if purchase is within 7 days of current day    
			   //echo "same month: ".  $monthIndex[$currentDate[1]]; 
			   if($monthCount[$monthOfPurchase] - 7 >= $monthCount[$monthOfPurchase]) {
				$dayCount[$dayOfPurchase]++;
			}
		    //check if purchase is within a week of current date
		    } else if($currentDate[1] == ($ymd[1] + 1)) { //check if purchase is in previous month
			//check if purchase is within a week of current date
			if($monthCount[$ymd[1]] + ($currentDate[1] - 7 <= $ymd[2])) {
				$dayCount[$dayOfPurchase]++; 
			} 
		    }
	    } elseif ($currentDate[0] == ($ymd[0] + 1)) { //if current date is a year after purchase, then week maybe from december to january 
               // echo "$currentDate[1]-$currentDate[2]---$ymd[1]-$ymd[2]";
               // echo $dayOfPurchase;
                if ($currentDate[1] == '1' && $ymd[1] == '12') {
                    if (intval($ymd[2]) > (intval($currentDate[2]) - 7 + 31)) {
                        $dayCount[$dayOfPurchase]++;
                    }
                }
            }
        }

        foreach ($dayCount as $value) {
            $data[] = $value;
        }
        //var_dump($newDays);
        //var_dump($data);
        echo "<script>getWeek(" . json_encode($data, 1) . ", " . json_encode($newDays, 1) . ")</script>";
    }
    function getMonthChart($currentDate, $purchases)
    {
    	$monthDays = ["January" => 31, "February" => 28, "March" => 31, "April" => 30, "May" => 31, "June" => 30, "July" => 31, "August" => 31, "September" => 30, "October" => 31, "November" => 30, "December" => 31];
	$monthIndex = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

	$currentMonth = $monthIndex[$currentDate[1] - 1];
	$daysInMonth = $monthDays[$currentMonth];
	//echo $daysInMonth;
	for($i = 1; $i <= $daysInMonth; $i++) {
		$days[] = "$i";
		$dayCount["$i"] = 0;
	}

	
	foreach ($purchases as $value) { //value = time of each purchase
            $dayOfWeek = date("l", strtotime($value));
            //echo $dayOfWeek . "\n";
            $value = ((array)$value)["purchase_date"];
            $date = explode(" ", $value);
            $ymd = explode("-", $date[0]);
            $hms = explode(":", $date[1]);
            if ($currentDate[0] == $ymd[0] && $currentDate[1] == $ymd[1]) {
                $dayCount["$ymd[2]"]++;
            }
        }
        foreach ($dayCount as $value) {
            $data[] = $value;
	}
	//var_dump($days);
        //var_dump($data);
        echo "<script>getMonth(" . json_encode($data, 1). ", " . json_encode($days, 1) .")</script>";
    }
    function get6MonthsChart($currentDate, $purchases)
    {
        $monthDays = ["January" => 31, "February" => 28, "March" => 31, "April" => 30, "May" => 31, "June" => 30, "July" => 31, "August" => 31, "September" => 30, "October" => 31, "November" => 30, "December" => 31];
        $monthIndex = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

        $currentMonth = $monthIndex[$currentDate[1] - 1];
	$counter = $currentDate[1] - 6;
	if ($counter < 0) {
		$counter = 12 + $counter;
	}
	$counter1 = 0;
	while($counter1 < 6) {
		if($counter > 11) {
			$counter = 0;
			$months[] = $monthIndex[$counter];
			$monthCount[$monthIndex[$counter]] = 0;
		} else {
			$months[] = $monthIndex[$counter];
			$monthCount[$monthIndex[$counter]] = 0;
		
		}
		$counter++;
		$counter1++;
	}

        foreach ($purchases as $value) { //value = time of each purchase
            $dayOfWeek = date("l", strtotime($value));
            //echo $dayOfWeek . "\n";
            $value = ((array)$value)["purchase_date"];
            $date = explode(" ", $value);
            $ymd = explode("-", $date[0]);
	    $hms = explode(":", $date[1]);
	    $monthOfPurchase = date("F", mktime(0, 0, 0, intval($ymd[1]), intval($ymd[2]), intval($ymd[0])));
	    //check if the same year
	    if ($currentDate[0] == $ymd[0]) {
		    //check if purchase month is 5 months before current month
		    if ((($currentDate[1] - 5) <= $ymd[1]) && ($ymd[1] <= $currentDate[1])) {
                	$monthCount[$monthOfPurchase]++;
		    }
	    }
	    else if ($currentDate[0] == $ymd[0] + 1) {
		    if((($ymd[1] + $currentDate[1]) >= 9) && (($ymd[1] + $currentDate[1]) <= 17)) { 
                	$monthCount[$monthOfPurchase]++;
		    }
	    }
        }
        foreach ($monthCount as $value) {
            $data[] = $value;
        }
        //var_dump($monthCount);
        //var_dump($months);
        //var_dump($data);
        echo "<script>get6Months(" . json_encode($data, 1). ", " . json_encode($months, 1) .")</script>";
    }
    function getYearChart($currentDate, $purchases) {
        $monthDays = ["January" => 31, "February" => 28, "March" => 31, "April" => 30, "May" => 31, "June" => 30, "July" => 31, "August" => 31, "September" => 30, "October" => 31, "November" => 30, "December" => 31];
        $monthIndex = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    $currentMonth = $monthIndex[$currentDate[1] - 1];
        $counter = $currentDate[1] - 6;
	foreach($monthIndex as $value) {
		$monthCount[$value] = 0;
	}
        foreach ($purchases as $value) { //value = time of each purchase
            $dayOfWeek = date("l", strtotime($value));
            //echo $dayOfWeek . "\n";
            $value = ((array)$value)["purchase_date"];
            $date = explode(" ", $value);
            $ymd = explode("-", $date[0]);
            $hms = explode(":", $date[1]);
            $monthOfPurchase = date("F", mktime(0, 0, 0, intval($ymd[1]), intval($ymd[2]), intval($ymd[0])));
            //check if the same year
            if ($currentDate[0] == $ymd[0]) {
                        $monthCount[$monthOfPurchase]++;
            }
        }
        foreach ($monthCount as $value) {
            $data[] = $value;
        }
        //var_dump($monthCount);
        //var_dump($data);
        echo "<script>getYear(" . json_encode($data, 1) . ")</script>";
    }


    $date = [$currenty, $currentm, $currentd, $currenth, $currentmin];
    getTodayChart($date, $counth, ((array)$purchase_date));
    getWeekChart($date, ((array)$purchase_date), $daysIndex, $indexDays);
    getMonthChart($date, ((array)$purchase_date));
    get6MonthsChart($date, ((array)$purchase_date));
    getYearChart($date, ((array)$purchase_date));
?>
</body>

</html>
<style>
    .line-chart {
        border-bottom: 1px solid;
        border-left: 1px solid;
        height: var(--widget-size);
        margin: 1em;
        padding: 0;
        position: relative;
        width: var(--widget-size);
    }

    .chart {
        list-style: none;
        margin: 0;
        padding: 0;
    }
    .value {
        background-color: white;
        border: 3px solid red;
        border-radius: 50%;
        height: 15px;
        position: absolute;
        width: 15px;
    }
    .canvas {
	width: 800px;
	height: 400px;
	margin: auto;
  	width: 50%;
   }
   .statsBtn {
    	border:none;
    	border-radius:1.5rem;
	width: 100px;
	height: 50px;
    	cursor: pointer;
    	background: #0062cc;
    	color: #fff;
    }
    #btnDiv {
	margin: auto;
	width: 50%;
	text-align: center;
    }   
</style>
