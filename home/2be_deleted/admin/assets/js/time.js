function checkTime(m) {
	if (m < 10) 
		m = "0" + m	// add zero in front of minutes < 10
	return m
}
function twelvehour(h) {
	if (h>12){
		var f = h-12
		return f;
		//console.log("h>12")
	}
	if (h==0){
		return 12
		//console.log("h==12")
	}
	else	
		return h
}
//return post or ante depending on time of day

function get_ampm(h){
	if (h<12)
		return "AM"
	if (h>=12)
	   return "PM"
}
function start() {
	var today = new Date()
	var h = today.getHours()
	var m = today.getMinutes()
	//console.log("h: "+h)
	var ampm = get_ampm(h)

	//clean both sources
	m = checkTime(m)	//add leading 0 for minutes > 10
	//h = twelvehour(h)	//changes to 12hr format

	//write time to screen
    document.getElementById('time').innerHTML = h + ":" + m // + " " + ampm
	//Since we aren't printing seconds, we can wait longer to call the function again
    var t = setTimeout(start, 2*1000) //every 2 seconds
}

var _hide_details = false
var count = 0

//hides details when toggled
function toggle(){
	//console.log(":toggle initiated:")
	var info = document.getElementById('time');
	
	//toggle the state
	if(_hide_details == false)
		_hide_details = true
	else
		_hide_details = false
	
	
	//if true and if the counter is even, hide info
	if(_hide_details == true && count%2==0){
		info.style.display = 'none'
		//console.log("Hiding Info")
	}
	else{
		info.style.display = 'block'
		//console.log("Showing Info")
	}
		
	
	count++
	//console.log(":complete:"+_hide_details)
}