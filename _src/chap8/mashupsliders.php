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
             range: $R(1,50),
             values: [1,5,15,25,35,45,50],
             sliderValue: 1,
             onChange: function(value){
                 $('changed').innerHTML = 'Changed Value : '+value;
             },
             onSlide: function(value) {
                 $('sliding').innerHTML = 'Sliding Value: '+value;
            }
         } );
new Control.Slider('handle2' , 'track2',
        {
             range: $R(1,50),
             axis:'vertical',
             sliderValue: 1,
             onChange: function(value){
                   $('changed').innerHTML = 'Changed Value : '+value;
             },
             onSlide: function(value) {
                   $('sliding').innerHTML = 'Sliding Value: '+value;
            }
         } );



}

</script>
<style type="text/css">
h4{ font: 13px verdana }
#track1 {
   background-color:#BCE6D6;
   height: 1em;
   width: 200px;
}
#handle1 {

   background-color:#30679B;
   height: 1em;
   width: 10px;
}
#track2 {
    background-color:#BCE6D6;
    height: 10em;
    width: 15px;
 }
 #handle2 {
    background-color:#30679B;
    height: 1em;
    width: 15px;
}
#sliding {
font: 13px verdana;
}
#changed {
font: 13px verdana;
}

</style>
</head>
<body>
<h4>Mashup of Horizontal + Vertical Sliders</h4>

<div id="track1" class="track">
   <div id="handle1" class="handle"></div>
</div>
<p id="sliding"></p>
<p id="changed"></p>

<div id="track2">
<div id="handle2"></div>
</div>



</body>
</html>