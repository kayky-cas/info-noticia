

function edit(id) {

    nome = document.querySelector('#nome'+id).innerHTML;
    document.querySelector('#nome'+id).innerHTML = '<input name="editNome" type="text" value="'+nome+'" id="editNome">'
    email = document.querySelector('#email'+id).innerHTML;
    document.querySelector('#email'+id).innerHTML = '<input name="editEmail" type="text" value="'+email+'" id="editEmail">'
    document.querySelector('#funcao'+id).innerHTML = '<label> <select class="form-control" name="editFuncao" id="editFuncao"> <option value="0">Aluno</option> <option value="1">Professor</option> <option value="2">Administrador</option> </select> </label>'
    const botaoVerm = document.querySelector('#botaoVerm');
    const botaoAzul = document.querySelector('#botaoAzul');
    botaoVerm.innerHTML = 'voltar';
    botaoVerm.href = '';

    botaoAzul.innerHTML = 'salvar';
    botaoAzul.onclick = function () {
        window.location.href = urlPagina+'usuario/editar/'+id+'!'+document.querySelector('#editNome').value+'!'+document.querySelector('#editEmail').value+'!'+document.querySelector('#editFuncao').value;
    };
}
function editNoticia(id) {
    const divTitulo = document.querySelector('#divTitulo'+id);
    const divDescricao = document.querySelector('#divDescricao'+id);
    const divBotoes = document.querySelector('#divNoticiaB'+id);
    const botaoAzul = document.querySelector('#botaoAzulNoticia'+id);

    oldTitulo = document.querySelector('#titulo'+id).innerHTML;
    oldDesc = divDescricao.innerHTML;

    divTitulo.innerHTML = '<input class="inputTitulo bg-info" name="editTitulo" type="text" value="'+oldTitulo+'" id="editTitulo">'
    divDescricao.innerHTML = '<textarea class="inputDesc" rows="10" cols="100" id="editDesc">'+oldDesc+'</textarea>';


    divBotoes.innerHTML = '<button class="btn btn-primary" id="salvarEditNoticia">Salvar</button><a href="" class="btn btn-danger">Cancelar</a>';
    document.querySelector('#salvarEditNoticia').onclick = function (){
        window.location.href = urlPagina+'noticia/alterar/'+id+'¿'+document.querySelector('#editTitulo').value+'¿'+document.querySelector('#editDesc').value;
    };
    // ¿¿¿¿
}