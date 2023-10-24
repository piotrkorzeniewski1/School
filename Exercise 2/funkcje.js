function check()
{
	var a = parseInt(document.getElementById("l1").value);
	var b = parseInt(document.getElementById("l2").value);
	var c = parseInt(document.getElementById("l3").value);
	if(a ==false || a<0 || b == false || b<0 || c == false || c<0)
	{
		alert("Musisz podać wszystkie 3 liczby większe od zera");
	}
	else
	{
		var naj = a;
		if(naj > b)
		{
			naj=b;
		}
		else if(naj > c)
		{
			naj = c;
		}

		document.getElementById("naj").innerHTML= naj;
	}
}
function prze()
{
	var a = parseInt(document.getElementById("l1").value);
	var b = parseInt(document.getElementById("l2").value);
	var c = parseInt(document.getElementById("l3").value);

	if(a ==false || a<0 || b == false || b<0 || c == false || c<0)
	{
		alert("Musisz podać wszystkie 3 liczby większe od zera");
	}
	else
	{
		if(a>b)
		{
			var buffor = b;
			b=a;
			a=buffor;
		}
		if(c >= a && c <= b)
		{
			document.getElementById("czy").innerHTML= "Liczba należy do przedziału";
		}
		else
		{
			document.getElementById("czy").innerHTML= "Liczba nienależy do przedziału";
		}
	}
}