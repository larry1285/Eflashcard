
  <?php include "includes/db.php"; ?>
  <?php
    
    $rank2_index=$_GET['rank2_index'];
    $uname=$_GET['uname'];
    $user_admin_db=$uname."_"."admin_db";
    echo "uname=".$uname."<br>";
    $category_list=[]; //empty array
//    $category_list[] = "tree"; add element to the category_list array
    $token = strtok($_GET['category_list'],"|");

    while ($token !== false)
    {
    $category_list[] = $token;
    $token = strtok("|");
    } 
    for($x=0;$x<count($category_list);$x++)
      {
      echo $category_list[$x];
      echo "<br>";
    }

    $t=time(); 
    echo"t=".$t."<br>";

      $where_clause="WHERE ";

      $farthest_cards_sql = "SELECT * FROM "."$user_admin_db ";   

      
      
      $query_rank5="SELECT * FROM ".$user_admin_db." WHERE rank='5' AND (";
      $query_rank4="SELECT * FROM ".$user_admin_db." WHERE rank='4' AND (";
      $query_rank3="SELECT * FROM ".$user_admin_db." WHERE rank='3' AND (";
      $query_rank2="SELECT * FROM ".$user_admin_db." WHERE rank='2' AND (";
      $query_rank1="SELECT * FROM ".$user_admin_db." WHERE rank='1' AND (";
      for($x=0;$x<count($category_list);$x++)
      {
         if($x==(count($category_list)-1))
         {
           $query_rank5.="`$user_admin_db`.`category`='$category_list[$x]'";
           $query_rank4.="`$user_admin_db`.`category`='$category_list[$x]'";
           $query_rank3.="`$user_admin_db`.`category`='$category_list[$x]'";
           $query_rank2.="`$user_admin_db`.`category`='$category_list[$x]'";
           $query_rank1.="`$user_admin_db`.`category`='$category_list[$x]'";
           
         }
         else
         { 
           $query_rank5.="`$user_admin_db`.`category`='$category_list[$x]' OR ";
           $query_rank4.="`$user_admin_db`.`category`='$category_list[$x]' OR ";
           $query_rank3.="`$user_admin_db`.`category`='$category_list[$x]' OR ";
           $query_rank2.="`$user_admin_db`.`category`='$category_list[$x]' OR ";
           $query_rank1.="`$user_admin_db`.`category`='$category_list[$x]' OR ";
         }
      }     
      $query_rank5.=" )";
      $query_rank4.=" )";
      $query_rank3.=" )";
      $query_rank2.=" )";
      $query_rank1.=" )";
      
//      echo "query_rank5=".$query_rank5."<br>";
//      echo "query_rank4=".$query_rank4."<br>";
//      echo "query_rank3=".$query_rank3."<br>";
//      echo "query_rank2=".$query_rank2."<br>";
//      echo "query_rank1=".$query_rank1."<br>";
      
      $result_rank5 = mysqli_query($connection,$query_rank5);  
      $rank5_num_rows = mysqli_num_rows($result_rank5);
      
      $result_rank4 = mysqli_query($connection,$query_rank4);  
      $rank4_num_rows = mysqli_num_rows($result_rank4);
      
      $result_rank3 = mysqli_query($connection,$query_rank3);  
      $rank3_num_rows = mysqli_num_rows($result_rank3);
      
      $result_rank2 = mysqli_query($connection,$query_rank2);  
      $rank2_num_rows = mysqli_num_rows($result_rank2);
      
      $result_rank1 = mysqli_query($connection,$query_rank1);  
      $rank1_num_rows = mysqli_num_rows($result_rank1);
//      if($rank5_num_rows==0)echo"succeed";
//      else echo "failed";
      $card_rank=0;
      do
      {
        $rand_num=rand(1,100);
        echo "rand=".$rand_num."<br>";
//        if($rand_num <=100 && $rand_num>=81 && $rank5_num_rows!=0){$where_clause.="`admin_db`.`rank`=5 AND (";$card_rank=5;  break;}
//        else if($rand_num <=80 && $rand_num>=61 && $rank4_num_rows!=0){$where_clause.="`admin_db`.`rank`=4 AND (";$card_rank=4; break;}
//        else if($rand_num <=60 && $rand_num>=41 && $rank3_num_rows!=0){$where_clause.="`admin_db`.`rank`=3 AND (";$card_rank=3; break;}
        if($rand_num <=100 && $rand_num>=(100-$rank2_index+1) && $rank2_num_rows!=0){$where_clause.="`$user_admin_db`.`rank`=2 AND (";$card_rank=2; break;}
        else if($rand_num <=(100-$rank2_index) && $rand_num>=1 && $rank1_num_rows!=0){$where_clause.="`$user_admin_db`.`rank`=1 AND (";$card_rank=1; break;}
      }while(true);
      
      
      
      
      
      for($x=0;$x<count($category_list);$x++)
      {
         if($x==(count($category_list)-1))$where_clause.="`$user_admin_db`.`category`='$category_list[$x]'";
         else $where_clause.="`$user_admin_db`.`category`='$category_list[$x]' OR ";
      }      
            
      $farthest_cards_sql=$farthest_cards_sql.$where_clause;
      $farthest_cards_sql=$farthest_cards_sql.") AND add_time=(SELECT MIN(add_time) FROM $user_admin_db ";
      $farthest_cards_sql=$farthest_cards_sql.$where_clause.") )";
      echo "where_clause:".$where_clause."<br>";
      echo "yo i'm $farthest_cards_sql"."<br>";
      echo $farthest_cards_sql."<br>";
      $farthest_cards_sql=$farthest_cards_sql." LIMIT 1";
      $result_farthest_cards_sql = mysqli_query($connection,$farthest_cards_sql);  
      if(!$result_farthest_cards_sql){echo"== ";echo mysqli_error($connection);}
      $card_name="empty";
      $card_content="empty";
      $card_id="empty";
      while ($row = mysqli_fetch_assoc($result_farthest_cards_sql)  ) //actually, there is only one row
      {
        
        $card_id=$row['id'];
        $card_name=$row['card_name'];
        $card_content=$row["card_content"];
        $card_time=$row['add_time'];
//        echo "old add time=".$card_time.'<br>';
        $update_time_query="
          UPDATE `$user_admin_db` SET `add_time` = '{$t}' WHERE `$user_admin_db`.`id` = '{$card_id}';";
        $result_update_time_query = mysqli_query($connection,$update_time_query);  
        if(!$result_update_time_query ){echo"== ";echo mysqli_error($connection);}
      }      
      

    echo "||";
    echo $card_name;
    echo "||";
    echo $card_content;
    echo "||";
    echo $card_id;
    echo "||";
    echo $card_rank;
  ?>    

