<!DOCTYPE html>
<html>
<body>

<p>Click the button to trigger a function that will output "Hello World" in a p element with id="demo".</p>


<button onclick="myFunction('asda%0D%0Aasdasd')">Click me</button>


<p id="demo"></p>
<textarea id="demo2"></textarea>

<script>
function myFunction(asd) {
    var res= asd.replace(/<br>/g, '&#13;&#10;');
    //var res = asd.replace("<br>", "&#13;&#10;");
    console.log(res);
    //res = res.replace('"', '\"');
    document.getElementById("demo").innerHTML = asd;
    document.getElementById("demo2").innerHTML = res;
}
</script>

</body>
</html>

