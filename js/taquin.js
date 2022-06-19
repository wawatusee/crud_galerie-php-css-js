function taquin() {
    let ratioImage=getComputedStyle(document.documentElement).getPropertyValue('--ratioImage');
    /*Sélection de toutes les div identifiées pièces, dans un tableau "lesPieces", on range leurs réfèrences*/
    var lesPieces = document.getElementsByClassName("piece");
    /*Trouver la piece invisible, */
    pieceInvisible = document.querySelector("#pieceInvisible");
    /*stoquer son style dans une variable :*/
    stylePieceInvisible = getComputedStyle(pieceInvisible);
    /*Tableau de positions autres */
    var shuffleArray=[9,11,2,14,15,1,3,8,16,7,4,12,5,13,6,10];
    /*Boucle sur les  */
    for (var i = 0; i < lesPieces.length; i++) {
        let largeurPiece=100;
        let hauteurPiece=largeurPiece*ratioImage;
        var chaquePiece = lesPieces[i];
        /*Placement de l'image de fond pour chaque piece */
        chaquePiece.style.backgroundPositionX=`${-(i%4)*largeurPiece}px`;
        chaquePiece.style.backgroundPositionY=`${-Math.floor(i/4)*hauteurPiece}px`;
        /*Fin du Placement du fond pour chaque piece */
        /*chaquePiece.style.order = i+1;*/
        chaquePiece.style.order =shuffleArray[i];
        /*Mise en place des écouteurs sur chaque pièce */
        chaquePiece.addEventListener("click", joue);
    };
};
function joue(evt) {
    //var nouvelleOrdrePieceCliquee=ordrePieceInvisible;
    var sonStyle = getComputedStyle(evt.target);
    if (pieceCliquable(stylePieceInvisible.order, sonStyle.order)) {
        // Echange l'order entre la pièce invisible et la pièce cliquée
        let temporaryOrder = pieceInvisible.style.order;
        pieceInvisible.style.order = sonStyle.order;
        evt.target.style.order = temporaryOrder;
        console.log('La pièce invisible qui est en position ' + stylePieceInvisible.order + ' prend la position de la piece cliquée ' + sonStyle.order);
    } else {
        console.log(evt);
        console.log(sonStyle.order);
        console.log('Cliquabilité: la pièce invisible est en place ' + stylePieceInvisible.order + " || Et la tienne en " + sonStyle.order);
    };
    //taquinAfficheOrder();
   if( testIssue()){
        document.getElementById("pieceInvisible").style.visibility ="visible";
       console.log("Piece visible");
   };
};
function pieceCliquable(pieceInvisible, pieceAtester, largueurTaquin = 4) {
    pieceInvisible = Number(pieceInvisible);
    pieceAtester = Number(pieceAtester);
    //Cliquable est définit comme true quand l'ordre de la piece testée est égale à l'ordre de la pièce invisible,-1 ou +1 ou -4 ou +4 sauf quand le reste de la division de l'orde de la piece invisible par la largeur du taquin est égal à 1 ou à 0
    var jouable = (pieceAtester == (pieceInvisible - 1) && (pieceInvisible % largueurTaquin != 1)) // Vérifie si déplaçable vers la gauche
        ||
        (pieceAtester == (pieceInvisible + 1) && (pieceInvisible % largueurTaquin != 0)) // Vérifie si déplaçable vers la droite
        ||
        (pieceAtester == (pieceInvisible + largueurTaquin)) // Vérifie si déplaçable vers le bas
        ||
        (pieceAtester == (pieceInvisible - largueurTaquin)); // Vérifie si déplaçable vers le haut
    return jouable;
}


function taquinAfficheOrder() {
    var lesPieces = document.getElementsByClassName("piece");
    let orderArray=[];
    stylePieceInvisible = getComputedStyle(pieceInvisible);
    for (var i = 0; i < lesPieces.length; i++) {
        var chaquePiece = lesPieces[i];
        var sonStyle = getComputedStyle(chaquePiece);
        orderArray.push(sonStyle);
        console.log('piece'+i+' :')
        console.log(sonStyle.order);
    };
    console.log(orderArray);
    testIssue();
};
function testIssue(){
    let nbrPiecesOrdonnees=0;
    var lesPieces = document.getElementsByClassName("piece");
    let nbrPieces= lesPieces.length;
    for(var i=0; i<nbrPieces;i++){
        var chaquePiece=lesPieces[i];
        var sonStyle=getComputedStyle(chaquePiece);
        if(sonStyle.order==i+1){
            nbrPiecesOrdonnees+=1;
        }
        if(nbrPiecesOrdonnees>14){
            return true;
        }
    }
    
}
var displayedNumero=false;
function displayPiecesNumber(){
    var numeroButton=document.getElementById("numeroButton");
    var numeroButtonStyle=getComputedStyle(numeroButton);
    console.log(numeroButton);
    var pieces=document.getElementsByClassName("piece");
    if(displayedNumero===false){
        for (i=0; i<pieces.length; i++){
            var piece=pieces[i]
            piece.textContent=i+1;
        }
        displayedNumero=true;
    }else{
        for (i=0; i<pieces.length; i++){
            var piece=pieces[i]
            piece.textContent=" ";
        }
        displayedNumero=false;
    }
    //numeroButton.style.color="green";
}