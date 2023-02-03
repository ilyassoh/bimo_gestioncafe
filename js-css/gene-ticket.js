//Traitement 1 : Catégories & Produits
function disCatsNone(){
    for(let i=1;i<4;i++){
        document.getElementById('pcat'+i).style.display = "none"
        document.getElementById('cat'+i).style.backgroundColor = "#6f1a2a"
    }
}
function categorie(cat){
    if(cat=='cat1'){
        disCatsNone()
        document.getElementById('pcat1').style.display = "flex"
        document.getElementById('cat1').style.backgroundColor = "#843619"
    }
    if(cat=='cat2'){
       disCatsNone()
       document.getElementById('pcat2').style.display = "flex"
       document.getElementById('cat2').style.backgroundColor = "#843619"
    }
    if(cat=='cat3'){
        disCatsNone()
        document.getElementById('pcat3').style.display = "flex"
        document.getElementById('cat3').style.backgroundColor = "#843619"
     }
}
