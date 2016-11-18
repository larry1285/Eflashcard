<!DOCTYPE html>
<html>
<body>
 ]
  <div style=" width:40px; border-style: solid;">a</div>

  <div style="float:left;width:20px;border-style: solid; marign:30px; ">a</div>




<p id="demo"></p>
<!DOCTYPE html>
<html>
<body>


<?php
  $count=0;
  while($count<3){
    $apple=0;
  }
  echo 'count='.$count;
?>
  </body>
<script>
function add_more_input() {
    var aa= "addss_109";
    aa = aa.replace(/[^0-9]/g,'');
    var a = parseInt(aa) + "<br>";
    var b = parseInt("10.00") + "<br>";
    var c = parseInt("10.33") + "<br>";
    var d = parseInt("34 45 66") + "<br>";
    var e = parseInt("   60   ") + "<br>";
    var f = parseInt("40 years") + "<br>";
    var g = parseInt("He was 40") + "<br>";

    var h = parseInt("10", 10)+ "<br>";
    var i = parseInt("010")+ "<br>";
    var j = parseInt("10", 8)+ "<br>";
    var k = parseInt("0x10")+ "<br>";
    var l = parseInt("10", 16)+ "<br>";

    var n = a + b + c + d + e + f + g + "<br>" + h + i + j + k +l;
    document.getElementById("demo").innerHTML = n;
}
</script>

</body>
</html>

