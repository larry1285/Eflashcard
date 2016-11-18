<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/eflash.js"></script>
</head>
<body>
<font color="red">This is some text!</font>
<div id="div1">
 
  <textarea cols="30" rows="4" onkeyup="InputAdjust(this)" id="card1_name" ><div>asdS</div>d<div>a</div>fdf<span style="color:red;"></span>df<></textarea>
</div>

<script>
var para = document.createElement("TEXTAREA");

para.setAttribute('cols', '30');
para.setAttribute('rows', '4');
para.setAttribute('onkeyup', 'InputAdjust(this)');
para.setAttribute('id', 'card1_content');
var node = document.createTextNode( "This is new." );
para.appendChild(node);
var element = document.getElementById("div1");
element.appendChild(para);
</script>

</body>
</html>

