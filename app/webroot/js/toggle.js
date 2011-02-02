
/* This script and many more are available free online at
The JavaScript Source :: http://javascript.internet.com
Created by: Ultimater, Mr J :: http://www.webdeveloper.com/forum/showthread.php?t=77389 */

function toggle(a)
{
	var e = document.getElementById(a);
 	if(!e) return true;
  	if(e.style.display == "none")
  	{
   	    e.style.display = "block"
 	}
  	else
  	{
   	    e.style.display = "none"
  	}
  	return true;
}
function show(a,b,c,d)
{
	var e = document.getElementById(a);
	var e1 = document.getElementById(b);
	var e2 = document.getElementById(c);
	var e3 = document.getElementById(d);
	
	if(!e) return true;
  	e.style.display = "block";
	e1.style.display = "none";
	e2.style.display = "none";
	e3.style.display = "none";
		
 	return true;
}