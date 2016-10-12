  <!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>textarea auto height</title>
    <style type="text/css">
        textarea {
            resize: none;
        }
    </style>
</head>
<body>
  <textarea id="textarea1" onkeyup="autogrow(this)" >
At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
</textarea>
<textarea id="textarea2" style="position:relative; left:-4px;" onkeyup="autogrow(this)" >
At w3schools.com you will learn how to make a website. We offer free tutorials in all web development technologies.
</textarea>
<button type="button" onclick="myFunction()">Try it</button>  
  
  
<script>
function myFunction(event) {
    var x = event.which || event.keyCode;
    console.log("before:"+document.getElementById("textarea1").rows);
    if(x==13){ //keycode of Enter button
      document.getElementById("textarea1").rows=document.getElementById("textarea1").rows+1;
    }
    console.log("after:"+document.getElementById("textarea1").rows);
    //document.getElementById("demo").innerHTML = "The Unicode value is: " + x;
}
function autogrow(textarea) {   
    var max_height=Math.max(document.getElementById("textarea1").scrollHeight,document.getElementById("textarea2").scrollHeight);
    //document.getElementById("textarea1").style.height=document.getElementById("textarea1").scrollHeight.toString+'px';
    document.getElementById("textarea1").style.height=max_height+"px";
    document.getElementById("textarea2").style.height=max_height+"px";
    //document.getElementById("textarea1").=document.getElementById("textarea1").scrollHeight;
    console.log("textare1's height="+ document.getElementById("textarea1").style.height); 
    console.log("textare2's height="+ document.getElementById("textarea2").style.height); 
}


</script>
</body>
</html>
 