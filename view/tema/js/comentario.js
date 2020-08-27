function comentar(id_n, id_u) {
    const divFormComentario = document.querySelector('#adicionarComentario')
    divFormComentario.style.width = '70%';
    divFormComentario.style.left = '0%';
    divFormComentario.style.marginLeft = '15%';

    divFormComentario.innerHTML = '<textarea class="inputDescComent" id="defDescComent"></textarea><button id="salvarComent" href="" class="btn btn-info btn-block">Publicar</button>'

    const inputText = document.querySelector('#defDescComent');

    inputText.style.width = '100%'
    document.querySelector('#salvarComent').onclick = function (){
        window.location.href = urlPagina+'comentario/salvar/'+id_n+'¿'+id_u+'¿'+document.querySelector('#defDescComent').value;
    };
}


function mostrarComentarios() {
    document.querySelector('#divComentarios').style.display = 'block';
    document.querySelector('#botaoComentario').style.display = 'none';
}

// ¿¿¿¿