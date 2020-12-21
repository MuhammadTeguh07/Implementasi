var c = 0; max_count = 10; logout = true;
startTimer();
function startTimer(){
	setTimeout(function(){
		logout = true;
		c = 0; 
		max_count = 10;
		$('#timer').html(max_count);
		$('#logout_popup').modal('show');
		startCount();

	}, 30*60*1000);
}
 
function resetTimer(){
	logout = false;
	$('#logout_popup').modal('hide');
	startTimer();
}

function timedCount() {
    c = c + 1;
   	remaining_time = max_count - c;
   	if( remaining_time == 0 && logout ){
   		$('#logout_popup').modal('hide');
		window.location = "/";

	}else{
    	$('#timer').html(remaining_time);
    	t = setTimeout(function(){timedCount()}, 1000);
	}
}

function startCount() {
   timedCount();
}