<?php

	include("start.html");
	
?>
		<form method="post" action="" id="ankomst" name="ankomst" onSubmit="return validerRegistrerFlyplasskode()">
		
		<input type="text" id="flyplasskode" name="flyplasskode" placeholder="Søk ankomst med flyplasskode" autofocus onFocus="fokus(this)" onBlur="mistetFokus(this)" onMouseOver="musInn(this)" onMouseOut="musUt()" required>
		<br/>
		
		<input type="submit" value="Vis ankomster" id="vis_ankomster" name="vis_ankomster"/>
		
		<input type="reset" value="Nullstill" id="nullstill" name="nullstill" onClick="fjernMelding()"/>
		</form>


<?php

	include("section_left.html");

	
	if (!empty($_POST['vis_ankomster'])) 
	{		
		include("valideringer.php");
		
		$flyplasskode=$_POST["flyplasskode"];	
		$flyplasskode=trim($flyplasskode);
		$flyplasskode=strtoupper($flyplasskode);
		
		$lovlig_ankomst=validerAnkomst($flyplasskode);
		
		if (!$flyplasskode)
		{
			print ("<strong>Angi flyplasskode</strong></br>");
		}
		
		else if ($lovlig_ankomst)
		{
			print ("<strong>Det finnes ingen registrerte ankomster til $flyplasskode</br>");
		}
		
		else
		{		
			$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flygning.txt";
			$filoperasjon="r";
			$fil=fopen($filnavn, $filoperasjon);
			print ("</br><table border=1 class='table_2'>"); 
			print ("<TR><TD><strong>Flightnr</strong></TD><TD><strong>Fraflyplass</strong></TD><TD><strong>Tilflyplass</strong></TD><TD><strong>Dato</strong></TD></TR>"); 
		
			while($linje = fgets($fil))
			{
				if ($linje!="")
				{
					$del=explode(";", $linje);
					$flightnr=trim($del[0]);
					$fraflyplass=trim($del[1]);
					$tilflyplass=trim($del[2]);
					$dato=trim($del[3]);
					
					if($flyplasskode==$tilflyplass)
					{
						print ("<tr><td>"); 
						print ($flightnr);
						print ("</td><td>");   
						print ($fraflyplass);
						print ("</td><td>");    
						print ($tilflyplass);
						print ("</td><td>");    
						print ($dato);
						print ("</TD></tr>");  
					}
				}
			}
			print ("</table>");
			fclose($fil);
		}
	}
	include("section_right.html");
	include("slutt.html");

?>