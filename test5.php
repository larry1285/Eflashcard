<!DOCTYPE html>
<html>
<body>
    <?php include "includes/db.php"; ?>
<?php
  $t=time();
  echo $t."<br>";
  $t2=time();
  echo $t2-$t  ;
?>
<form action="random_card.php?yo=fuck" method="get">
  First name:<br>
  <input type="hidden" name="category_list" value="l_m">
  <br>
  Last name:<br>
  
  <br><br>
  <input type="submit" value="Submit">
</form> 

<p>If you click the "Submit" button, the form-data will be sent to a page called "action_page.php".</p>

</body>
</html>
