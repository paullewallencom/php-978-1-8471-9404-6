<html>
<head>
<script type="text/javascript" src="src/slider.js"></script>
<script type="text/javascript" src="src/prototype.js"></script>
<script type="text/javascript" src="src/scriptaculous.js"></script>
<script type="text/javascript" src="src/effects.js"></script>
<script type="text/javascript" src="src/controls.js"></script>
<script type="text/javascript">
  window.onload = function() {
       new Control.Slider('handle1' , 'track1',
       {
   axis:'vertical',
   range:$R(1,100),
   onSlide: function(v) {$('value1').innerHTML = 'New Slide Value='+v;}
	}
 );
}
</script>
<style type="text/css">
h4{ font: 13px verdana }
#track1 {
   background-color:#BCE6D6;
   height: 10em;
   width: 15px;
}
#handle1 {
   background-color:#30679B;
   height: 1em;
   width: 15px;
}
</style>
</head>
<body>
<div id="track1">
   <div id="handle1"></div>
</div>
<div id="value1"></div>
</body>
</html>