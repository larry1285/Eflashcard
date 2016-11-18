<!DOCTYPE html>
<html>

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 

<title>Strip editable div markup</title>

<script type="text/javascript">
function strip(html) {
    var tempDiv = document.createElement("DIV");
    tempDiv.innerHTML = html;
    return tempDiv.innerText;
}

</script>
</head>

<body>

<div id="editableDiv" contentEditable="true">asd</div>

<input type="button" value="press" onclick="alert(strip(document.getElementById('editableDiv').innerText));" />

</body>

</html>
<!--  http://codepen.io/erikpukinskis/pen/EjaaMY?editors=101 -->