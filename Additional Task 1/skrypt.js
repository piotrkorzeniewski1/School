function zamowienia()
{

	let suma = 0;

	if(document.getElementById("check1").checked)
	{
		suma=suma+(document.getElementById("ilosc1").value*9);
	}

	if(document.getElementById("check2").checked)
	{
		suma=suma+(document.getElementById("ilosc2").value*50);
	}

	if(document.getElementById("check3").checked)
	{
		suma=suma+(document.getElementById("ilosc3").value*30);
	}

	if(document.getElementById("check4").checked)
	{
		suma=suma+(document.getElementById("ilosc4").value*15);
	}

	document.getElementById("oplata").innerHTML = "Do zapłaty: " + suma;
}