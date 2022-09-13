

function editaDados(){

    const divDadosResgatados = document.getElementById('dados-resgatados');
    const divDadosAEnviar = document.getElementById('dados-enviar');

    if(divDadosResgatados.style.display == 'block'){

        divDadosAEnviar.style.display = 'block';
        divDadosResgatados.style.display = 'none';
        
    }

}

function habilitaCampos(){

    const inputNome = document.querySelector('#nomeCliente');
    const inputTelefone = document.querySelector('#telefoneCliente');
    const inputEmail = document.querySelector('#emailCliente');
    const inputSenha = document.querySelector('#senhaCliente');

    inputNome.disabled = false;
    inputTelefone.disabled = false;
    inputEmail.disabled = false;
    inputSenha.disabled = false;
}

function desabilitaCampos(){

    const divDadosResgatados = document.getElementById('dados-resgatados');
    const divDadosAEnviar = document.getElementById('dados-enviar');

    divDadosAEnviar.style.display = 'none';
    divDadosResgatados.style.display = 'block';

    
}


function habilitaEndereco(){

    const inputCep = document.querySelector('#cep');
    const inputRua = document.querySelector('#rua');
    const inputBairro = document.querySelector('#bairro');
    const inputComplemento = document.querySelector('#complemento');
    const inputNumero = document.querySelector('#numero');
    const inputUf = document.querySelector('#uf');

    if (inputCep.disabled == true && inputRua.disabled == true && inputBairro.disabled == true && inputComplemento.disabled == true && inputNumero.disabled == true && inputUf.disabled == true) {
        
        inputCep.disabled = false;
        inputRua.disabled = false;
        inputBairro.disabled = false;
        inputComplemento.disabled = false;
        inputNumero.disabled = false;
        inputUf.disabled = false;

    } else {

        inputCep.disabled = true;
        inputRua.disabled = true;
        inputBairro.disabled = true;
        inputComplemento.disabled = true;
        inputNumero.disabled = true;
        inputUf.disabled = true;

        }
}