// JavaScript Document

function validaApenasNumerosString(string){
    var numsStr = string.replace(/[^0-9]/g,'');
    return numsStr;
}
  
//Marca e desmarca os checkboxes da p�gina
function MarcarDesmarcarTodos(FormNome, Tipo, NomeCheck) {
  var elementos = FormNome.elements;
  for(i=0; i < elementos.length; i++){
	 if (elementos[i].type == Tipo) {
		  if (elementos[i].checked) {
			 if (elementos[i].name==NomeCheck) {
			    elementos[i].checked = false; 
			 }
		  }else{
		     if (elementos[i].name==NomeCheck) {
			    elementos[i].checked = true; 
			 }
		  }
	 }
  }	 
}



//Verifica se pelo menos 1 checkbox foi marcado
function MarcouCheckBox(FormNome, Tipo, NomeCheck) {
  var elementos = FormNome.elements;
  var qtdmarcados = 0;
  for(i=0; i < elementos.length; i++){
	 if (elementos[i].type == Tipo) {
		  if (elementos[i].checked) {
			 if (elementos[i].name==NomeCheck) {
			    qtdmarcados ++; 
			 }
		  }
	 }
  }
  if (qtdmarcados==0) {
	 alert("Selecione pelo menos 1 item !");
	 return false;
  }
  return true;
}
//Fun��o que submete um determinado formul�rio
function SubmeterFormulario(NumForm) {
	window.document.forms[NumForm].submit();
}


//Verifica se pelo menos 1 radiobutton foi marcado
function MarcouRadioButton(FormNome, Tipo, NomeCheck, NomeCampo) {
  var elementos = FormNome.elements;
  var qtdmarcados = 0;
  for(i=0; i < elementos.length; i++){
	if (elementos[i].type == Tipo) {
		  if (elementos[i].checked) {
			 if (elementos[i].name==NomeCheck) {
			    qtdmarcados ++; 
			 }
		  }
	 }
  }
  if (qtdmarcados==0) {
	 alert("Selecione pelo menos 1 " + NomeCampo + "!");
	 return false;
  }
  return true;
}

//Verifica se pelo menos 1 checkbox foi marcado
function MarcouCheckBox(FormNome, Tipo, NomeCheck, NomeAlerta) {
  var elementos = FormNome.elements;
  var qtdmarcados = 0;
  for(i=0; i < elementos.length; i++){
	 if (elementos[i].type == Tipo) {
		  if (elementos[i].checked) {
			 if (elementos[i].name==NomeCheck) {
			    qtdmarcados ++; 
			 }
		  }
	 }
  }
  if (qtdmarcados==0) {
	 alert("Selecione pelo menos 01 " + NomeAlerta + " ! ");
	 return false;
  }
  return true;
}

//Verifica se os campos selects e textos
function Validar(FormNome) {
  var elementos = FormNome.elements;
  var qtdmarcados = 0;
  for(i=0; i < elementos.length; i++){
	 if (elementos[i].type=="text" || elementos[i].type=="select-one" ||    elementos[i].type=="password" ) {
	    if (elementos[i].value=="" ) {
		    alert("Informe o campo : " + elementos[i].name);
			elementos[i].focus();
			return false;
		}
		}
		
	/*	else if (elementos[i].type=="radio"){
		if (elementos[i].checked) {
		qtdmarcados++;
		
		}
		if (qtdmarcados==0){
		alert("Voc� precisa selecionar o chefe da equipe " );
			
		    return false;
		 
	 }
	 else 
	 return true;	 
	} 
	 */
  }
  return true;
}

// valida campos especificos do form, com resposta espec�fica
function validate_required(field1,field2,alerttxt)
{
	with (field1,field2)
	  {
	  if (value==null||value=="")
		{
		alert(alerttxt);return false;
		}
	  else
		{
		return true;
		}
	  }
}
/*
// valida email
function validate_email(field,alerttxt)
{
	with (field)
	  {
	  apos=value.indexOf("@");
	  dotpos=value.lastIndexOf(".");
	  if (apos<1||dotpos-apos<2)
		{alert(alerttxt);return false;}
	  else {return true;}
	  }
}
*/
//Verifica se os campos selects e textos
function ValidarTextSelectTextArea(FormNome) {
  var elementos = FormNome.elements;
  var qtdmarcados = 0;
  for(i=0; i < elementos.length; i++){
	 if (elementos[i].type=="text" || elementos[i].type=="select-one" || elementos[i].type=="textarea") {
	    if (elementos[i].value=="" ) {
		    alert("Informe o campo : " + elementos[i].name);
			elementos[i].focus();
			return false;
		}
	 }
  }
  return true;
}


// Abre a url em uma janela PopUp
function janelaPopUp(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}


// Faz um bot�o acionar uma url (George)
function goToURL(url, target) { //v3.0
  var comando = '';
  if (target == '')
    comando = "document.location='"+ url +"'";
  else
    comando = "parent.frames['" + target + "'].document.location='"+ url +"'";
  eval(comando);
}

// Mascaras (George)
function mascara(field, mask) {
  stringFinal=new Array(1);
  var maximo = mask.length;
  var maxDig = field.value.length;
  var i = 0;
  var total = 0;
//  alert ("N " + maxDig);
  if (maxDig > 0 && maxDig <= maximo) {
    while ( i < maxDig && total < maximo) {
      var caracter = mask.charAt(i);
      var caracterDig = field.value.charAt(i);
      if (caracter == '9' || caracter =='0') {

	// Validando o tipo do caracter
	 if (tipo(caracterDig, caracter) ) {
	   stringFinal[total] = caracterDig;
	 } else {
          stringFinal[total] = '';
         }
      } else {
        if (caracter == 'L' || caracter == 'l' ) {
 	  stringFinal[i] = tipoLiteral(caracterDig, caracter);	
        } else if (caracter == '#' ) {
 	    stringFinal[i] = caracterDig;
        } else {
          if (caracter == caracterDig) {
	    stringFinal[i] = caracter;
	  } else {
	    stringFinal[total] = caracter;
	    total++;
	    stringFinal[total] = caracterDig;
	  }
        }
      }
      i++;
      total++;  
    }

    i = 0;
    var tempString=new String("");
    while ( i < total ) {
  	  tempString = tempString + stringFinal[i];
	  i++;
    }
  } else {
    var i = 0;
	var tempString=new String("");
    while ( i < (maximo) ) {
  	  tempString = tempString + field.value.charAt(i);
	  i++;
    }
  }
  field.value = tempString;
}




// Passa para o pr�ximo campo (Z� Maria)
function autoTab(input, e) {
  var len = input.maxLength;
  var isNN = (navigator.appName.indexOf("Netscape")!=-1);
  var keyCode = (isNN) ? e.which : e.keyCode;
  var filter = (isNN) ? [0,8,9] : [0,8,9,16,17,18,37,38,39,40,46];
  if(input.value.length == len && !containsElement(filter,keyCode)) {
//  if(input.value.length == len) {
    input.value = input.value.slice(0, len);
    var indice = getIndex(input) + 1;
    input.form[(indice) % input.form.length].focus();
   }
}

// Ze Maria
function containsElement(arr, ele) {
  var found = false, index = 0;
  while(!found && index < arr.length)
    if(arr[index] == ele)
      found = true;
    else
     index++;
  return found;
}

//  Ze Maria
function getIndex(input) {
  var index = -1, i = 0, found = false;
  while (i < input.form.length && index == -1)
   if (input.form[i] == input)
     index = i;
   else
     i++;
  return index;
}

// Verifica o tipo do caracter
function tipo (valor , tipo) {
  if (tipo == '9' || tipo == '0')
    return tipoNumerico(valor);
  else
    return true;
}

// Testa o tipo N�mero
function tipoNumerico(valor) {
  // Verificando o tipo num�rico
  if (valor == 1 || valor == 2 || valor == 3 || valor == 4 ||
      valor == 5 || valor == 6 || valor == 7 || valor == 8 ||
      valor == 9 || valor == 0) 
  	return true;
  else
  	return false;
}

// Testa o tipo Literal
function tipoLiteral(valor, mask) {
  // Verificando o tipo num�rico
  if (mask == 'L' ) 
    return valor.toUpperCase();
  if (mask == 'l' ) 
    return valor.toLowerCase();
}


function GoAddressWindow(w, url, larg, alt)
{
 if ("undefined" != typeof(GoAddressWindowOld))
 {
   GoAddressWindowOld(w, url, larg, alt);
 }
}


function GoAddressWindowOld(est, url1, larg, alt)
{
 var url = url1;
 var hWnd =  window.open(url,"HelpWindow","width=" + larg + ",height=" + alt + ",resizable=no,scrollbars=yes");
 if ((document.window != null) && (!hWnd.opener))
   hWnd.opener = document.window;
}


// Ze Maria
function placeFocus() {
  if (document.forms.length > 0) {
    var field = document.forms[0];
    for (i = 0; i < field.length; i++) {
      if (  (field.elements[i].type == "text") ||
	      (field.elements[i].type == "textarea") ||
		  (field.elements[i].type.toString().charAt(0) == "s")) {
	field.elements[i].focus();
//        document.forms[0].elements[i].focus();
        break;
      }
    }

  }

}

//function mascaraTel(tel){
//    if(tel.value.length <= 14){
//        mascara(tel, "(99) 9999-9999");
//    }else{
//        //tel.value = tel.value.replace(/[^0-9]/g,'');
//        alert("passou");
//        mascara(tel, "(99) 99999-9999");
//    }
//}

function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->

function openWin( windowURL, windowName, windowFeatures ) { 
	return window.open( windowURL, windowName, windowFeatures ) ; 
}