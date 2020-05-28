function outsideClick(event, notelem)	{
    var clickedOut = true, 
    	i, 
    	len = notelem.length;
    if(typeof len == 'undefined'){
		if (event.target == notelem || notelem.contains(event.target)) {
            clickedOut = false;
        }
    }else{
    	for (i = 0;i < len;i++)  {
	        if (event.target == notelem[i] || notelem[i].contains(event.target)) {
	            clickedOut = false;
	        }
	    }
    }
    if (clickedOut) 
    	return true;
    else 
    	return false;
}