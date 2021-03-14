<?php

	include("start.html");
	
?>
		<form method="post" action="" id="registrer_flyplass" name="registrer_flyplass" onSubmit="return validerRegistrerFlyplasskode()">
		
		<input type="text" id="flyplasskode" name="flyplasskode" placeholder="Registrer flyplass: flyplasskode" autofocus onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required>
		<br/>
		
		<input type="text" id="flyplassnavn" name="flyplassnavn" placeholder="Registrer flyplass: flyplassnavn" onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required>
		<br/>
		
		<input type="submit" value="Oppdater flyplasser" id="oppdater_flyplasser" name="oppdater_flyplasser"/>
		
		<input type="reset" value="Nullstill" id="nullstill" name="nullstill" onClick="fjernMelding()"/>
		</form>


<?php
	include("section_left.html");
	
	if (!empty($_POST['oppdater_flyplasser']))
	{
		include("valideringer.php");
		
		$flyplasskode=$_POST["flyplasskode"];	
		$flyplasskode=trim($flyplasskode);
		$flyplasskode=strtoupper($flyplasskode);
		
		$flyplassnavn=$_POST["flyplassnavn"];	
		$flyplassnavn=trim($flyplassnavn);
		
		$lovlig_regflyplass=validerRegflyplass($flyplasskode, $flyplassnavn);
		$lovlig_flyplasskode=validerFlyplasskode($flyplasskode);
		
		if (!$flyplasskode && !$flyplassnavn)
		{
			print ("<strong>Du må fylle ut alle feltene!</strong></br>");
		}
		
		else if (!$flyplasskode)
			
		{
			print ("<strong>Du må fylle ut feltet: flyplasskode!</strong><br/>");
		}
		
		else if(!$flyplassnavn)
		{
			print ("<strong>Du må fylle ut feltet: flyplassnavn!</strong><br/>");
		}
		
		if ($flyplasskode && $flyplassnavn)
		{
			if (!$lovlig_flyplasskode)
			{
				print("</br><strong>Flyplasskoden $flyplasskode er allerede i bruk. </br>Du må bruke en unik Flyplasskode.</strong></br>");
			}
		}
		
		if ($lovlig_flyplasskode && $lovlig_regflyplass)
		{
			$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flyplass.txt";
			$filoperasjon="a";
			$fil=fopen($filnavn, $filoperasjon);
			$linje=$flyplasskode.";". $flyplassnavn. "\n";
		
			fwrite($fil, $linje);
			fclose($fil);
			print ("<strong>Flyplass er registrert</strong></br>");
		}
	}
		
	include("section_right.html");
	include("slutt.html");

?>