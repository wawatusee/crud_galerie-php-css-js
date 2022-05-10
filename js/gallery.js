var selected=selectRadioButton();
function selectRadioButton(){
    var radioButton=document.getElementsByName("defaultTaquin");
    return radioButton[0].value;
}
console.log(selected);