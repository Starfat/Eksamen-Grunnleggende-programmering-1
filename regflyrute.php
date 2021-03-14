<?php

	include("start.html");
	
?>
		<form method="post" action="" id="registrer_flyrute" name="registrer_flyrute" onSubmit="return validerregflyrute()">
		
		<input type="text" id="fraflyplass" name="fraflyplass" autofocus placeholder="Registrer flyrute: fraflyplass" onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" onKeyUp="vis(this.value)" required>
		<br/>
		
		<input type="text" id="tilflyplass" name="tilflyplass" placeholder="Registrer flyrute: tilflyplass" onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required>
		<br/>
		
		<input type="submit" value="Oppdater flyruter" id="oppdater_flyruter" name="oppdater_flyruter"/>
		
		<input type="reset" value="Nullstill" id="nullstill" name="nullstill" onClick="fjernMelding()"/>
		</form>


<?php
	include("section_left.html");

	
	if (!empty($_POST['oppdater_flyruter']))
	{
		include("valideringer.php");
		
		$fraflyplass=$_POST["fraflyplass"];	
		$fraflyplass=trim($fraflyplass);
		$fraflyplass=strtoupper($fraflyplass);
		
		$tilflyplass=$_POST["tilflyplass"];	
		$tilflyplass=trim($tilflyplass);
		$tilflyplass=strtoupper($tilflyplass);
		
		$lovlig_regflyrute=validerRegflyrute($fraflyplass, $tilflyplass);
		$lovlig_fratilflygning=validerFlyrute($fraflyplass, $tilflyplass);
		$lovlig_fraflyplass=validerFraflyplassFlyrute($fraflyplass);
		$lovlig_tilflyplass=validerTilflyplassFlyrute($tilflyplass);
	
		if (!$tilflyplass && !$fraflyplass)
		{
			print ("<strong>Du må fylle ut alle feltene</strong></br>");
		}
		
		else if(!$fraflyplass)
			
		{
			print ("<strong>Du må fylle ut feltet: fraflyplass</strong><br/>");
		}
		
		else if(!$tilflyplass)
		{
			print ("<strong>Du må fylle ut feltet: tilflyplass</strong><br/>");
		}
		
		if ($tilflyplass && $fraflyplass)
		{
			if(!$lovlig_fratilflygning)
			{
				print ("</br><strong>Flyruten $fraflyplass - $tilflyplass er allerede registrert</br>Flyruter skal være unike</strong></br>");
			}
		}
		
		if ($tilflyplass && $fraflyplass)
		{
			if($tilflyplass == $fraflyplass)
			{
				print ("</br><strong>Flyruten: $fraflyplass - $tilflyplass er ikke gyldig</strong></br>");
			}
		}
		
		if ($tilflyplass && $fraflyplass)
		{
			if(!($tilflyplass == $fraflyplass))
			{
				if(!$lovlig_fraflyplass)
				{
					print("</br><strong>Flyplassen $fraflyplass i fraflyplass er ikke gyldig. </br>Du må bruke en allerede registrert flyplass</strong></br>");
				}
			}
		}
				
		if ($tilflyplass && $fraflyplass)
		{
			if(!($tilflyplass == $fraflyplass))
				{
				if(!$lovlig_tilflyplass)
				{
					print("</br><strong>Flyplassen $tilflyplass i tilflyplass er ikke gyldig. </br>Du må bruke en allerede registrert flyplass</strong></br>");
				}
			}
		}
		
		if ($lovlig_tilflyplass && $lovlig_fraflyplass && ($tilflyplass != $fraflyplass) && $lovlig_fratilflygning && $lovlig_fratilflygning)
		{
			$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flyrute.txt";
			$filoperasjon="a";
			$fil=fopen($filnavn, $filoperasjon);
			$linje=$fraflyplass.";". $tilflyplass. "\n";
		
			fwrite($fil, $linje);
			fclose($fil);
			print ("<strong>Flyrute er registrert</strong></br>");
		}
	}
		
	include("section_right.html");
	include("slutt.html");

?>