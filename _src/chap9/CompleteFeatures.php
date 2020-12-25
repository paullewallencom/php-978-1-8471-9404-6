<html>
<head>
<title>Multiple Features With Effects</title>
<script type="text/javascript" src="src/lib/prototype.js"></script>
<script type="text/javascript" src="src/src/scriptaculous.js"></script>
<script type="text/javascript" src="src/src/effects.js"></script>
<script type="text/javascript" src="src/src/controls.js"></script>
<script src="includes/scriptaculous/src/sound.js" type="text/javascript"></script>

<script type="text/javascript">
   window.onload = function() {
  new Ajax.InPlaceEditor($('editme'), 'readValue.php', {highlightcolor:'#BCE6D6'});

   new Draggable('myDrag',{revert:true, endeffect: function(element){
                               new Effect.Opacity(element,
                               {from:0, to:1.0, duration:10} )
                            }
});

 new Control.Slider('handle1' , 'track1');

}
</script>
<style type="text/css">

body {

 font: 13px verdana;

}
h3 {
font-weight:bold;
}

#section {
font-weight:bold;
color:#30679B;
}

#editme{

     width: 200px;
      font: 13px verdana;
}

#dragedit{

     width: 200px;

      background-color:#BCE6D6;
}

#myDrag {

      background-color:#E2F1B1;
      width:300px;
}

#track1 {
   background-color:#BCE6D6;
   height: 1em;
   width: 150px;
}
#handle1 {
   background-color:#30679B;
   height: 1em;
   width: 7px;
}

#effects {

background-color:#FAFAFA;
width:300px;
}


</style>
</head>
<body>
<h3>Scriptaculous Features At a Glance </h3>


<h4 id="section">Effects In Scriptaculous</h4>
<div id="effects">
<div id="dropout" onclick="new Effect.DropOut(this);">Drop Out Effect</div>
<br>

<div id="fade" onclick="new Effect.Fade(this);">Fade Effect</div>
<br>
<div id="blinddown" onclick="new Effect.BlindDown(this);">BlindDown Effect</div>
<br>
<div id="ex-highlight" onclick="new Effect.Highlight(this);">Highlight Effect</div>
<br>
</div>
<p>

<h4 id="section">In Place Editing With Effects</h4>
<div id="editme">Click To Edit Me</div>
<p>
<h4 id="section">Drag & Drop With Effects</h4>
<div id="myDrag">
iPhone <p>
</div>
<p>


<h4 id="section">Sliders With Scriptaclous</h4>
<div id="track1">
   <div id="handle1"></div>
</div>

<h4 id="section">Multi Media with Scriptaclous</h4>
<a href="#" onclick="Sound.play('dance_of_dead.MP3'); return false">Play Song</a>&nbsp;&nbsp;

</body>
</html>
