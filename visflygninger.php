<?php

	include("start.html");
	include("section_left.html");	
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flygning.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
	
	print ("</br><table border=1>"); 
	print ("<TR><TD><strong>Flightnr</strong></TD><TD><strong>Fraflyplass</strong></TD><TD><strong>Tilflyplass</strong></TD><TD><strong>Dato</strong></TD></TR>"); 
	
	While($linje = fgets($fil))
		{
			$del=explode(";", $linje);
			$flightnr=trim($del[0]);
			$fraflyplass=trim($del[1]);
			$tilflyplass=trim($del[2]);
			$dato=trim($del[3]);
			
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
	
	print ("</table>"); 
	
	fclose($fil);
	
	include("section_right.html");
	include("slutt.html");
	
?>