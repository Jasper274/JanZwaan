$(function(){
	
	var update = function(){
		// Get data from the form
		var data = $('form').serializeArray();
		
		// Make start & end times into dates
		// This should probably be turned in to a loop
		var timeStart = JSON.stringify(data[0].value);
			 timeStart = timeStart.replace(/\"/g, '');
			 timeStart = new Date("1970-1-1 " + timeStart);
		
		var timeEnd = JSON.stringify(data[1].value);
		    timeEnd = timeEnd.replace(/\"/g, '');
			 timeEnd = new Date("1970-1-1 " + timeEnd);
		
		// Translate break time into ms?
		var timeBreak = JSON.stringify(data[2].value);
			 timeBreak = timeBreak.replace(/\"/g, '');
			 timeBreak = Math.floor(timeBreak * 60 * 1000);
		
		// Calculate time difference and remove break time
		var timeWorked = timeEnd - timeStart;
			 timeWorked = timeWorked - timeBreak;
		
		// Calculate hours and minutes worked
		var hours = Math.floor(timeWorked / (1000 * 60 * 60));
			 timeWorked -= hours * (1000 * 60 * 60);
		var minutes = Math.floor(timeWorked / (1000 * 60));
		var convertedMinutes = Math.round((minutes / 60) * 100);
		
		// Output the standard hours and minutes
		if (hours < 1) {
			$('#outputStandard').text("Jij hebt gewerkt " + minutes + " minuten.");
		} else if (hours > 1) {
			$('#outputStandard').text("Jij hebt gewerkt " + hours + " uur en " + minutes + " minuten.");
		} else if (hours = 1) {
			$('#outputStandard').text("Jij hebt gewerkt " + hours + " uur en " + minutes + " minuten.");
		} else {
			$('#outputStandard').text("Jij hebt gewerkt");
		}
		
		// Output the converted hours and minutes
		
		
	}
	
	// Update the result when the form changes
	//$("form").submit(update);
	$('form').change(update);
});