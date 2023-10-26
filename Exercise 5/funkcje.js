function red()
{
	var zmienna = "red";
	let prc = parseInt(document.getElementById("prc").value)
	przykladd.style.color = zmienna;
	document.getElementById("przykladd").style.fontSize = prc + "%";
	let x = document.getElementById("myselect").value
	if(x==2)
	{
		 document.getElementById("przykladd").style.fontStyle = "italic";
	}
}
function blue()
{
	var zmienna = "blue";
	let prc = parseInt(document.getElementById("prc").value)
	przykladd.style.color = zmienna;
	document.getElementById("przykladd").style.fontSize = prc + "%";
	if(x==2)
	{
		 document.getElementById("przykladd").style.fontStyle = "italic";
	}
}
function green()
{
	var zmienna = "green";
	let prc = parseInt(document.getElementById("prc").value)
	przykladd.style.color = zmienna;
	document.getElementById("przykladd").style.fontSize = prc + "%";
	if(x==2)
	{
		 document.getElementById("przykladd").style.fontStyle = "italic";
	}
}
