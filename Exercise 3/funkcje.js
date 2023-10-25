function ile()
{
	let km = parseInt(document.getElementById("km").value)
	let l = parseInt(document.getElementById("litry").value)
	if(km>0 && l>0)
	{
		let ilosc = km/100 * l;
		wynik.innerHTML = "Potrzebujesz " + Math.round(ilosc) + " litrów paliwa. Zapraszamy na zakupy";
	}
	else
	{
		alert("Podaj km i litry!!!");
	}

}
window.onload = function(){
document.getElementById("kliknij").onclick = function() {ile()}
}