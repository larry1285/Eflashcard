<html lang="en">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
    <title>The serialized HTML of a selection in Mozilla and IE</title>
    <script type="text/javascript">
    function getHTMLOfSelection () {
      var range;
if (window.getSelection) {
        var selection = window.getSelection();
        if (selection.rangeCount > 0) {
          range = selection.getRangeAt(0);
          var clonedSelection = range.cloneContents();
          var div = document.createElement('div');
          div.appendChild(clonedSelection);
          return div.innerHTML;
        }
        else {
          return '';
        }
      }
      else {
        return '';
      }
    }
    </script>
    </head>
    <body>
    <div>
        <p>Some text to <span class="test">test</span> the selection on.
            Kibology for <b>all</b><br />. All <i>for</i> Kibology.
    </p>
    </div>
    <form action="">
    <p>
    <input type="button" value="show HTML of selection"
           onclick="this.form.output.value = getHTMLOfSelection();">
    </p>
    <p>
    <textarea name="output" rows="5" cols="80"></textarea>
    </p>
    </form>
    </body>
    </html>