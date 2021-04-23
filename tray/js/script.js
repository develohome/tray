
document.getElementById('btConfirma').onclick = function(){
    var disbleCamp = document.querySelectorAll('tbody input');// ao clicar o botão confirmar seleciona os campos do usuário selecionado
    for(let i = 0;i<disbleCamp.length;i++){
        disbleCamp[i].disabled = true; // desabilita os campos tara edição ======================================
        disbleCamp[i].style.background = 'transparent'
    }
    update(linha) // chama a função para fazer alteração =======================================================
}
var alterar = document.querySelectorAll('.alterar'); //
var linha;
/* verifica a quantidade de botões para fazer as alterações e adiciona o evento que ao ser clicado 
    primeiro desabilita todos os campos para edição e no segundo loop habilita somente os campos correspondente ao usuário selecionado
*/
for(let i = 0;i<alterar.length;i++){
    alterar[i].addEventListener('click', ()=>{
        var allCamp = document.querySelectorAll('tbody input');
        for(let i = 0; i<allCamp.length;i++){
            allCamp[i].disabled = true;
            allCamp[i].style.background = 'transparent';
        }
       
        var camp = '.campo'+ i
        var campo = document.querySelectorAll(camp);
        for(let x = 0 ; x < campo.length; x++){
            campo[x].disabled = false;
            campo[x].style.background = '#FFF'
        }
        document.getElementById('btConfirma').value = alterar[i].value // no botão confirmar é adicionado o valor do id do usuário selecionado
        linha = i;
    })
}
var excluir = document.querySelectorAll('.excluir');
// seleciona todos os botões para excluir e adiciona o evento que so ser clicado chama a função excluir com o parâmetro de id do usuário selecionado
for(let i = 0;i<alterar.length;i++){
    excluir[i].addEventListener('click', ()=>{
        excluirUser(excluir[i].value);
    })
}
// AJAX ============================================================================
const xhr = new XMLHttpRequest()
// função para fazer alteração
function update(valor){
    var campoAlterado = document.querySelectorAll('.campo'+valor); 
    var nome = campoAlterado[0].value;
    var email = campoAlterado[1].value;
    var id = document.getElementById('btConfirma').value
    xhr.responseText = 'json';
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
           var msg = document.querySelector('.msg');//quando a alteração for concluida será mostrada a msg na tela
           msg.style.display = 'flex' 
            setTimeout(()=>{
                msg.style.display = 'none';
            }, 1500)
        }
    }
    xhr.open('GET', '../php/recuperarinfo.php?i='+id+'&n=' + nome +'&e=' + email);
    xhr.send();
}
// função para fazer a exclusão do usuário selecionado ===========================================================
function excluirUser(valor){
    xhr.onreadystatechange = function(){
        if(xhr.readyState == 4 && xhr.status == 200){
            var msg = document.querySelector('.msg');
            msg.style.display = 'flex' 
                setTimeout(()=>{
                    msg.style.display = 'none';
                }, 1500)
        }
    }
    xhr.open('GET', '../php/excluir.php?id=' + valor);
    xhr.send()
}

document.querySelector('#registrarcompra').onclick = function(){
    valor =parseFloat(document.querySelector("#valor").value) * 0.085;
    
}





