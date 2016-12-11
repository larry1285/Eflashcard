var total_input=1;
var edit_content_flag=false;
var over_toolbar=false;
var textarea_index=0; // 1 represent that user's mouse is not over current textarea ps: should use a better resolution.
var click_count=0;
var current_edit_id="null";
function mouse_click()
{
  if(edit_content_flag==true)click_count=click_count+1;
  console.log("current textarea_index="+textarea_index);
  var current_name_textarea = document.getElementById(current_name_textarea_id);
  current_name_textarea.addEventListener("mouseover", over_textarea_change_textarea_index);
  current_name_textarea.addEventListener("mouseout", outside_textarea_change_textarea_index);
  
  console.log(current_tool_bar);
  document.getElementById(current_tool_bar).addEventListener("mouseout", _outside_toolbar);
  document.getElementById(current_tool_bar).addEventListener("mouseover", _over_toolbar);
  

  var current_content_textarea = document.getElementById(current_content_textarea_id);
  current_content_textarea.addEventListener("mouseover", over_textarea_change_textarea_index);
  current_content_textarea.addEventListener("mouseout", outside_textarea_change_textarea_index);  
  if (textarea_index==1) {console.log("inside textarea,clicked!");}
  else if(textarea_index==0 && !over_toolbar)
  {
    if(click_count!=1)
    {
      document.getElementById(current_pencil).style.display="inline";
      document.getElementById(current_remove).style.display="inline";

      document.getElementById(current_tool_bar).style.display="none";
      
      document.getElementById(implicit_current_name_textarea_id).innerHTML=document.getElementById(current_name_textarea_id).innerHTML;      document.getElementById(implicit_current_content_textarea_id).innerHTML=document.getElementById(current_content_textarea_id).innerHTML;
      document.getElementById("edit_form").submit();
      
      edit_content_flag=false;
      over_toolbar=false;
      click_count=0;
      
    }
    console.log("outside textarea,clicked!");
  }
  
}
function _over_toolbar()
{
  console.log("ewrwerwe");
  over_toolbar=true;
}
function _outside_toolbar()
{
  console.log("out");
  over_toolbar=false;
}
function over_textarea_change_textarea_index()
{
  console.log("textarea="+textarea_index);
  textarea_index=1;
  console.log("current_textarea_id="+current_name_textarea_id)
  
}

function outside_textarea_change_textarea_index()
{
  console.log("textarea="+textarea_index);
  textarea_index=0;
}



function InputAdjust(o) 
{
    
    var input_id=o.id
    var number=input_id.replace(/[^0-9]/g,'');
//    console.log("number="+number); 
    var current_name_id="card"+number+"_name";
//    console.log("current_name_id="+current_name_id);  
    var current_content_id="card"+number+"_content";
//    console.log("current_name_id="+current_name_id);
  
    document.getElementById(current_name_id).style.height ="100px"; // this line cannot be neglected!! but why??
    document.getElementById(current_content_id).style.height ="100px"; // this line cannot be neglected!! but why??
    var max_scrollHeight =
        Math.max(document.getElementById(current_name_id).scrollHeight,document.getElementById(current_content_id).scrollHeight);
    document.getElementById(current_name_id).style.height =max_scrollHeight+ 'px';
    document.getElementById(current_content_id).style.height =max_scrollHeight +'px';
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
  edit_content_flag=true;
  current_pencil=category_name+"_"+category_row_id+"_pencil";
  current_remove=category_name+"_"+category_row_id+"_remove";
  document.getElementById(current_pencil).style.display="none";
  document.getElementById(current_remove).style.display="none";
  
  current_tool_bar=category_name+"_"+category_row_id+"_toolbar";
  
  document.getElementById(current_tool_bar).style.display="inline";
  

  
  console.log("oh my fucking god");
  console.log(category_name);
  console.log(card_name);
  console.log(card_content);
  console.log(category_row_id);
  //*********************testing********************
  
  card_content= card_content.replace(/%0D%0A/g, '<br>');
  var new_line_count=card_content.split("&#13;&#10;").length;
  console.log("new_card_content="+card_content);

  //*********************testing********************
  var current_card_name=document.getElementById(category_name+'_'+category_row_id+'_1');
  var current_card_content=document.getElementById(category_name+'_'+category_row_id+'_2');
  
  
  current_name_textarea_id="textarea_"+category_name+"_"+category_row_id+"_1";
  current_content_textarea_id="textarea_"+category_name+"_"+category_row_id+"_2";
  implicit_current_name_textarea_id="implicit_"+current_name_textarea_id;
  implicit_current_content_textarea_id="implicit_"+current_content_textarea_id;
  current_card_name.innerHTML=(
    '<form action="category_content.php?"  method="get" id="edit_form">'+
    '<div id="'+current_name_textarea_id+'" contenteditable="true" style="border-style: ridge;min-height:200px;width:96%; margin:10px 10px 0px 10px;" onclick="set_current_edit(this)">'+card_name
    +'</div>'+
    "<textarea style='display:none' cols='59' id="+'"'+implicit_current_name_textarea_id+'"'+" onkeyup='adjustheight(this)' form='edit_form'       name='edit_name_textarea'>"+card_name+
    "</textarea>"+
    '<input type="hidden" name="category_name" value="'+category_name+'">'+
    '<input type="hidden" name="card_id" value="'+category_row_id+'">'
  ); 
  // </form> is added by browser automatically 
  
  var $predicted_current_card_content_height=new_line_count*20;
  console.log("predict="+$predicted_current_card_content_height);
  current_card_content.innerHTML=(
    '<div id="'+current_content_textarea_id+'" contenteditable="true" style="border-style: ridge;min-height:200px;width:96%; margin:10px 10px 0px 10px;" onclick="set_current_edit(this)">'+card_content+
    '</div>'+
      "<textarea style='display:none' cols='59' id="+'"'+implicit_current_content_textarea_id+'"'+" onkeyup='adjustheight(this)' form='edit_form'       name='edit_content_textarea' style='height:"+$predicted_current_card_content_height+"px'>"+card_content+
      "</textarea>"+
    '<input type="hidden" form="edit_form" name="edit_submit" value="submit" > '//fake submit
  );
//  current_card_content.innerHTML=(
//      "<div id="+'"'+current_content_textarea_id+'"'+" contenteditable='true' style='height:"+$predicted_current_card_content_height+"px'>"+card_content+
//      "</div>"
//  );
  $('[contenteditable]').on('paste',function(e) {
    e.preventDefault();
    var text = (e.originalEvent || e).clipboardData.getData('text/plain') || prompt('Paste something..');
    window.document.execCommand('insertText', false, text);
  });

}



function original_add_more_input()
{

  //declaration
  
  var new_name_textarea = document.createElement("TEXTAREA");
  var new_content_textarea = document.createElement("TEXTAREA");
  var br_tag=document.createElement("BR");
  
  var new_input_name_id='card'+total_input+"_name";
  var new_input_content_id='card'+total_input+"_content";
  var new_input_name_name=new_input_name_id;
  var new_input_content_name=new_input_content_id;
  
  //add new_name_teextarea

  new_name_textarea.setAttribute('style', 'width:30%;display:none;');
  new_name_textarea.setAttribute('rows', '4');
  new_name_textarea.setAttribute('onkeyup', 'InputAdjust(this)');
  new_name_textarea.setAttribute('name', new_input_name_name);
  new_name_textarea.setAttribute('id', new_input_name_id);
  new_name_textarea.setAttribute('form','input_form');
  
  var name_node = document.createTextNode( "" );
  new_name_textarea.appendChild(name_node);
  
  var input_section = document.getElementById("input_section");
  input_section.appendChild(new_name_textarea);  
  
  
  //add new_content_teextarea

  new_content_textarea.setAttribute('style', 'width:30%;display:none;');
  new_content_textarea.setAttribute('rows', '4');
  new_content_textarea.setAttribute('onkeyup', 'InputAdjust(this)');
  new_content_textarea.setAttribute('name', new_input_content_name);
  new_content_textarea.setAttribute('id', new_input_content_id);
  new_content_textarea.setAttribute('form','input_form');
  
  var content_node = document.createTextNode( "" );
  new_name_textarea.appendChild(content_node);
  
  input_section.appendChild(new_content_textarea);  
  
  //add br tag
  input_section.appendChild(br_tag);  
  
  
  console.log("success!");
  
    
}
function add_more_input()
{
  total_input=total_input+1;
  original_add_more_input();
  
  //declaration
  
  var new_card=document.createElement("DIV");
  var new_card_id="card"+total_input;
  
  var first_part=document.createElement("DIV");
  var vertical_line=document.createElement("DIV");
  var second_part=document.createElement("DIV");
  
  var new_name_div = document.createElement("DIV");
  var new_content_div = document.createElement("DIV");
  
  var new_name_div_id='explicit_card'+total_input+"_name";
  var new_content_div_id='explicit_card'+total_input+"_content";
  
  //new_card
  new_card.setAttribute('id', new_card_id);
  new_card.setAttribute('style', 'height:220px; width:60%; border-style: groove; float:left; background-color:white;');
  
  //first_part
  first_part.setAttribute('style', 'float:left; width:49.8%;');

  //vertical_line
  vertical_line.setAttribute('class', 'vertical-line');
  vertical_line.setAttribute('style', 'width:0.3%;height:100%;  float:left; background-color:pink;');
  
  //second_part
  second_part.setAttribute('style', 'float:left; width:49.8%;');  
  
  //add new_name_div

  new_name_div.setAttribute('contenteditable', 'true');
  new_name_div.setAttribute('style', 'min-height:200px;width:99%;margin:5px 1px 10px 2px;');
  new_name_div.setAttribute('onkeyup', 'make_height_equal(this)');
  new_name_div.setAttribute('id', new_name_div_id);

  
  var explicit_name_node = document.createTextNode( "" );
  new_name_div.appendChild(explicit_name_node);
  
  first_part.appendChild(new_name_div);  
  
  
  //add new_content_div

  new_content_div.setAttribute('contenteditable', 'true');
  new_content_div.setAttribute('style', 'min-height:200px;width:99%;margin:5px 1px 10px 2px;');
  new_content_div.setAttribute('onkeyup', 'make_height_equal(this)');
  new_content_div.setAttribute('id', new_content_div_id);

  
  var explicit_content_node = document.createTextNode( "" );
  new_content_div.appendChild(explicit_name_node);
  
  second_part.appendChild(new_content_div);   
  
  //add divs to the corresponding parts
  first_part.appendChild(new_name_div);
  second_part.appendChild(new_content_div);
  
  //add different parts to card
  new_card.appendChild(first_part);
  new_card.appendChild(vertical_line);
  new_card.appendChild(second_part);
  
  //add card to explicit_input_section
  document.getElementById("explicit_input_section").appendChild(new_card); 
}

function make_height_equal(o)
{
  var number=o.id.replace(/[^0-9]/g,'');
  var current_name_div=document.getElementById("explicit_card"+number+"_name");
  var current_content_div=document.getElementById("explicit_card"+number+"_content");

  var max_height=Math.max(current_name_div.clientHeight,current_content_div.clientHeight);
  document.getElementById("card"+number).style.height=(max_height+9)+"px";
  document.getElementById("my_vertical_line").style.height=(max_height+16)+"px";
}  
//
function input_form_submit()
{
  console.log("wtf");
  var i;
  for (i = 1; i <= total_input; i++) 
  {
    document.getElementById("card"+i+"_name").innerHTML=document.getElementById("explicit_card"+i+"_name").innerHTML; 
    document.getElementById("card"+i+"_content").innerHTML=document.getElementById("explicit_card"+i+"_content").innerHTML; 
    console.log("text!!");
    console.log(document.getElementById("card"+i+"_content").innerHTML)
  }
  document.getElementById("input_form").submit();
}





