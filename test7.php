echo "error1";
echo " || ";
echo "error2";
Now on the client side you can split the responsetext into a javascript array:

var responseArray = xmlhttp.responseText.split("||");
document.getElementById("errorDIV").innerHTML=responseArray[0];
document.getElementById("ERROR2DIV").innerHTML=responseArray[1];




http://stackoverflow.com/questions/20906223/catching-2-different-xmlhttp-responsetext-in-one-time