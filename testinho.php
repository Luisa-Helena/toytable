<!DOCTYPE html>
<html>
<head>
    <title>Pesquisa no Banco de Dados</title>
</head>
<body>
    <h1>Pesquisa no Banco de Dados</h1>
    <input type="text" id="search-text" placeholder="Digite para pesquisar" oninput="performSearch()">
    <div id="search-results"></div>

    <script>
        function performSearch() {
            var searchText = document.getElementById('search-text').value;

            // Realize uma pesquisa fictícia no banco de dados (simulada aqui)
            // Substitua esta parte com sua lógica real de pesquisa no banco de dados
            var results = simulateDatabaseSearch(searchText);

            displaySearchResults(results);
        }

        function simulateDatabaseSearch(searchText) {
            // Simulando uma pesquisa fictícia no banco de dados
            var data = [
                "Resultado 1",
                "Resultado 2",
                "Resultado 3",
                "Resultado 4",
                "Resultado 5"
            ];

            return data.filter(item => item.toLowerCase().includes(searchText.toLowerCase()));
        }

        function displaySearchResults(results) {
            var searchResults = document.getElementById('search-results');
            searchResults.innerHTML = '';

            if (results.length === 0) {
                searchResults.innerHTML = 'Nenhum resultado encontrado.';
            } else {
                var ul = document.createElement('ul');

                results.forEach(function (result) {
                    var li = document.createElement('li');
                    li.textContent = result;
                    ul.appendChild(li);
                });

                searchResults.appendChild(ul);
            }
        }
    </script>
</body>
</html>
