//ARQUIVO QUE CONTÉM FUNÇOES EM JAVASCRIPT PARA VALIDAR FORMULÁRIOS

//função que valida o uso de CapsLook --> http://www.codeproject.com/Articles/17180/Detect-Caps-Lock-with-Javascript
function capLock(e) {
    kc = e.keyCode ? e.keyCode : e.which;
    sk = e.shiftKey ? e.shiftKey : ((kc == 16) ? true : false);
    if (((kc >= 65 && kc <= 90) && !sk) || ((kc >= 97 && kc <= 122) && sk))
        document.getElementById('capsLK').style.visibility = 'visible';
    else
        document.getElementById('capsLK').style.visibility = 'hidden';
}

//Validador para login obrigatório 
function validaLogSenha(form) {
    if (form.login.value == '') {
        alert("Informe o login!");
        form.login.focus();
        return false;
    }
    return true;
}

//Validador cpf DevMedia --> http://www.devmedia.com.br/validar-cpf-com-javascript/23916
function validaCPF(strCPF) {
    strCPF = strCPF.replace(/[^0-9]/g, '');
    var Soma;
    var Resto;
    Soma = 0;
    if (strCPF == "00000000000")
        return false;
    for (i = 1; i <= 9; i++)
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11))
        Resto = 0;
    if (Resto != parseInt(strCPF.substring(9, 10)))
        return false;
    Soma = 0;
    for (i = 1; i <= 10; i++)
        Soma = Soma + parseInt(strCPF.substring(i - 1, i)) * (12 - i);
    Resto = (Soma * 10) % 11;
    if ((Resto == 10) || (Resto == 11))
        Resto = 0;
    if (Resto != parseInt(strCPF.substring(10, 11)))
        return false;
    return true;
}

//Validador de login se caso haja espacos na string
function validaLogin(login) {
    for (var i = 0; i < login.length; i++) {
        if (login.substring(i, (i + 1)) == " ") {
            return false;
        }
    }
    return true
}

//Validador de caracteres invalidos
function validaCaracteres(string, caracteres) {

    for (var i = 0; i < string.length; i++) {
        for (var j = 0; j < caracteres.length; j++) {
            if (caracteres.substring(j, (j + 1)) == string.substring(i, (i + 1))) {
                return false;
            }
        }
    }
    return true;
}

//Validador para Limite de datas no sistema
function validaDataLimite(form) {
    var data = form.data_rel.value;
    var atual = new Date();
    var anolimite = atual.getFullYear() + 1;
    var dataAtual = atual.getFullYear() + '/' + (atual.getMonth() + 1) + '/' + atual.getDate();
    var dataTest = data.split('/');
    var teste = dataTest[2] + '/' + dataTest[1] + '/' + dataTest[0];
    if (new Date(teste) < new Date(dataAtual)) {
        alert('Data não pode ser anterior à de hoje.');
        return false;
    } else if (dataTest[2] > anolimite) {
        alert('Não pode se lançar datas com ano superior ao ano que vem');
        return false;
    } else {
        return true;
    }
    return true
}

//Validador de Data correta, para que siga os padroes de contagem de dia, ano e mes
function validaDataCerta(formobj) {

    if (formobj.value.length != 10) {
        ;
        return false;
    }

    var data = formobj.value.split("/");
    var dia = data[0];
    var mes = data[1];
    var ano = data[2];

    if (mes < 01 || mes > 12) {
        return false;
    }

    if (ano < 1900 || ano > 2099) {
        return false;
    }

    if ((mes == 01) || (mes == 03) || (mes == 05) || (mes == 07) || (mes == 08) || (mes == 10) || (mes == 12)) {//mes com 31 dias
        if ((dia < 01) || (dia > 31)) {

            return false;
        }
    }
    else if ((mes == 04) || (mes == 06) || (mes == 09) || (mes == 11)) {//mes com 30 dias
        if ((dia < 01) || (dia > 30)) {

            return false;
        }
    }
    else if ((mes == 02)) {//February and leap year
        if ((ano % 4 == 0) && ((ano % 100 != 0) || (ano % 400 == 0))) {
            if ((dia < 01) || (dia > 29)) {

                return false;
            }
        }
        else {
            if ((dia < 01) || (dia > 28)) {
                return false;
            }
        }
    }

    return true;

}

//Valida datas posteriores a lançada
function validaDataPosterior(data1, hora1, data2, hora2) {
    
    var data_1 = data1.split('/');
    var data_2 = data2.split('/');
    var hora_1 = hora1.split(':');
    var hora_2 = hora2.split(':');
    var d1 = new Date(data_1[2], data_1[1], data_1[0], hora_1[0], hora_1[1]);
    var d2 = new Date(data_2[2], data_2[1], data_2[0], hora_2[0], hora_2[1]);
   
    if (d1 > d2) {
        alert('Data e Hora de Chegada não pode ser anterior à Data e Hora de Saída');
        return false;
    }
    return true;
}


//validador de Hora certa, 00:00 à  23:59
function validaHoraCerta(formobj) {
    var horario = formobj.value;
    var hora = horario.substring(0, 2);
    var minuto = horario.substring(3, 5);

    if (horario.length == 5) {
        var valido = true;
        if (hora > 23 || hora < 0) {
            valido = false;
        }
        if (minuto > 59 || minuto < 0) {
            valido = false;
        }

        if (valido == false) {
            alert("Horario inválido");

            return false;
        }
    } else {
        alert("Horario incompleto");
        return false;
    }
    //alert('Passou -->');
    return true;

}

//Validador de formulários de Usuarios
function validaUsuario(form, op) {

    if (form.nome.value == "") {
        alert("Nome não inserido!");
        form.nome.focus();
        return false;
    }


    if (op == 'C') {
        if (form.cpf.value == "") {
            alert("CPF não inserido!");
            form.cpf.focus();
            return false;
        } else if (!validaCPF(form.cpf.value)) {
            alert("cpf invalido");
            form.cpf.focus();
            return false;
        }
    }

    if (form.nascimento.value == "") {
        alert("Data de nascimento não inserida!");
        form.nascimento.focus();
        return false;
    } else if (!validaDataCerta(form.nascimento)) {
        alert("Data Inválida!");
        form.nascimento.focus();
        return false;
    }

    if (op == 'C') {
        if (form.login.value == "") {
            alert("Crie um nome de usuario para logar-se!");
            form.login.focus();
            return false;
        } else if (!validaLogin(form.login.value)) {
            alert("Login Inválido, nao utilize espaços!");
            form.login.focus();
            return false;
        }

        if (!validaCaracteres(form.login.value, "!@#$%¨&*()+-={}[]?:/;><,")) {
            alert("Caracteres: (!@#$%¨&*()+-={}[]?:/;><,) não são permitidos para Login!");
            form.login.value = "";
            form.login.focus();
            return false;
        }

        if (form.senha.value == "") {
            alert("Insira uma senha para sua segurança!");
            form.senha.focus();
            return false;
        }
        if (form.csenha.value == "") {
            alert("Confirme a sua senha digitada!");
            form.csenha.focus();
            return false;
        }
        if (form.senha.value != form.csenha.value) {
            alert("Confirmação de senha não coincide!");
            form.csenha.value = form.senha.value = "";
            form.senha.focus();
            return false;
        } else if (!validaCaracteres(form.senha.value, "!@#$%¨&*()_+-={}[]?:/;><,")) {
            alert("Caracteres: (!@#$%¨&*()_+-={}[]?:/;><,) não são permitidos para senha!");
            form.csenha.value = form.senha.value = "";
            form.senha.focus();
            return false;
        }
    }

    return true;

}

//Validador para formularios de veiculo
function validaVeiculo(form, op) {


    if (form.marca.value == "") {
        alert("Marca não inserido!");
        form.marca.focus();
        return false;
    }

    if (form.modelo.value == "") {
        alert("Modelo não inserido!");
        form.modelo.focus();
        return false;
    }

    if (form.cor.value == "") {
        alert("Cor do veiculo não inserida!");
        form.cor.focus();
        return false;
    }

    if (form.ano.value == "") {
        alert("Insira o ano de fabricação!");
        form.ano.focus();
        return false;
    }

    if (op == 'C') {
        if (form.placa.value == "") {
            alert("É necessario a placa do carro para cadastra-lo!");
            form.placa.focus();
            return false;
        }
    }
    return true;

}

//Validador de formulários de Casa
function validaCasa(form, op) {

    if (form.endereco.value == "") {
        alert("Endereço não inserido!");
        form.endereco.focus();
        return false;
    }

    if (form.bairro.value == "") {
        alert("Bairro não inserido!");
        form.bairro.focus();
        return false;
    }

    if (form.cidade.value == "") {
        alert("Cidade não inserida!");
        form.cidade.focus();
        return false;
    }

    if (form.estado.value == "") {
        alert("Estado não inserido!");
        form.ano.focus();
        return false;
    }
    return true;

}

//Validador de formulários de Vaga
function validaVaga(form, op) {
    if (op == 'C') {
        if (form.casa.value == "") {
            alert("Casa não Selecionada!");
            form.casa.focus();
            return false;
        }
    }

    if (form.tipo.value == "") {
        alert("Tipo não selecionado!");
        form.tipo.focus();
        return false;
    }

    if (form.tamanho.value == "") {
        alert("Tamanho não selecionado!");
        form.cidade.focus();
        return false;
    }

    return true;

}

//Validador de formulários de Enquete
function validaEnquete(form) {

    if (form.proprietario.value == "") {
        alert("Proprietário não Selecionado!");
        form.proprietario.focus();
        return false;
    }

    if (form.nota.value == "") {
        alert("Escolha uma das opçoes de Satisfação!");
        return false;
    }

    return true;

}


//Validador de Exclusão
function validaExclusao(codigo, tipo) {
    var obj = "";
    if (tipo == "VC") {
        obj = "este veiculo";
    } else if (tipo == "CS") {
        obj = "esta casa";
    } else if (tipo == "VG") {
        obj = "esta vaga";
    } else if (tipo == "SV") {
        obj = "este servico";
    }

    if (confirm("Deseja excluir " + obj + "?")) {
        location.href = "excluir.php?t=" + tipo + "&cod=" + codigo;
    }
}

//Validador para Restauração
function validaRestaurar(codigo, tipo) {
    var obj = "";
    if (tipo == "VC") {
        obj = "este veiculo";
    } else if (tipo == "CS") {
        obj = "esta casa";
    } else if (tipo == "VG") {
        obj = "esta vaga";
    } else if (tipo == "SV") {
        obj = "este servico";
    }


    if (confirm("Deseja restaurar " + obj + "?")) {
        location.href = "restaurar.php?t=" + tipo + "&cod=" + codigo;
    }
}


//Validador para Restauração
function validaCancelar(codigo) {
    if (confirm("Deseja cancelar este serviço?")) {
        location.href = "cancelar_servico.php?cod=" + codigo;
    }
}

//Validador para veiculo obrigatório em um serviço
function validaServicoVeic(form) {
    if (form.veic.value == "") {
        alert("Veiculo não selecionado!");
        form.veic.focus();
        return false;
    }
}

//Validador de formulários de Serviço
function validaServico(form, op) {

    if (form.datai.value == "") {
        alert("Data inicial não inserida!");
        form.datai.focus();
        return false;
    } else if (!validaDataCerta(form.datai)) {
        alert("Data Inválida!");
        form.datai.focus();
        return false;
    }
    if (form.dataf.value == "") {
        alert("Data inicial não inserida!");
        form.dataf.focus();
        return false;
    } else if (!validaDataCerta(form.dataf)) {
        alert("Data Inválida!");
        form.dataf.focus();
        return false;
    }
    if (form.horai.value == "") {
        alert("Data inicial não inserida!");
        form.horai.focus();
        return false;
    } else if (!validaHoraCerta(form.horai)) {
        alert("Data Inválida!");
        form.horai.focus();
        return false;
    }
    if (form.horaf.value == "") {
        alert("Data inicial não inserida!");
        form.horaf.focus();
        return false;
    } else if (!validaHoraCerta(form.horaf)) {
        alert("Data Inválida!");
        form.horaf.focus();
        return false;
    }
}


