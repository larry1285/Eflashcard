<!DOCTYPE html>
<html>
<body>


<?php
  $count=0;
  while($count<3){
    $apple=0;
    $count=$count+1;
  }
  echo 'count='.$count;
?>
<script language="javascript">
window.tdiff = []; fred = function(a,b){return a-b;};
window.document.onload = function(e){ 
    console.log("document.onload", e, Date.now() ,window.tdiff,  
    (window.tdiff[0] = Date.now()) && window.tdiff.reduce(fred) ); 
}
window.onload = function(e){ 
    console.log("window.onload", e, Date.now() ,window.tdiff, 
    (window.tdiff[1] = Date.now()) && window.tdiff.reduce(fred) ); 
}
</script>
  </body>