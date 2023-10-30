function zamow()
{
	let numer = parseInt(document.getElementById("numer").value);
	let cena = 0;
	if(numer==1 || numer==2 || numer==3)
	{
		let waga = parseInt(document.getElementById("waga").value);
		if(numer==1)
		{
			cena = 5;
		}
		else if(numer==2)
		{
			cena = 7;
		}
		else
		{
			cena = 6;
		}
		cena = cena * waga;
		document.getElementById("wynik").innerHTML = "Koszt wynosi: "+cena+" zł";

	}
	else
	{
		document.getElementById("wynik").innerHTML = "Koszt wynosi: 0 zł";
	}
}