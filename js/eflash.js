var textarea_index=0; // 1 represent that user's mouse is not over current textarea ps: should use a better resolution.


function mouse_click()
{
  console.log("current textarea_index="+textarea_index);
  var current_name_textarea = document.getElementById(current_name_textarea_id);
  current_name_textarea.addEventListener("mouseover", over_textarea_change_textarea_index);
  current_name_textarea.addEventListener("mouseout", outside_textarea_change_textarea_index);

  var current_content_textarea = document.getElementById(current_content_textarea_id);
  current_content_textarea.addEventListener("mouseover", over_textarea_change_textarea_index);
  current_content_textarea.addEventListener("mouseout", outside_textarea_change_textarea_index);  
  if (textarea_index==0) {console.log("inside textarea,clicked!");}
  else if(textarea_index==1)
  {
    document.getElementById("edit_form").submit();
    console.log("outside textarea,clicked!");
  }
  
}

function over_textarea_change_textarea_index()
{
  console.log("textarea="+textarea_index);
  textarea_index=0;
  console.log("current_textarea_id="+current_name_textarea_id)
  
}

function outside_textarea_change_textarea_index()
{
  console.log("textarea="+textarea_index);
  textarea_index=1;
}



function InputAdjust(o) 
{
    console.log("fuck my life");
    document.getElementById("card1_name").style.height ="100px"; // this line cannot be neglected!! but why??
    document.getElementById("card1_content").style.height ="100px"; // this line cannot be neglected!! but why??
    var max_scrollHeight =
        Math.max(document.getElementById("card1_name").scrollHeight,document.getElementById("card1_content").scrollHeight);
    document.getElementById("card1_name").style.height =max_scrollHeight+ 'px';
    document.getElementById("card1_content").style.height =max_scrollHeight +'px';
}



function adjustheight(o)
{

  o.style.height="10px";  
  o.style.height=o.scrollHeight+'px';
  console.log(o.id);
  console.log("@@current_scrollheight="+o.scrollHeight+'px');
}


function edit_content(category_name,card_name,card_content,category_row_id)
{
  console.log(category_name);
  console.log(card_name);
  console.log(card_content);
  console.log(category_row_id);
  //*********************testing********************
  
  card_content= card_content.replace(/%0D%0A/g, '&#13;&#10;');
  var new_line_count=card_content.split("&#13;&#10;").length;
  console.log("new_card_content="+card_content);

  //*********************testing********************
  var current_card_name=document.getElementById(category_name+'_'+category_row_id+'_1');
  var current_card_content=document.getElementById(category_name+'_'+category_row_id+'_2');
  
  
  current_name_textarea_id="textarea_"+category_name+"_"+category_row_id+"_1";
  current_content_textarea_id="textarea_"+category_name+"_"+category_row_id+"_2";
  
  current_card_name.innerHTML=(
    '<form action="category_content.php?"  method="get" id="edit_form">'+
      "<textarea cols='40' id="+'"'+current_name_textarea_id+'"'+" onkeyup='adjustheight(this)' form='edit_form'       name='edit_name_textarea'>"+card_name+
      "</textarea>"+
      '<input type="hidden" name="category_name" value="'+category_name+'">'+
      '<input type="hidden" name="card_id" value="'+category_row_id+'">'
  ); 
  // </form> is added by browser automatically 
  
  var $predicted_current_card_content_height=new_line_count*20;
  console.log("predict="+$predicted_current_card_content_height);
  current_card_content.innerHTML=(
    '<form action="category_content.php?"  method="get" id="edit_form">'+
      "<textarea cols='40' id="+'"'+current_content_textarea_id+'"'+" onkeyup='adjustheight(this)' form='edit_form'       name='edit_content_textarea' style='height:"+$predicted_current_card_content_height+"px'>"+card_content+
      "</textarea>"+
    '<input type="hidden" form="edit_form" name="edit_submit" value="submit" > '//fake submit
  );
  console.log("@@current_scrollheight="+current_content_textarea_id.scrollHeigh);
  //question
   //adjustheight(current_content_textarea_id);  

}



