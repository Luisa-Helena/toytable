// modal
document.getElementById('linkDesativarConta').addEventListener('click', function() {
    document.getElementById('modalDesativarConta').style.display = 'block';
});

// Quando o botão "Sim" é clicado, implemente a ação de desativar a conta
document.getElementById('confirmarDesativar').addEventListener('click', function() {
    // Execute a solicitação AJAX para desativar a conta
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'desativar_conta.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var response = xhr.responseText;
            alert(response); // Exibe a resposta do servidor
            document.getElementById('modalDesativarConta').style.display = 'none'; // Fecha o modal
        }
    };
    xhr.send();
});

// Quando o botão "Cancelar" é clicado, feche o modal
document.getElementById('cancelarDesativar').addEventListener('click', function() {
    document.getElementById('modalDesativarConta').style.display = 'none';
});
