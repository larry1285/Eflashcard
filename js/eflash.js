var textarea_index=1; // 1 represent that user's mouse is not over current textarea ps: should use a better resolution.


function mouse_click()
{
  var current_name_textarea = document.getElementById(current_name_textarea_id);
  current_name_textarea.addEventListener("mouseover", over_textarea_change_textarea_index);
  current_name_textarea.addEventListener("mouseout", outside_textarea_change_textarea_index);

  var current_content_textarea = document.getElementById(current_content_textarea_id);
  current_content_textarea.addEventListener("mouseover", over_textarea_change_textarea_index);
  current_content_textarea.addEventListener("mouseout", outside_textarea_change_textarea_index);  
  if (textarea_index==0) {console.log("inside textarea,clicked!");}
  else if(textarea_index==1){console.log("outside textarea,clicked!");}
  
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
  
}


function edit_content(category_name,card_name,card_content,category_row_id)
{
  console.log(category_name);
  console.log(card_name);
  console.log(card_content);
  console.log(category_row_id);

  var current_card_name=document.getElementById(category_name+'_'+category_row_id+'_1');
  var current_card_content=document.getElementById(category_name+'_'+category_row_id+'_2');
  
    current_name_textarea_id="textarea_"+category_name+"_"+category_row_id+"_1";
  current_content_textarea_id="textarea_"+category_name+"_"+category_row_id+"_2";
  
  current_card_name.innerHTML=("<textarea id="+'"'+current_name_textarea_id+'"'+" onkeyup='adjustheight(this)' >"+card_name+"</textarea>"); 
  current_card_content.innerHTML=("<textarea id="+'"'+current_content_textarea_id+'"'+" onkeyup='adjustheight(this)' >"+card_content+"</textarea>");  
  
}
