<?php

	include("start.html");
	include("section_left.html");
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flyrute.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
	print ("</br><table border=1>"); 
	print ("<TR><TD><strong>Fraflyplass</strong></TD><TD><strong>Tilflyplass</strong></TD></TR>"); 
	
	While($linje = fgets($fil))
		{
			$del=explode(";", $linje);
			$fraflyplass=trim($del[0]);
			$tilflyplass=trim($del[1]);
				
			print ("<tr><td>");
			print ($fraflyplass);
			print ("</td><td>");
			print ($tilflyplass);
			print ("</TD></tr>");
		}
	
	print ("</table>"); 		
	fclose($fil);
	
	include("section_right.html");
	include("slutt.html");

?>