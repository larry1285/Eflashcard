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