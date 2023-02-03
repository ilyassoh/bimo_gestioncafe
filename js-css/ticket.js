// Ce fichier est fonctionne quand le caissiers fini de choix des produits et veut générer le ticket 

var oldContent 
function pushTicket(){
    const produits = document.getElementById('prod-choisis').children
    if (produits.length==0){
        alert("Aucun Produit n'a été choisi !")
    }
    else {
        oldContent = document.body.innerHTML
        const listProd = document.getElementById('listProd')
        var prod 
        let gT = 0.0
        for (let i=1 ; i<produits.length+1 ; i++){
            prod = document.createElement('tr')
            prod.setAttribute('id','prodT'+i)
            listProd.appendChild(prod)
            let qtte = document.createElement('td')
            qtte.setAttribute('id','qtte'+i)
            let data = document.createElement('td')
            data.setAttribute('id','data'+i)
            let total = document.createElement('td')
            total.setAttribute('id','total'+i)
            prod.appendChild(qtte)
            prod.appendChild(data)
            prod.appendChild(total)
            let quantite = produits[i-1].children[0].children[1].children[3].innerText
            let label = produits[i-1].children[0].children[0].children[0].innerText
            let prixP = produits[i-1].children[0].children[1].children[1].innerText
            let prix = prixP.replace(/[^0-9]/g,'');
            qtte.innerHTML = quantite
            data.innerHTML = label+' ('+prix+' dh)'
            total.innerHTML = quantite * prix + ' DH'
            gT += quantite * prix
            document.getElementById('part4').children[0].children[1].innerHTML = produits.length
        }
        const date = new Date()
        var temps = document.getElementById('temps').children
        temps[0].innerHTML = date.toLocaleDateString()
        temps[1].innerHTML = date.toLocaleTimeString()
        let gTotal = document.getElementById('part4').children[2].children[1]
        gTotal.innerHTML = gT + (gT*20)/100 + ' DH'
        const ticket = document.getElementById('parTicket1').children
        document.body.innerHTML = ""
        let teck = document.createElement('div')
        teck.setAttribute('id','ticket')
        document.body.appendChild(teck)
        teck.innerHTML = ticket[0].innerHTML
        teck.style.display = "block"
        document.body.style.backgroundImage = "radial-gradient(#43101a 30%,#27090f 70%)"
        document.getElementById('ticket').style.backgroundColor = "white"
        let form3 = document.createElement('form')
        form3.setAttribute('id' , 'formTicket')
        form3.setAttribute('method' , 'POST')
        form3.setAttribute('action' , '../actions/generer.php')
        document.body.appendChild(form3)
        let nbrP = document.createElement('input')
        nbrP.setAttribute('type','number')
        nbrP.setAttribute('name','nbrP')
        nbrP.setAttribute('value',produits.length)
        form3.appendChild(nbrP)
        let caiss = document.createElement('input')
        caiss.setAttribute('type','text')
        caiss.setAttribute('name','CAISSIER')
        var CAISSIER = document.getElementById('CAISSIER').innerText
        caiss.setAttribute('value',CAISSIER)
        form3.appendChild(caiss)
        let time = document.createElement('input')
        time.setAttribute('type','text')
        time.setAttribute('name','temps')
        time.setAttribute('value',temps[0].innerText+' - '+temps[1].innerText)
        form3.appendChild(time)
        for (let i=1 ; i<produits.length+1 ; i++){
            let quantite = produits[i-1].children[0].children[1].children[3].innerText
            let label = produits[i-1].children[0].children[0].children[0].innerText
            let prixP = produits[i-1].children[0].children[1].children[1].innerText
            let prix = prixP.replace(/[^0-9]/g,'');
            let nom = document.createElement('input')
            nom.setAttribute('type','text')
            nom.setAttribute('value',label)
            nom.setAttribute('name','Prd'+i)
            let qte = document.createElement('input')
            qte.setAttribute('type','number')
            qte.setAttribute('value',quantite)
            qte.setAttribute('name','Qnt'+i)
            form3.appendChild(nom)
            form3.appendChild(qte)
        }
        document.getElementById('formTicket').style.display = "none"
        let divs = document.createElement('div')
        divs.setAttribute('id','divs')
        document.body.appendChild(divs)
        let btn1 = document.createElement('button')
        btn1.innerHTML = 'Retourner'
        btn1.setAttribute('onclick','retourner()')
        divs.appendChild(btn1)
        let btn2 = document.createElement('button')
        btn2.innerHTML = 'Imprimer'
        btn2.setAttribute('onclick','imprimer()')
        divs.appendChild(btn2)
    }
    
}

// Revenir à la page des produits 
function retourner(){
    document.body.innerHTML = oldContent
}

//Imprimer Ticket 
function imprimer(){
    document.getElementById('divs').style.display="none"
    window.print()
    document.getElementById('formTicket').submit()
}
