<html>
<head>
<title>Multiple Features With Effects</title>
<script type="text/javascript" src="src/lib/prototype.js"></script>
<script type="text/javascript" src="src/src/scriptaculous.js"></script>
<script type="text/javascript" src="src/src/effects.js"></script>
<script type="text/javascript" src="src/src/controls.js"></script>

<script type="text/javascript">
   window.onload = function() {
     new Ajax.InPlaceEditor($('editme'), 'readValue.php', {highlightcolor:'#BCE6D6'});

      new Draggable('myDrag',{revert:true, endeffect: function(element){
                               new Effect.Opacity(element,
                               {from:0, to:1.0, duration:10} )
                            }
});

	  new Ajax.InPlaceEditor($('dragedit'), 'readValue.php');
      new Draggable('dragedit',{revert:true});
}

function changeEffect(ele)
{

 new Effect.Opacity(element, {from:0, to:1.0, duration:10});

}
</script>
<style type="text/css">
#section { font: 13px verdana;
font-weight:bold;
}

#editme{

     width: 200px;
      font: 13px verdana;
}

#dragedit{

     width: 200px;
      font: 13px verdana;
      background-color:#BCE6D6;
}

#myDrag {
      font: 13px verdana;
      background-color:#E2F1B1;
      width:300px;
}

</style>
</head>
<body>
<h4 id="section">In Place Editing With Effects</h4>
<div id="editme">Click To Edit Me</div>
<p>
<h4 id="section">Drag & Drop With Effects</h4>
<div id="myDrag">
iPhone <p>
</div>

<h4 id="section">(Out Of Box) Drag & Drop + In Place Editing  With Effects</h4>
<div id="dragedit">Drag Me Or Click To Edit</div>
<p>



</body>
</html>
