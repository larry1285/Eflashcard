<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="css/style.css">
  <script src="js/eflash.js"></script>
</head>
<body>

<div id="div1">
<p id="p1">This is a paragraph.</p>
<p id="p2">This is another paragraph.</p>
  <textarea cols="30" rows="4" onkeyup="InputAdjust(this)" id="card1_name"></textarea>
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

