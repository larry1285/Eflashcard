
  <?php include "includes/db.php"; ?>
  <?php


    $play_num = $_GET['play_num'];
    $t=time(); 
    echo"t=".$t."<br>";
    if(fmod($play_num,3)!=0)
    {
      $farthest_cards_sql = "SELECT * FROM admin_db ORDER BY add_time LIMIT 1;";  
      
      
      $result_farthest_cards_sql = mysqli_query($connection,$farthest_cards_sql);  
      if(!$result_farthest_cards_sql){echo"== ";echo mysqli_error($connection);}
      $card_name="empty";
      $card_content="empty";

      while ($row = mysqli_fetch_assoc($result_farthest_cards_sql)  ) 
      {
        
        $card_id=$row['id'];
        $card_name=$row['card_name'];
        $card_content=$row["card_content"];
        $card_time=$row['add_time'];
        echo "old add time=".$card_time.'<br>';
        $update_time_query="
          UPDATE `admin_db` SET `add_time` = '{$t}' WHERE `admin_db`.`id` = '{$card_id}';";
        $result_update_time_query = mysqli_query($connection,$update_time_query);  
        if(!$result_update_time_query ){echo"== ";echo mysqli_error($connection);}
      }      
      
    }
    else{
      $random_cards_sql = "SELECT * FROM admin_db ORDER BY RAND() LIMIT 1;";
      $result_random_cards_sql = mysqli_query($connection,$random_cards_sql);

      $card_name="empty";
      $card_content="empty";

      while ($row = mysqli_fetch_assoc($result_random_cards_sql)) 
      {
        $card_id=$row['id'];
        $card_name=$row['card_name'];
        $card_content=$row["card_content"];
        $update_time_query="
          UPDATE admin_db
          SET add_time={$t}, 
          WHERE id={$card_id}
        ";
      }
    }
    echo "||";
    echo $card_name;
    echo "||";
    echo $card_content;
    echo "||";
    echo $play_num;
  ?>    

