function vis(fraflyplass)
{
  var foresporsel=new XMLHttpRequest();
  
  foresporsel.onreadystatechange=function() 
    {
      if (foresporsel.readyState==4 && foresporsel.status==200)
        {
			document.getElementById("section_right").style.color="blue";
			document.getElementById("section_right").innerHTML=foresporsel.responseText; 
        }
    }

  foresporsel.open("GET","fraflyplassok.php?fraflyplass="+fraflyplass);
  foresporsel.send(); 
}