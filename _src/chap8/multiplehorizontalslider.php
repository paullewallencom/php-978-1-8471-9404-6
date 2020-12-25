<html>
<head>
<script type="text/javascript" src="src/slider.js"></script>
<script type="text/javascript" src="src/prototype.js"></script>
<script type="text/javascript" src="src/scriptaculous.js"></script>
<script type="text/javascript" src="src/effects.js"></script>
<script type="text/javascript" src="src/controls.js"></script>
<script type="text/javascript">
window.onload = function() {
 new Control.Slider(['handle1','handle2'], 'track1'
  );
}

</script>
<style type="text/css">
h4{ font: 13px verdana }
#track1 {
   background-color:#BCE6D6;
   height: 30px;
   width: 10em;
}
#handle1 {
   background-color:#30679B;
   height: 1em;
   width: 15px;
}
#handle2 {
   background-color:#30679B;
   height: 1em;
   width: 15px;
}
</style>
</head>
<body>
<h4>Horizontal Sliders With Multiple Handles</h4>
<div id="track1">
   <div id="handle1"></div>
   <div id="handle2"></div>
</div>
<div id="value1"></div>
</body>
</html>