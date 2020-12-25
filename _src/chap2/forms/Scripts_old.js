function disableForm(){
$("addForm").disable();

}

function enableForm(){
$("addForm").enable();

}

function findFirstElement() {
myElement = Form.findFirstElement("addForm");
alert(myElement.value);
}


function readAllElements() {
var myElements = Form.getElements('addForm');
for(i = 0; i < myElements.length; i++) {
    alert(myElements[i].value);
}

}

function readInputElements() {
var myInputs = Form.getInputs('addForm');
for(i = 0; i < myInputs.length; i++) {
    alert(myInputs[i].value);
}
}

function serializeForm() {
myForm = Form.serialize("addForm");
alert(myForm);
}

function resetForm() {
myForm = Form.reset("addForm");

}

function FocusOnFirstElement() {
Form.focusFirstElement('addForm');
}
