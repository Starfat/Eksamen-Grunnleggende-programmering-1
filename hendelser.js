	function fokus(element)
	{	
		element.style.background="yellow";
	}  


	function mistetFokus(element)
	{
		element.style.background="white";
	}  


	function musInn(element)
	{
		document.getElementById("section_right").style.fontWeight="900";	
		document.getElementById("section_right").style.color="black";	
		if (element==document.getElementById("flyplasskode"))
		{
			document.getElementById("section_right").innerHTML='Skriv inn flyplasskode.</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. "OSL"';
		}
		if (element==document.getElementById("flyplassnavn"))
		{
			document.getElementById("section_right").innerHTML='Skriv inn Flyplassnavn.</br>TIPS:</br>Flyplassnavnet er fritekst. </br>F.eks. "Oslo Gardermoen"';
		}
		if (element==document.getElementById("fraflyplass"))
		{
			document.getElementById("section_right").innerHTML='Skriv inn flyplasskode.</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. "OSL"';
		}
		if (element==document.getElementById("avgang_sok"))
		{
			document.getElementById("section_right").innerHTML='Skriv inn flyplasskode.</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. "OSL"';
		}
		if (element==document.getElementById("ankomst_sok"))
		{
			document.getElementById("section_right").innerHTML='Skriv inn flyplasskode.</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. "OSL"';
		}
		if (element==document.getElementById("tilflyplass"))
		{
			document.getElementById("section_right").innerHTML='Skriv inn flyplasskode.</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. "OSL"';
		}  
		if (element==document.getElementById("flightnr"))
		{
			document.getElementById("section_right").innerHTML='Skriv inn flightnr.</br>TIPS:</br>Flightnr består av 2 bokstaver og 3 tall. </br>F.eks. "BA101"';
		}
		if (element==document.getElementById("dato"))
		{
			document.getElementById("section_right").innerHTML='Skriv inn dato.</br>TIPS:</br>Dato registreres på formen ÅÅÅÅ-MM-DD. </br>F.eks. "2016-12-08"';
		}
	}  

	function musUt()
	{
		document.getElementById("section_right").innerHTML="";
	}  


	function fjernMelding()
	{
		document.getElementById("section_right").innerHTML="";   
	}  

