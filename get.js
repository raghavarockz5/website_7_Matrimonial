// JavaScript Document
function getXMLHttp()
{ 
  var xmlHttp
  try
  { 
    //Firefox, Opera 8.0+, Safari
    xmlHttp = new XMLHttpRequest();
  }
  catch(e)
  {
    //Internet Explorer
    try
    { 
      xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch(e)
    {
      try
      { 
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e)
      {
        alert("Your browser does not support AJAX!")
        return false;
      }
    }
  }
  return xmlHttp;
}


function select_innerHTML(objeto,innerHTML){

    objeto.innerHTML = ""
    var selTemp = document.createElement("micoxselect")
    var opt;
    selTemp.id="micoxselect1"
    document.body.appendChild(selTemp)
    selTemp = document.getElementById("micoxselect1")
    selTemp.style.display="none"
    if(innerHTML.toLowerCase().indexOf("<option")<0){
        innerHTML = "<option>" + innerHTML + "</option>"
    }
    innerHTML = innerHTML.toLowerCase().
replace(/<option/g,"<span").replace(/<\/option/g,"</span")
    selTemp.innerHTML = innerHTML

    for(var i=0;i<selTemp.childNodes.length;i++){
  var spantemp = selTemp.childNodes[i];

        if(spantemp.tagName){     
            opt = document.createElement("OPTION")

   if(document.all){ //IE
    objeto.add(opt)
   }else{
    objeto.appendChild(opt)
   }       

   //getting attributes
   for(var j=0; j<spantemp.attributes.length ; j++){
    var attrName = spantemp.attributes[j].nodeName;
    var attrVal = spantemp.attributes[j].nodeValue;
    if(attrVal){
     try{
      opt.setAttribute(attrName,attrVal);
opt.setAttributeNode(spantemp.attributes[j]
.cloneNode(true));

     }catch(e){}
    }
   }
   //getting styles
   if(spantemp.style){
    for(var y in spantemp.style){
     try{opt.style[y] = spantemp.style[y];}catch(e){}
    }
   }
   //value and text
   opt.value = spantemp.getAttribute("value")
   opt.text = spantemp.innerHTML
   
  /* function capitaliseFirstLetter(string)
{
    return string.charAt(0).toUpperCase() + string.slice(1);
}
   opt.text = capitaliseFirstLetter(opt.text);*/
   //IE
   //opt.text = opt.text.toUpperCase()
   opt.text = ucFirstAllWords(opt.text);
   opt.selected = spantemp.getAttribute('selected');
   opt.className = spantemp.className;
  } 
 }    
 document.body.removeChild(selTemp)
 selTemp = null
}

function ucFirstAllWords(str)
{
    var pieces = str.split(" ");
    for ( var i = 0; i < pieces.length; i++ )
    {
        var j = pieces[i].charAt(0).toUpperCase();
        pieces[i] = j + pieces[i].substr(1);
    }
    return pieces.join(" ");
}

function get_states(id)
{ //alert(id);
	 var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  { 
    if(xmlHttp.readyState == 4)
    { //alert('in');
         
	  var inner = xmlHttp.responseText;  //alert(inner);
      select_innerHTML(document.getElementById("state"),inner);
    }
  }

  xmlHttp.open("GET", "get_states.php?id="+id, true); 
  xmlHttp.send(null);
}

function get_cities(id)
{ //alert(id);
	 var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  { 
    if(xmlHttp.readyState == 4)
    { //alert('in');
         
	  var inner = xmlHttp.responseText;  //alert(inner);
      select_innerHTML(document.getElementById("city"),inner);
    }
  }

  xmlHttp.open("GET", "get_cities.php?id="+id, true); 
  xmlHttp.send(null);
}



function get_lstates(id)
{ //alert(id);
	 var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  { 
    if(xmlHttp.readyState == 4)
    { //alert('in');
         
	  var inner = xmlHttp.responseText;  //alert(inner);
      select_innerHTML(document.getElementById("lstate"),inner);
    }
  }

  xmlHttp.open("GET", "get_states.php?id="+id, true); 
  xmlHttp.send(null);
}

function get_lcities(id)
{ //alert(id);
	 var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  { 
    if(xmlHttp.readyState == 4)
    { //alert('in');
         
	  var inner = xmlHttp.responseText;  //alert(inner);
      select_innerHTML(document.getElementById("lcity"),inner);
    }
  }

  xmlHttp.open("GET", "get_cities.php?id="+id, true); 
  xmlHttp.send(null);
}


function saveprofile(id)
{ //alert(id);
	 var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  { 
    if(xmlHttp.readyState == 4)
    { //alert('in');
         
	  var inner = xmlHttp.responseText;  //alert(inner);
	  if(inner == 0)
	  {
		alert('Profile Already Exited In Saved List');  
	  }
	  if(inner == 1)
	  {
		alert('Profile Added To Saved List');  
	  }
    }
  }

  xmlHttp.open("GET", "saveprofile.php?id="+id, true); 
  xmlHttp.send(null);
}

function sendint(id)
{ //alert(id);
	 var xmlHttp = getXMLHttp();
  
  xmlHttp.onreadystatechange = function()
  { 
    if(xmlHttp.readyState == 4)
    { //alert('in');
         
	  var inner = xmlHttp.responseText;  //alert(inner);
	  if(inner == 0)
	  {
		alert('You Has Already Sent Request');  
	  }
	  if(inner == 1)
	  {
		alert('Your Request Has Sent');  
	  }
    }
  }

  xmlHttp.open("GET", "sendint.php?id="+id, true); 
  xmlHttp.send(null);
}