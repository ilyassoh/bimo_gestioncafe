// Ce fichier pour la bar de recherche 

function rechercher() {
    var input, filter, produits, txtValue , prod , labelProd;
    input = document.getElementById("rechercher");
    filter = input.value.toUpperCase();
    produits = document.getElementById("produits").children;
    for (let i=0; i<produits.length ; i++){
        produits[i].style.display = ""
    }
    document.body.style.overflow = "auto"
    var nbrProds = produits[0].children.length + produits[1].children.length + produits[2].children.length
    for (i = 0; i < produits[0].children.length; i++) {
        prod = produits[0].children[i] 
        labelProd = produits[0].children[i].children[1]
        txtValue = labelProd.textContent || labelProd.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            prod.style.display = "";
        } else {
            prod.style.display = "none";
        }
    }
    for (i = 0; i < produits[1].children.length; i++) {
        prod = produits[1].children[i] 
        labelProd = produits[1].children[i].children[1]
        txtValue = labelProd.textContent || labelProd.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            prod.style.display = "";
        } else {
            prod.style.display = "none";
        }
    }
    for (i = 0; i < produits[2].children.length; i++) {
        prod = produits[2].children[i] 
        labelProd = produits[2].children[i].children[1]
        txtValue = labelProd.textContent || labelProd.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            prod.style.display = "";
        } else {
            prod.style.display = "none";
        }
    }
}


//Ici pas pour la recherche mais on aura besoin de cette fonction quand un caissier oublie sn mot de passe 
function oublier(){
    document.getElementById('login-page').style.display = "none"
    var forms = document.getElementsByTagName('form')
    forms[0].style.display = "none"
    forms[1].style.display = ""
}



