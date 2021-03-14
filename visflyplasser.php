<?php

	include("start.html");
	include("section_left.html");
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flyplass.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
	print ("</br><table border=1>"); 
	print ("<TR><TD><strong>Flyplasskode</strong></TD><TD><strong>Flyplassnavn</strong></TD></TR>"); 
	
	While($linje = fgets($fil))
		{
			$del=explode(";", $linje);
			$flyplasskode=trim($del[0]);
			$flyplassnavn=trim($del[1]);
				
			print ("<tr><td>");
			print ($flyplasskode);
			print ("</td><td>");
			print ($flyplassnavn);
			print ("</TD></tr>");
		}
	
	print ("</table>"); 		
	fclose($fil);
	include("section_right.html");
	include("slutt.html");

?>