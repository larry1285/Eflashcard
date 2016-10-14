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
}


function edit_content(category_name,card_name,card_content,category_row_id)
{
  console.log(category_name);
  console.log(card_name);
  console.log(card_content);
  console.log(category_row_id);

  var current_card_name=document.getElementById(category_name+'_'+category_row_id+'_1');
  var current_card_content=document.getElementById(category_name+'_'+category_row_id+'_2');
  
  current_card_name.innerHTML=("<textarea onkeyup='adjustheight(this)'>"+card_name+"</textarea>"); 
  current_card_content.innerHTML=("<textarea>"+card_content+"</textarea>"); 
  
}
