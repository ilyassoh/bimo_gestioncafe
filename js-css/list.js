// Ce fichier est spécifiquement pour ajouter un produit au partie des produits selectionnées lorsque on clique sur lui 


var i=0;
var list = new Array()
function exist(x){
    for (i=0;i<list.length;i++){
        if (x==list[i])return true ;
    }
    return false 
}

function ajouter(data){
    i++; 
    const gTotal = document.getElementById('global-total')
    const nbrProdits = document.getElementById('nbr-produits')
    if (!exist(data)){
        const prod_choisis = document.getElementById('prod-choisis')
        let prod = document.createElement('div')
        prod_choisis.appendChild(prod)
        prod.setAttribute('id', 'prod'+data);
        prod.setAttribute('class', 'prod');
        prod.classList.add('prod'+i);
        let donnee = document.createElement('div')
        let supprimer = document.createElement('img')
        prod.appendChild(donnee)
        donnee.setAttribute('id', 'donnee'+i);
        donnee.setAttribute('class', 'donnee');
        prod.appendChild(supprimer)
        supprimer.src = '../imgs/supp.png'
        supprimer.setAttribute('width','40px')
        supprimer.setAttribute('onclick','supprimer('+data+')')
        let partie1 = document.createElement('div')
        let partie2 = document.createElement('div')
        donnee.appendChild(partie1)
        partie1.setAttribute('id', 'partie1');
        partie2.setAttribute('id', 'partie2');
        partie1.setAttribute('class', 'partie1');
        partie2.setAttribute('class', 'partie2');
        donnee.appendChild(partie2)
        let label = document.createElement('span')
        let total = document.createElement('span')
        partie1.appendChild(label)
        label.setAttribute('id','label'+data+data);
        partie1.appendChild(total)
        label.setAttribute('class', 'label');
        total.setAttribute('id', 'total'+data);
        total.setAttribute('class', 'total');
        let unit = document.createElement('span')
        let prix = document.createElement('span')
        let quant = document.createElement('span')
        let quantite = document.createElement('span')
        partie2.appendChild(unit)
        partie2.appendChild(prix)
        partie2.appendChild(quant)
        partie2.appendChild(quantite)
        unit.setAttribute('id', 'unit'+i);
        prix.setAttribute('id', 'prix'+data+data);
        quant.setAttribute('id', 'quant'+i);
        quantite.setAttribute('id', 'quantite'+data);
        unit.setAttribute('class', 'unit');
        prix.setAttribute('class', 'prix');
        quant.setAttribute('class', 'quant');
        quantite.setAttribute('class', 'quantite');
        const prodlabel = document.getElementById('label'+data).innerText
        const prodprix = document.getElementById('prix'+data).innerText
        label.innerHTML = prodlabel
        unit.innerHTML = "Prix d'Unité"
        prix.innerHTML = prodprix
        quant.innerHTML = 'Quantite : '
        quantite.innerHTML = 1
        total.innerHTML = parseFloat(prodprix)+' dh'
        list.push(data)
        gTotal.innerHTML =  parseFloat(gTotal.innerText)+parseFloat(total.innerText)+' dh';
        nbrProdits.innerHTML =  parseFloat(nbrProdits.innerText)+1;
    }
    else {
        const quantite = document.getElementById('quantite'+data);
        quantite.innerHTML = Number(quantite.innerText)+1;
        const total = document.getElementById('total'+data);
        const prix = document.getElementById('prix'+data);
        total.innerHTML = parseFloat(total.innerText)+parseFloat(prix.innerText)+ ' dh';
        gTotal.innerHTML =  parseFloat(gTotal.innerText)+parseFloat(prix.innerText)+' dh';
    }
}

//Suppression d'un prosuit séléctionné par erreur 
function supprimer(data){
    const quantite = document.getElementById('quantite'+data);
    if (quantite.innerText=='1'){
        const gTotal = document.getElementById('global-total')
        const totaln = document.getElementById('total'+data);
        gTotal.innerHTML = parseFloat(gTotal.innerText)-parseFloat(totaln.innerText)+' dh';
        const nbrProdits = document.getElementById('nbr-produits')
        nbrProdits.innerHTML =  parseFloat(nbrProdits.innerText)-1;
        document.getElementById('prod'+data).remove()
        for (let k=0;k<list.length;k++){
            if(list[k]==data){
                for (let j=k;j<list.length-1;j++)list[j]=list[j+1]
            }
        }
        list.pop()
    }
    else{
        const prix = document.getElementById('prix'+data);
        const gTotal = document.getElementById('global-total')
        const totaln = document.getElementById('total'+data)
        totaln.innerHTML = parseFloat(totaln.innerText)-parseFloat(prix.innerText)+ ' dh';
        gTotal.innerHTML = parseFloat(gTotal.innerText)-parseFloat(prix.innerText)+ ' dh';
        quantite.innerHTML = Number(quantite.innerText)-1
    }
}