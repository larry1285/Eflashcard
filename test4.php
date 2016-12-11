<!DOCTYPE html>
<html>
<body>

<p>In HTML, JavaScript statements are "commands" to the browser.</p>

<p id="demo"></p>

<script>
function car(name){
	this.name = name;
}
var cars= [];
cars[3]=new car("larry");
console.log(cars[3].name);
  if(typeof cars[0] == 'undefined')console.log("fucku")
document.getElementById("demo").innerHTML=cars[3].name;
</script>

</body>
</html>
