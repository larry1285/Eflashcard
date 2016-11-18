<!DOCTYPE html>
<html>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<form>
  <p contenteditable="true">Select some of this text and then hit the button.</p>
  <button>Type some stuff</button>
</form>

<script>
function typeInTextarea(el, newText) {
  var start = el.prop("selectionStart")
  var end = el.prop("selectionEnd")
  var text = el.val()
  var before = text.substring(0, start)
  var after  = text.substring(end, text.length)
  el.val(before + newText + after)
  el[0].selectionStart = el[0].selectionEnd = start + newText.length
  el.focus()
  return false
}

$('[contenteditable]').on('paste',function(e) {
    e.preventDefault();
    var text = (e.originalEvent || e).clipboardData.getData('text/plain') || prompt('Paste something..');
    window.document.execCommand('insertText', false, text);
});

</script>

</body>
</html>

