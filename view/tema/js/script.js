const urlPagina = 'http://192.168.0.133/info-noticia/';
const xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
        const url = JSON.parse(this.responseText);
    }
}
xhttp.open("GET", "php/urlAjax.php", true);
xhttp.send();