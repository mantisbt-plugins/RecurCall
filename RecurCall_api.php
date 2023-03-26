<?php

// This functions calculates the next date only using business days
// 2 parameters, the startdate and the number of businessdays to add
function calcduedate($datecalc,$duedays) {
	$i = 1;
	while ($i <= $duedays) {
		$datecalc += 86400; // Add a day.
		$date_info  = getdate( $datecalc );
		if (($date_info["wday"] == 0) or ($date_info["wday"] == 6) )  {
			$datecalc += 86400; // Add a day.
			continue;
		}
		$i++;
	}
	return $datecalc ;
}