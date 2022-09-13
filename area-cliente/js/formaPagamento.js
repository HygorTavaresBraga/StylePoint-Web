function mostraSelect(){

    const idSelectCartao = document.getElementById('selectCartao');

    if(idSelectCartao.style.display == 'none'){

        idSelectCartao.style.display = 'flex';

    }
}

function ocultaSelect(){

    const idSelectCartao = document.getElementById('selectCartao');

    if(idSelectCartao.style.display == 'flex'){

        idSelectCartao.style.display = 'none'
        selectParcela.style.display = 'none'

    }
}

function MostraOcultaParcela() {

    const idOption = document.querySelector('#opt-cartao');
    const atributoOpt = idOption.getAttribute('data-tipo');
    
    let idSelectParcela = document.querySelector('#selectParcela');
    if(atributoOpt == "Crédito"){

        idSelectParcela.style.display = "flex";

    }else if(atributoOpt != "Crédito"){
        
        idSelectParcela.style.display = "none";
    }
    
}
