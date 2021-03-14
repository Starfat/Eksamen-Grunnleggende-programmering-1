<?php

/*  Validering for Register flygning */

function validerDato($dato)
{
	$lovlig_dato=true;
	
	if (!$dato)
		{
			$lovlig_dato=false;
		}
		
	else if (strlen($dato) != 10)
		{
			$lovlig_dato=false;
		}
		
	else
		{
			$tegn_0=$dato[0];
			$tegn_1=$dato[1];
			$tegn_2=$dato[2];
			$tegn_3=$dato[3];
			$tegn_4=$dato[4];
			$tegn_5=$dato[5];
			$tegn_6=$dato[6];
			$tegn_7=$dato[7];
			$tegn_8=$dato[8];
			$tegn_9=$dato[9];
		
			if ($tegn_0 < "0" || $tegn_0 > "9" || $tegn_1 < "0" || $tegn_1 > "9" || $tegn_2 < "0" || $tegn_2 > "9" || $tegn_3 < "0" || $tegn_3 > "9" || $tegn_4 != "-" || $tegn_5 < "0" || $tegn_5 > "9" || $tegn_6 < "0" || $tegn_6 > "9" || $tegn_7 != "-" || $tegn_8 < "0" || $tegn_8 > "9" || $tegn_9 < "0" || $tegn_9 > "9")
				{
					$lovlig_dato=false;
				}
		}
	return $lovlig_dato;
}

function validerFlightnr($flightnr)
{
	
	$lovlig_flightnr=true;
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flygning.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
 	
	While($linje = fgets($fil))
	{ 
		if ($linje!="")
		{
			$del=explode(";", $linje);
			$registrertflightnr=trim($del[0]);
			$registrerfraflyplass=trim($del[1]);
			$registrerttilflyplass=trim($del[0]);
			$registrertdato=trim($del[1]);
			
			if ($flightnr == $registrertflightnr)
			{
				$lovlig_flightnr=false;
			}
		}
	}
	fclose($fil);
	return $lovlig_flightnr;

}

function validerRegflygning($fraflyplass, $tilflyplass, $dato, $flightnr)
{
	$lovlig_regflygning=true;
	
	if (!$fraflyplass || !$tilflyplass || !$dato || !$flightnr)
		{
			$lovlig_regflygning=false;
		}
		
	return $lovlig_regflygning;
	
}

function validerFraTilflygning($fraflyplass, $tilflyplass)
{
	
	$lovlig_fratilflygning=false;
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flyrute.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
 	
	While($linje = fgets($fil))
	{ 
		if ($linje!="")
		{
			$del=explode(";", $linje);
			$registrertfraflyplass=trim($del[0]);
			$registrertilflyplass=trim($del[1]);
		
			if (($fraflyplass == $registrertfraflyplass) && ($registrertilflyplass == $tilflyplass))
			{
				$lovlig_fratilflygning=true;
			}
		}
	}
	fclose($fil);
	return $lovlig_fratilflygning;
}

/*  Validering for Registrer Flyplass */

function validerFlyplasskode($flyplasskode)
{
	
	$lovlig_flyplasskode=true;
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flyplass.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
 	
	While($linje = fgets($fil))
	{ 
		if ($linje!="")
		{
			$del=explode(";", $linje);
			$registrertflyplasskode=trim($del[0]);
			$flyplassnavn=trim($del[1]);
		
			if ($registrertflyplasskode == $flyplasskode)
			{
				$lovlig_flyplasskode=false;
			}
		}
	}
	
	fclose($fil);
	
	return $lovlig_flyplasskode;
}

function validerRegflyplass($flyplasskode, $flyplassnavn)
{
	$lovlig_regflyplass=true;
	
	if (!$flyplasskode || !$flyplassnavn)
		{
			$lovlig_regflyplass=false;
		}
		
	return $lovlig_regflyplass;
	
}


/*  Validering for Registrer flyrute */
/* flyplasskoden for fraflyplass i FLYRUTE skal være registrert i FLYPLASS
flyplasskoden for tilflyplass i FLYRUTE skal være registrert i FLYPLASS */

function validerFraflyplassFlyrute($fraflyplass)
{
	
	$lovlig_fraflyplass=false;
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flyplass.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
 	
	While($linje = fgets($fil))
	{ 
		if ($linje!="")
		{
			$del=explode(";", $linje);
			$flyplasskode=trim($del[0]);
			$flyplassnavn=trim($del[1]);
		
			if ($fraflyplass == $flyplasskode)
			{
				$lovlig_fraflyplass=true;
			}
		}
	}
	fclose($fil);
	return $lovlig_fraflyplass;
	
}

function validerTilflyplassFlyrute($tilflyplass)
{
	
	$lovlig_tilflyplass=false;
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flyplass.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
 	
	While($linje = fgets($fil))
	{ 
		if ($linje!="")
		{
			$del=explode(";", $linje);
			$flyplasskode=trim($del[0]);
			$flyplassnavn=trim($del[1]);
		
			if ($tilflyplass == $flyplasskode)
			{
				$lovlig_tilflyplass=true;
			}
		}
	}
	fclose($fil);
	return $lovlig_tilflyplass;
	
}

function validerFlyrute($fraflyplass, $tilflyplass)
{
	
	$lovlig_fratilflygning=true;
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flyrute.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
 	
	While($linje = fgets($fil))
	{ 
		if ($linje!="")
		{
			$del=explode(";", $linje);
			$registrertfraflyplass=trim($del[0]);
			$registrertilflyplass=trim($del[1]);
		
			if (($fraflyplass == $registrertfraflyplass) && ($registrertilflyplass == $tilflyplass))
			{
				$lovlig_fratilflygning=false;
			}
		}
	}
	fclose($fil);
	return $lovlig_fratilflygning;
}

function validerRegflyrute($fraflyplass, $tilflyplass)
{
	$lovlig_regflyrute=true;
	
	if (!$fraflyplass || !$tilflyplass)
		{
			$lovlig_regflyrute=false;
		}
		
	return $lovlig_regflyrute;
	
}

/*  Validering for Vis ankomster */

function validerAnkomst($flyplasskode)

{

	$lovlig_ankomst=true;
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flygning.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
 	
	While($linje = fgets($fil))
	{ 
		if ($linje!="")
		{
			$del=explode(";", $linje);
			$flightnr=trim($del[0]);
			$fraflyplass=trim($del[1]);
			$tilflyplass=trim($del[2]);
			$dato=trim($del[3]);
		
			if ($flyplasskode == $tilflyplass)
			{
				$lovlig_ankomst=false;
			}
		}
	}
	fclose($fil);
	
	return $lovlig_ankomst;
}


/*  Validering for Vis ankomster */

function validerAvgang($flyplasskode)

{

	$lovlig_ankomst=true;
	
	$filnavn="D:\\Sites\\home.hbv.no\\phptemp\\web-prg10v01/flygning.txt";
	$filoperasjon="r";
	$fil=fopen($filnavn, $filoperasjon);
 	
	While($linje = fgets($fil))
	{ 
		if ($linje!="")
		{
			$del=explode(";", $linje);
			$flightnr=trim($del[0]);
			$fraflyplass=trim($del[1]);
			$tilflyplass=trim($del[2]);
			$dato=trim($del[3]);
		
			if ($flyplasskode == $fraflyplass)
			{
				$lovlig_ankomst=false;
			}
		}
	}
	fclose($fil);
	
	return $lovlig_ankomst;
}


?>