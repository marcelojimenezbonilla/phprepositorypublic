// JavaScript Document

function procesar_validar_registro()
{
   var cod = document.forms["form1"]["txtcodigo"].value;
   if (cod == "") 
   {
	   alert("Codigo no valido");
	   return false;
  	}
	else
		{
		  document.forms["form1"].submit();	//recin llama al php a la secion action del form
		  //return true;	
		}
	
}