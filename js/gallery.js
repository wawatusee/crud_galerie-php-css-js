selectRadioButton();
function selectRadioButton(){
var radioButton=document.getElementsByName("defaultTaquin");
/*Listener on each radio button*/
    for (i=0;i<radioButton.length;i++){
        radioButton[i].addEventListener("click",onSelect);
    }
return radioButton[0].value;
}
function onSelect(evt){
    var imageSelected=evt.target.value;
    console.log(imageSelected);
    let toSend= '"traitementSelection.php?fileName='+imageSelected+'"';
    window.location="traitementSelection.php?fileName="+imageSelected;
    //window.location="https://google.fr?q=lapin"
    console.log(toSend);
}
