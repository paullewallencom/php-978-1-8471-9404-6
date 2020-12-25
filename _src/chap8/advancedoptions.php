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
        axis: 'horizontal',
        range:$R(1,25),
 	values:[1, 5,10,15,20,25],
onSlide:function(v){ $('value1').innerHTML = "New Slide Value="+v;}
  }
 );
}
</script>
<style type="text/css">
h4{ font: 13px verdana }
#track1 {
   background-color:#BCE6D6;
   height: 1em;
   width: 150px;
}
#handle1 {
   background-color:#30679B;
   height: 1em;
   width: 6px;
}

</style>
</head>
<body>
<h4>Slider With Advanced Options</h4>
<div id="track1">
   <div id="handle1"></div>
</div>
<div id="value1"></div>
</body>
</html>