function oblicz()
{
	let metryx = parseInt(document.getElementById('metryx').value);
	let metryy = parseInt(document.getElementById('metryy').value);
	if(metryx <=  0 ||  metryy <= 0)
	{

	}
	else
	{
		let wynik = (metryx * 2 * 2.7) + (metryy * 2 * 2.7);
		pc.innerHTML = "Powierzchnia całkowita ścian: " + wynik;
		koszt.innerHTML = "Koszt malowania: " + wynik * 8+ " zł";
	}
}