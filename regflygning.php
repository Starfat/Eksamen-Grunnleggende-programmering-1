<?php

	include("start.html");
	
?>
		<form method="post" action="" id="registrer_flygning" name="registrer_flygning" onSubmit="return validerregflyrute()">

		<input type="text" id="flightnr" name="flightnr" placeholder="Registrer flygning: flightnr" autofocus onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required>
		<br/>
		
		<input type="text" id="fraflyplass" name="fraflyplass" placeholder="Registrer flygning: fraflyplass" onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required>
		<br/>
		
		<input type="text" id="tilflyplass" name="tilflyplass" placeholder="Registrer flygning: tilflyplass" onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required>
		<br/>
		
		<input type="text" id="dato" name="dato" placeholder="Registrer flygning: dato" onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required>
		<br/>
		
		<input type="submit" value="Oppdater flygninger" id="oppdater_flygninger" name="oppdater_flygninger"/>
		
		<input type="reset" value="Nullstill" id="nullstill" name="nullstill"name="nullstill" onClick="fjernMelding()"/>
		</br>
		</form>
		
<?php
	include("section_left.html");

	if (!empty($_POST['oppdater_flygninger']))
	{
		include("valideringer.php");
		
		$fraflyplass=$_POST["fraflyplass"];	
		$fraflyplass=trim($fraflyplass);
		$fraflyplass=strtoupper($fraflyplass);
		
		$tilflyplass=$_POST["tilflyplass"];	
		$tilflyplass=trim($tilflyplass);
		$tilflyplass=strtoupper($tilflyplass);
		
		$dato=$_POST["dato"];	
		$dato=trim($dato);
				
		$flightnr=$_POST["flightnr"];
		$flightnr=trim($flightnr);
		$flightnr=strtoupper($flightnr);
		
		$lovlig_regflygning=validerRegflygning($fraflyplass, $tilflyplass, $dato, $flightnr);
		$lovlig_dato=validerDato($dato);
		$lovlig_flightnr=validerFlightnr($flightnr);
		$lovlig_fratilflygning=validerFraTilflygning($fraflyplass, $tilflyplass);
		
		if(!$fraflyplass && !$tilflyplass && !$dato && !$flightnr) // Sjekker om alle feltene er fyllt ut
		{
			print("<strong>Du må fylle ut alle feltene</strong></br>");
		}
		
		// Sjekker om ett av feltene ikke er fyllt ut
		
		else if(!$fraflyplass && $tilflyplass && $dato && $flightnr)
			
		{
			print ("<strong>Du må fylle ut feltet: fraflyplass</strong><br/>");
		}
		
		else if($fraflyplass && !$tilflyplass && $dato && $flightnr)
			
		{
			print ("<strong>Du må fylle ut feltet: tilflyplass</strong><br/>");
		}
		
		else if($fraflyplass && $tilflyplass && !$dato && $flightnr)
			
		{
			print ("<strong>Du må fylle ut feltet: dato</strong><br/>");
		}
		
		else if($fraflyplass && $tilflyplass && $dato && !$flightnr)
			
		{
			print ("<strong>Du må fylle ut feltet: flightnr</strong><br/>");
		}

		
		// sjekker om to av feltene ikke er fyllt ut
		
		else if(!$fraflyplass && !$tilflyplass && $dato && $flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>fraflyplass og tilflyplass</strong><br/>");
		}
		
		else if(!$fraflyplass && $tilflyplass && !$dato && $flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>fraflyplass og dato</strong><br/>");
		}
		else if(!$fraflyplass && $tilflyplass && $dato && !$flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>flightnr og fraflyplass</strong><br/>");
		}
		
		else if($fraflyplass && !$tilflyplass && !$dato && $flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>tilflyplass og dato</strong><br/>");
		}
		else if($fraflyplass && !$tilflyplass && $dato && !$flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>flightnr og tilflyplass</strong><br/>");
		}
		
		else if($fraflyplass && $tilflyplass && !$dato && !$flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>flightnr og dato</strong><br/>");
		}
		
		// Sjekker om 3 av feltene ikke er fyllt ut
		
		
		else if(!$fraflyplass && !$tilflyplass && !$dato && $flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>fraflyplass, tilflyplass og dato</strong><br/>");
		}
		
		else if(!$fraflyplass && !$tilflyplass && $dato && !$flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>flightnr, fraflyplass og tilflyplass</strong><br/>");
		}
		else if(!$fraflyplass && $tilflyplass && !$dato && !$flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>flightnr, fraflyplass og dato</strong><br/>");
		}
		
		else if($fraflyplass && !$tilflyplass && !$dato && !$flightnr)
			
		{
			print ("<strong>Du må fylle ut feltene: <br/>flightnr, tilflyplass og dato</strong><br/>");
		}
		
		
		if($lovlig_regflygning)
		{
			if (!$lovlig_dato)
			{
				print('</br><strong>Det er feil format på dato.</br>TIPS: Dato registreres på formen</br> ÅÅÅÅ-MM-DD. </br>F.eks. "2016-12-08"</strong></br>');
			}
		}
		
		if($lovlig_regflygning)
		{
			if (!$lovlig_flightnr)
			{
				print("</br><strong>Flightnr: $flightnr er allerede i bruk. </br>Du må bruke et unikt Flightnr.</strong></br>");
			}
		}
		
		if($lovlig_regflygning)
		{
			if (!($tilflyplass == $fraflyplass))
			{
				if (!$lovlig_fratilflygning)
				{
					print("</br><strong>Flyruten $fraflyplass - $tilflyplass eksisterer ikke. </br>Du må bruke en allerede registrert flyrute</strong></br>");
				}
			}	
		}
		
		if($lovlig_regflygning)
		{
			if($tilflyplass == $fraflyplass)
			{
				print ("</br><strong>Flyruten $fraflyplass - $tilflyplass er ikke gyldig</strong></br>");
			}
		}
		
		if ($lovlig_regflygning && $lovlig_fratilflygning && $lovlig_regflygning && $lovlig_dato && $lovlig_flightnr && ($tilflyplass != $fraflyplass))
		{
			$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flygning.txt";
			$filoperasjon="a";
			$fil=fopen($filnavn, $filoperasjon);
			$linje=$flightnr.";". $fraflyplass.";". $tilflyplass.";". $dato.";". "\n";
			
			fwrite($fil, $linje);
			fclose($fil);
			print ("<strong>Flygning er registrert</strong></br>");
		}
	}
	
	include("section_right.html");
	include("slutt.html");

?>