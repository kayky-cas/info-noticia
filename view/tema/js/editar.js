

function edit(id) {

    nome = document.querySelector('#nome'+id).innerHTML;
    document.querySelector('#nome'+id).innerHTML = '<input name="editNome'+id+'" type="text" value="'+nome+'" id="editNome'+id+'">'
    email = document.querySelector('#email'+id).innerHTML;
    document.querySelector('#email'+id).innerHTML = '<input name="editEmail'+id+'" type="text" value="'+email+'" id="editEmail'+id+'">'
    document.querySelector('#funcao'+id).innerHTML = '<label> <select class="form-control" name="editFuncao'+id+'" id="editFuncao'+id+'"> <option value="0">Aluno</option> <option value="1">Professor</option> <option value="2">Administrador</option> </select> </label>'
    const botaoVerm = document.querySelector('#botaoVerm'+id);
    const botaoAzul = document.querySelector('#botaoAzul'+id);
    botaoVerm.innerHTML = '<i class="material-icons">clear</i>';
    botaoVerm.href = '';

    botaoAzul.innerHTML = '<i class="material-icons">done</i>';
    botaoAzul.onclick = function () {
        window.location.href = urlPagina+'usuario/editar/'+id+'!'+document.querySelector('#editNome'+id).value+'!'+document.querySelector('#editEmail'+id).value+'!'+document.querySelector('#editFuncao'+id).value;
    };
}
function editNoticia(id) {
    const divTitulo = document.querySelector('#divTitulo');
    const divDescricao = document.querySelector('#divDescricao');
    const divBotoes = document.querySelector('#divNoticiaB');

    oldTitulo = document.querySelector('#titulo').innerHTML;
    oldDesc = document.querySelector('#descricao').innerHTML;

    divTitulo.innerHTML = '<input class="inputTitulo" style="width: 100%" name="editTitulo" id="editTitulo" type="text" value="'+oldTitulo+'">'
    divDescricao.innerHTML = '<textarea style="width: 100%" class="inputDesc" id="editDesc">'+oldDesc+'</textarea>';

    divBotoes.innerHTML = '<button id="salvarEditNoticia" class="btn btn-primary"><i class="material-icons">done</i></button><a href="" class="btn btn-danger"><i class="material-icons">clear</i></a>'

    // divBotoes.innerHTML = '<button class="btn btn-primary" id="salvarEditNoticia">Salvar</button><a href="" class="btn btn-danger">Cancelar</a>';
    document.querySelector('#salvarEditNoticia').onclick = function (){
        window.location.href = urlPagina+'noticia/alterar/'+id+'¿'+document.querySelector('#editTitulo').value+'¿'+document.querySelector('#editDesc').value;
    };
    // ¿¿¿¿
}