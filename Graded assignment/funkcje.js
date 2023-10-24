function czas() 
{
	let dzis = new Date();

	let dzien = dzis.getDate();
	if (dzien<10) dzien = "0"+dzien;
	let miesiac = dzis.getMonth()+1;
	if (miesiac<10) miesiac = "0"+miesiac;
	let rok = dzis.getFullYear();

	let godzina = dzis.getHours();
		if(godzina<10) godzina = "0"+godzina
	let minuta = dzis.getMinutes();
		if(minuta<10) minuta = "0"+minuta
	let sekunda = dzis.getSeconds();
		if(sekunda<10) sekunda = "0"+sekunda;

	zegar.innerHTML = dzien+"/"+miesiac+"/"+rok+" "+godzina+":"+minuta+":"+sekunda;

	setTimeout(czas,1000);
}

window.addEventListener("load",czas);

var slide = 1;
function slajd()
{
	slide++;
	if(slide>4)
	{
		slide=1;
	}
	var plik = "<img src=\"grafika/slajd"+slide+".jpg\"/>";
	document.getElementById("slajder").innerHTML = plik;

	setTimeout(slajd,5000);
}
window.addEventListener("load",slajd);

function login()
{
	var login = document.getElementById("log").value;
	var pass = document.getElementById("pass").value;
	var rad1 = document.getElementById("rad1").checked;
	var rad2 = document.getElementById("rad2").checked;
	if(login!=0)
	{
		if(pass!=0)
		{
			if(rad1!=0)
			{
				document.getElementById("zalog").innerHTML="Jesteś zalogowany/a jako: "+login;
			}
			else if(rad2!=0)
			{
				document.getElementById("zalog").innerHTML="Jesteś zalogowany/a jako: "+login;
			}
			else 
			{
				document.getElementById("zalog").innerHTML="Wybierz płeć";
			}
			
		}
		else
		{
			document.getElementById("zalog").innerHTML="Podaj hasło";
		}
	}
	else
	{
		document.getElementById("zalog").innerHTML="Podaj login";
	}

}