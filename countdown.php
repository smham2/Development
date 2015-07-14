<?php

// This function will calculate the time from today to the selected holiday and display the results
function countdown_to_holiday ($date_of_holiday, $name_of_holiday) {
	
	// Get today's date and the set $year to the current year
	$today = getdate();
	$year = $today['year'];

	// Get the favorite holiday's date for the current year
	$holiday_date = getdate(strtotime("$date_of_holiday $year"));

	// If the date/time stamp value for today (current date) is greater than the value of $holiday_date then set $next_year 
	// to $year +1 and get the new value of $holiday_date. Set $days_left to the difference between today's numeric calendar day 
	// and the last numeric day of the current year and then add that value to the numeric calendar for the holiday next year.
	if ($today['0'] >= $holiday_date['0']) {

		$next_year = $year + 1;
		$holiday_date = getdate(strtotime("$date_of_holiday $next_year"));

		$days_left = (date("z", strtotime("31 december $year")) - $today['yday']) + $holiday_date['yday'];
	
	} 
	// Or just calculate the different between today's numeric calendar day and the holiday's numeric calendar day
	else {

		$days_left = $holiday_date['yday'] - $today['yday'];

	}
	
	// Display the results to the end user
	echo "<h3>$days_left days until $name_of_holiday!</h3>";
	echo "Today is <b><span style='color: blue'>" . date("l F j, Y g:i:s A ", $today['0']) . "</span></b><br/>";
	echo "The selected holiday is $name_of_holiday, which is on " . date("l F j, Y", $holiday_date['0']) . "<br/>";
	echo "There are <b>$days_left</b> days left until " . date("l F j, Y", $holiday_date['0']);

}

// Depending on how this page was accessed either display the initial form or the form results.
// If the form was submitted ($_POST['submit'] contains the value of countdown, display form results
if ($_POST['submit'] == "countdown") {

	// Separate the value sent from radio button selection (holiday_data) into two variables: $date_of_holiday and $name_of_holiday
	list($date_of_holiday, $name_of_holiday) = explode(",", $_POST['holiday_data']);

	// Send values of $date_of_holiday and $name_of_holiday to function countdown_to_holiday and run it
	countdown_to_holiday($date_of_holiday, $name_of_holiday);

}
// Or display the initial form
else {
	echo "<h3>Countdown to your favorite holiday</h3>";
	echo "<form method='POST' action='countdown2.php'>";
	echo "Select your favorite holiday<br/><br/>";
	echo "<input type='radio' name='holiday_data' value='1 january,New Year Day' />New Year's Day<br/>";
	echo "<input type='radio' name='holiday_data' value='third monday of january,Martin Luther King Day' />Martin Luther King Day<br/>";
	echo "<input type='radio' name='holiday_data' value='third monday of february,Presidents Day' />President's Day<br/>";
	echo "<input type='radio' name='holiday_data' value='last monday of may,Memorial Day' />Memorial Day<br/>";
	echo "<input type='radio' name='holiday_data' value='4 july,Independence Day' />Independence Day<br/>";
	echo "<input type='radio' name='holiday_data' value='first monday of september,Labor Day' />Labor Day<br/>";
	echo "<input type='radio' name='holiday_data' value='second monday of october,Columbus Day' />Columbus Day<br/>";
	echo "<input type='radio' name='holiday_data' value='eleventh of november,Veterans Day' />Veteran's Day<br/>";
	echo "<input type='radio' name='holiday_data' value='fourth thursday of november,Thanksgiving' />Thanksgiving<br/>";
	echo "<input type='radio' name='holiday_data' value='25 december,Christmas' />Christmas<br/>";
	echo "<br/><input type='submit' name='submit' value='countdown' />";
	echo "</form>";

}


?>
