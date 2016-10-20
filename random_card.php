
  <?php include "includes/db.php"; ?>
  <?php

  // get the q parameter from URL
  //$q = $_REQUEST["q"];
  //no input so far

    $random_cards_sql = "SELECT * FROM admin_db ORDER BY RAND() LIMIT 10;";
    $result_random_cards_sql = mysqli_query($connection,$random_cards_sql);

    $card_name="empty";
    $card_content="empty";

    while ($row = mysqli_fetch_assoc($result_random_cards_sql)) 
    {
      $card_name=$row['card_name'];
      $card_content=$row["card_content"];

    }
    echo $card_name;
    echo "||";
    echo $card_content;
  ?>    

