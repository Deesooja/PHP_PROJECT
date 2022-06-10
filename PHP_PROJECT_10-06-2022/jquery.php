<!DOCTYPE html>
<html>
<head>
<script src="jquery.js"></script>
<script>
$(document).ready(function(){
  $("#btn").click(function(){
    $("#test").load("test_jquery.php");

  });
});
</script>
</head>
<body>

<h2>This is a heading</h2>

<p>This is a paragraph.</p>
<!-- <p id="test">This is another paragraph.</p> -->
<div id="test"> </div>

<button id="btn">Click me</button>

</body>
</html>
