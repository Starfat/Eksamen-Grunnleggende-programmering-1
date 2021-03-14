	function validerRegistrerFlygning()
	{
		var tilflyplass=document.getElementById("tilflyplass").value;
		var fraflyplass=document.getElementById("fraflyplass").value;
		
		var feilmelding = "";
		
		if (tilflyplass.lenght != 3)
		{
			feilmelding = "Feil format på flyplasskoden i Tilflyplass.</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. OSL</br></br>";
		}
		
		if (fraflyplass.lenght != 3)
		{
			feilmelding=feilmelding + "Feil format på flyplasskoden i Fraflyplass.</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. OSL";
		}
		
		if (feilmelding != "")
			
		{
			document.getElementById("section_right").style.fontWeight="900";	
			document.getElementById("section_right").style.color="red";	
			document.getElementById("section_right").innerHTML=feilmelding;
			return false;
		}  

		return true;
	}
	
	function validerregflyrute()
	{
		var fraflyplass = document.getElementById("fraflyplass").value;
		var tilflyplass = document.getElementById("tilflyplass").value;

		var feilmelding = "";
	
		if (fraflyplass.length != 3)
		{
			feilmelding = "Feil format på flyplasskoden i Fraflyplass.</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. OSL</br></br>";
		}
		
		if (tilflyplass.length != 3)
		{
			feilmelding = feilmelding + "Feil format på flyplasskoden i Tilflyplass.</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. OSL</br></br>";
		}

		if(feilmelding != "")
		{
			document.getElementById("section_right").style.fontWeight="900";
			document.getElementById("section_right").style.color="red";
			document.getElementById("section_right").innerHTML= feilmelding;
			
			return false;
		}

		return true;
	}
	
	function validerRegistrerFlyplasskode()
	{
		var flyplasskode = document.getElementById("flyplasskode").value;
	
		var feilmelding = "";
	
		if (flyplasskode.length != 3)
		{
			feilmelding = "Feil format på flyplasskoden</br>TIPS:</br>Flyplasskoder består av 3 bokstaver. </br>F.eks. OSL</br></br>";
		}

		if(feilmelding != "")
		{
			document.getElementById("section_right").style.fontWeight="900";
			document.getElementById("section_right").style.color="red";
			document.getElementById("section_right").innerHTML= feilmelding;
			
			return false;
		}

	return true;
	}
	