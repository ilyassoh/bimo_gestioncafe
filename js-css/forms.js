// Ce fichier permet de créer le formulaire soit pour les produits ou pour les caissiers ......... au lieu de les écrire en Html et les masquer ... 


// function qui vide la page 
function disNone(){
    document.getElementById("cafe").style.display="none"
    document.getElementById("caissiers").style.display="none"
    document.getElementById("categories").style.display="none"
    document.getElementById("commande").style.display="none"
    document.getElementById("ligne_commande").style.display="none"
    document.getElementById("produits").style.display="none"
}

// Editer sur un caissier 
function editCaiss(idCaiss){
    disNone()
    var tr = document.getElementById(idCaiss).children
    var container = document.getElementById('container1')
    var form1 = document.createElement('form')
    form1.setAttribute('method','POST')
    form1.setAttribute('id','editCaiss')
    form1.setAttribute('action','../actions/exDash.php')
    form1.setAttribute('enctype','multipart/form-data')
    container.appendChild(form1)
    let h2 = document.createElement('h2')
    h2.innerHTML = 'Editer sur les Caissiers'
    form1.appendChild(h2)
    let title = document.createElement('input')
    title.setAttribute('name','title')
    title.setAttribute('value','editCaissier')
    form1.appendChild(title)
    title.style.display = 'none'
    let id = document.createElement('input')
    id.setAttribute('name','id')
    id.setAttribute('value',tr[0].innerText)
    form1.appendChild(id)
    id.style.display = 'none'
    let lable1 = document.createElement('label')
    lable1.setAttribute('for','username')
    lable1.innerHTML = ' Username : '
    form1.appendChild(lable1)
    let br5 = document.createElement('br')
    form1.appendChild(br5)
    let username = document.createElement('input')
    username.setAttribute('name','username')
    username.setAttribute('value',tr[1].innerText)
    form1.appendChild(username)
    let br1 = document.createElement('br')
    form1.appendChild(br1)
    let lable2 = document.createElement('label')
    lable2.setAttribute('for','password')
    lable2.innerHTML = ' Password : '
    form1.appendChild(lable2)
    let br6 = document.createElement('br')
    form1.appendChild(br6)
    let password = document.createElement('input')
    password.setAttribute('name','password')
    password.setAttribute('value',tr[2].innerText)
    form1.appendChild(password)
    let br2 = document.createElement('br')
    form1.appendChild(br2)
    let lable3 = document.createElement('label')
    lable3.setAttribute('for','telephone')
    lable3.innerHTML = ' Telephone : '
    form1.appendChild(lable3)
    let br7 = document.createElement('br')
    form1.appendChild(br7)
    let telephone = document.createElement('input')
    telephone.setAttribute('name','telephone')
    telephone.setAttribute('value',tr[3].innerText)
    form1.appendChild(telephone)
    let br3 = document.createElement('br')
    form1.appendChild(br3)
    let lable4 = document.createElement('label')
    lable4.setAttribute('for','nbTickets')
    lable4.innerHTML = ' Nombre de Demandes : '
    form1.appendChild(lable4)
    let br8 = document.createElement('br')
    form1.appendChild(br8)
    let nbTickets = document.createElement('input')
    nbTickets.setAttribute('name','nbTickets')
    nbTickets.setAttribute('value',tr[4].innerText)
    form1.appendChild(nbTickets)
    let br4 = document.createElement('br')
    form1.appendChild(br4)
    let btn = document.createElement('button')
    btn.innerHTML = 'Enregistrer'
    form1.appendChild(btn)
    btn.onclick = function (){
        form1.submit()
    }
}

// Supprimer un caissiers 
function suppCaiss(idCaiss){
    var container = document.getElementById('container1')
    var form1 = document.createElement('form')
    form1.setAttribute('method','POST')
    form1.setAttribute('id','suppCaiss')
    form1.setAttribute('action','../actions/exDash.php')
    container.appendChild(form1)
    let title = document.createElement('input')
    title.setAttribute('name','title')
    title.setAttribute('value','suppCaissier')
    form1.appendChild(title)
    let id = document.createElement('input')
    id.setAttribute('name','id')
    id.setAttribute('value',idCaiss)
    form1.appendChild(id)
    form1.submit()
}

// Ajouter un nouveau caissiers 
function ajoutCaissier(){
    disNone()
    const container1 = document.getElementById('container1')
    let form5 = document.createElement('form')
    form5.setAttribute('method','POST')
    form5.setAttribute('id','ajoutCaissier')
    form5.setAttribute('action','../actions/exDash.php')
    container1.appendChild(form5)
    let titre = document.createElement('h2')
    titre.innerHTML = "Ajouter Neveau Caissier : "
    form5.appendChild(titre)
    let br = document.createElement('br')
    form5.appendChild(br)
    let title = document.createElement('input')
    title.setAttribute('name','title')
    title.setAttribute('value','ajoutCaissier')
    form5.appendChild(title)
    title.style.display="none"
    let username = document.createElement('label')
    username.setAttribute('for', 'username')
    username.innerHTML = "Nom de Caissier : "
    let br0 = document.createElement('br')
    let usernameI = document.createElement('input')
    usernameI.setAttribute('name','username')
    usernameI.setAttribute('id','username')
    usernameI.setAttribute('placeholder','Nom de Caissier')
    form5.appendChild(username)
    form5.appendChild(br0)
    form5.appendChild(usernameI)
    let br3 = document.createElement('br')
    form5.appendChild(br3)
    let br7 = document.createElement('br')
    form5.appendChild(br7)
    let password = document.createElement('label')
    password.setAttribute('for', 'password')
    password.innerHTML = "Password de Caissier : "
    let br1 = document.createElement('br')
    let passwordI = document.createElement('input')
    passwordI.setAttribute('name','password')
    passwordI.setAttribute('id','password')
    passwordI.setAttribute('placeholder','Password de Caissier')
    form5.appendChild(password)
    form5.appendChild(br1)
    form5.appendChild(passwordI)
    let br4 = document.createElement('br')
    form5.appendChild(br4)
    let br9 = document.createElement('br')
    form5.appendChild(br9)
    let phone = document.createElement('label')
    phone.setAttribute('for', 'phone')
    phone.innerHTML = "Telephone de Caissier : "
    let br2 = document.createElement('br')
    let phoneI = document.createElement('input')
    phoneI.setAttribute('name','phone')
    phoneI.setAttribute('id','phone')
    phoneI.setAttribute('placeholder','Téléphone de Caissier')
    form5.appendChild(phone)
    form5.appendChild(br2)
    form5.appendChild(phoneI)
    let br6 = document.createElement('br')
    form5.appendChild(br6)
    let br10 = document.createElement('br')
    form5.appendChild(br10)
    let btn = document.createElement('button')
    btn.innerHTML = 'Enregistrer'
    form5.appendChild(btn)
    btn.onclick = function (){
        form5.submit()
    }
}

// Editer un Produit 
function editProd(idProd){
    disNone()
    const container1 = document.getElementById('container1')
    var tab2 = document.getElementById("p"+idProd).children
    let form2 = document.createElement('form')
    container1.appendChild(form2)
    form2.setAttribute('method','POST')
    form2.setAttribute('id','editProduit')
    form2.setAttribute('action','../actions/exDash.php')
    form2.setAttribute('enctype','multipart/form-data')
    let title = document.createElement('h2')
    title.innerHTML = 'Editer Produit'
    form2.appendChild(title)
    let input1 = document.createElement('input')
    input1.setAttribute('type','text')
    input1.setAttribute('name','title')
    input1.setAttribute('value','editProd')
    input1.style.display = "none" 
    form2.appendChild(input1)
    let inputid = document.createElement('input')
    inputid.setAttribute('type','text')
    inputid.setAttribute('name','idp')
    inputid.setAttribute('value',idProd)
    inputid.style.display = "none" 
    form2.appendChild(inputid)
    let label2 = document.createElement('label')
    label2.innerHTML = "Labelle : "
    form2.appendChild(label2)
    let br1 = document.createElement('br')
    form2.appendChild(br1)
    let input2 = document.createElement('input')
    input2.setAttribute('type','text')
    input2.setAttribute('name','label')
    input2.setAttribute('value',tab2[1].innerText)
    form2.appendChild(input2)
    let br2 = document.createElement('br')
    form2.appendChild(br2)
    let label3 = document.createElement('label')
    label3.innerHTML = "Prix : "
    form2.appendChild(label3)
    let br3 = document.createElement('br')
    form2.appendChild(br3)
    let input3 = document.createElement('input')
    input3.setAttribute('type','text')
    input3.setAttribute('name','prix')
    input3.setAttribute('value',tab2[2].innerText)
    form2.appendChild(input3)
    let br4 = document.createElement('br')
    form2.appendChild(br4)
    let label4 = document.createElement('label')
    label4.innerHTML = "Photo : "
    form2.appendChild(label4)
    let br5 = document.createElement('br')
    form2.appendChild(br5)
    let input4 = document.createElement('input')
    input4.setAttribute('type','file')
    input4.setAttribute('name','photo')
    input4.setAttribute('value',tab2[3].innerText)
    form2.appendChild(input4)
    let br6 = document.createElement('br')
    form2.appendChild(br6)
    let label5 = document.createElement('label')
    label5.innerHTML = "Nb_Commandes : "
    form2.appendChild(label5)
    let br7 = document.createElement('br')
    form2.appendChild(br7)
    let input5 = document.createElement('input')
    input5.setAttribute('type','number')
    input5.setAttribute('name','nb_comm')
    input5.setAttribute('value',tab2[4].innerText)
    form2.appendChild(input5)
    let br9 = document.createElement('br')
    form2.appendChild(br9)
    let label6 = document.createElement('label')
    label6.innerHTML = "Id_Categorie : "
    form2.appendChild(label6)
    let br10 = document.createElement('br')
    form2.appendChild(br10)
    let input6 = document.createElement('input')
    input6.setAttribute('type','Number')
    input6.setAttribute('name','id_cat')
    input6.setAttribute('value',tab2[5].innerText)
    form2.appendChild(input6)
    let br11 = document.createElement('br')
    form2.appendChild(br11)
    let btn2 = document.createElement('button')
    btn2.innerHTML = 'Enregistrer'
    form2.appendChild(btn2)
    btn2.onclick = function (){
        form2.submit()
    }
}

// Supprimer un Produit 
function suppProd(idProd){
    var container = document.getElementById('container1')
    var form4 = document.createElement('form')
    form4.setAttribute('method','POST')
    form4.setAttribute('id','suppCaiss')
    form4.setAttribute('action','../actions/exDash.php')
    container.appendChild(form4)
    let title = document.createElement('input')
    title.setAttribute('name','title')
    title.setAttribute('value','suppProduit')
    form4.appendChild(title)
    let id = document.createElement('input')
    id.setAttribute('name','id')
    id.setAttribute('value',idProd)
    form4.appendChild(id)
    form4.submit()
}

// Ajouter un nouvaeu produit 
function ajoutProduit(){
    disNone()
    const container1 = document.getElementById('container1')
    let form5 = document.createElement('form')
    form5.setAttribute('method','POST')
    form5.setAttribute('id','ajoutCaissier')
    form5.setAttribute('action','../actions/exDash.php')
    form5.setAttribute('enctype','multipart/form-data')
    container1.appendChild(form5)
    let titre = document.createElement('h2')
    titre.innerHTML = "Ajouter Neveau Produit : "
    form5.appendChild(titre)
    let br0 = document.createElement('br')
    form5.appendChild(br0)
    let title = document.createElement('input')
    title.setAttribute('name', 'title')
    title.setAttribute('value','ajoutProduit')
    form5.appendChild(title)
    title.style.display="none"
    let br1 = document.createElement('br')
    form5.appendChild(br1)
    let label = document.createElement('label')
    label.setAttribute('for','label')
    label.innerHTML = "Label de Produit : "
    let labelI = document.createElement('input')
    labelI.setAttribute('name','label')
    labelI.setAttribute('type','text')
    labelI.setAttribute('placeholder','Label')
    form5.appendChild(label)
    let br2 = document.createElement('br')
    form5.appendChild(br2)
    form5.appendChild(labelI)
    let br5 = document.createElement('br')
    form5.appendChild(br5)    
    let prix = document.createElement('label')
    prix.setAttribute('for','prix')
    prix.innerHTML = "Prix de Produit : "
    let prixI = document.createElement('input')
    prixI.setAttribute('name','prix')
    prixI.setAttribute('type','number')
    prixI.setAttribute('placeholder','Prix')
    form5.appendChild(prix)
    let br3 = document.createElement('br')
    form5.appendChild(br3)
    form5.appendChild(prixI)
    let br6 = document.createElement('br')
    form5.appendChild(br6)
    let image = document.createElement('label')
    image.setAttribute('for','image')
    image.innerHTML = 'Image e Produit : '
    let imageI = document.createElement('input')
    imageI.setAttribute('type','file')
    imageI.setAttribute('name','image')
    form5.appendChild(image)
    let br4 = document.createElement('br')
    form5.appendChild(br4)
    form5.appendChild(imageI)
    let br7 = document.createElement('br')
    form5.appendChild(br7)
    let cat = document.createElement('label')
    cat.setAttribute('for','cat')
    cat.innerHTML = "Catégorie de Produit : "
    let catI = document.createElement('select')
    catI.setAttribute('name','cat')
    var option
    const cats = ["Cafes chouds", "Boissons", "Nourriture"];
    option = document.createElement('option')
    option.setAttribute('value','')
    option.innerHTML = "Choisir Catégorie"
    catI.appendChild(option)
    for (i=1;i<4;i++){
        option = document.createElement('option')
        option.setAttribute('value','cat'+i)
        option.innerHTML = cats[i-1]
        catI.appendChild(option)
    }
    form5.appendChild(cat)
    let br8 = document.createElement('br')
    form5.appendChild(br8)
    form5.appendChild(catI)
    let br9 = document.createElement('br')
    form5.appendChild(br9)
    catI.style.fontSize = "18px"
    let btn = document.createElement('button')
    btn.innerHTML = 'Enregistrer'
    form5.appendChild(btn)
    btn.onclick = function (){
        form5.submit()
    }
}