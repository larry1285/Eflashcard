<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Refactored date examples</title>
	<link rel="stylesheet" href="lib/qunit.css">
	<script src="lib/qunit.js"></script>
	<script src="lib/blanket.js"></script>
	<script src="weekday.js" data-cover></script>
	<script>
	QUnit.test("prettydate basics", function( assert ) {
		assert.equal(weekday(1), "Monday");
		assert.equal(weekday(2), "Tuesday");
		assert.equal(weekday(3), "Wednesday");
		assert.equal(weekday(4), "Thursday");
		assert.equal(weekday(5), "Friday");
		assert.equal(weekday(6), "Saturday");
	});
	</script>
</head>
<body>

<div id="qunit"></div>

</body>
</html>
