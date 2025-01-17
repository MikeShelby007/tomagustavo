<!DOCTYPE html>
<html lang="pt-br">

  <head>

    <!--Coisas que não sabemos para que serve-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--CSS's-->
    <CSS>

      <!--Link para o CSS bootstrap baixado-->
      <link rel="stylesheet" href="css/bootstrap.min.css">

      <!--Link para o nosso CSS-->
      <link rel="stylesheet" href="css/style.css">

    </CSS>

    <!--Personalizar site-->
    <PersoSite>

      <!--Nome do Site-->
      <title>Livraria mil Histórias</title>

      <!--Foto do Site-->
      <link rel="shortcut icon" href="img/siteicon.png" type="image/x-icon">

    </PersoSite>

  </head>

  <body class="bg-custom">

    <!--Cabeçalho do Site-->
    <header>

      <!--Imagem principal do Site-->
      <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
            <img src="img/footerbackground1.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="img/footerbackground2.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/footerbackground3.png" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
          data-bs-slide="prev">
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
          data-bs-slide="next">
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    </header>

    <!--Barra de navegação-->
    <nav class="sticky-top navbar navbar-expand-lg navbar-bg">

      <div class="container-fluid">

        <!--Nome e imagem-->
        <span class="navbar-brand mb-0 h1">
          <img src="img/siteicon.png" width="30" height="24" class="d-inline-block align-text-top">
          Navbar
        </span>

        <!--Botão para abrir e fechar menu-->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!--itens-->
        <div class="collapse navbar-collapse" id="navbarNavDropdown">

          <ul class="navbar-nav">

            <!--Home-->
            <li class="nav-item">
              <!--Como estamos nessa pagina, na classe está "active", assim o item fica aceso na barra-->
              <a class="nav-link" aria-current="page" href="Index.html" target="_self">Home</a>
            </li>

            <!--Opção1-->
            <li class="nav-item">
              <a class="nav-link" href="RastrearPedidos.html" target="_self">Rastrear pedidos</a>
            </li>

            <!--Opção2-->
            <li class="nav-item">
              <a class="nav-link" href="GerenciarCompras.html" target="_self">Gerenciar compras</a>
            </li>

          </ul>

          <!--Espaço entre pesquisar e itens-->
          <span class="w-25 transparente"></span>

          <!--Buscar-->
          <form class="d-flex" role="search" action="Pesquisar.php" target="_self">
            <input class="form-control me-2 pesquisar-custom" type="search" placeholder="Procurar" aria-label="Search" name="pesquisa">
            <button class="btn btn-light" type="submit">Buscar</button>
          </form>

        </div>

        <!--Login-->
        <a class="navbar-brand me-2 h1 mb-0" href="logar.html" target="_self">
          <img src="img/logar.svg" width="30" height="24" class="d-inline-block align-text-top">
        </a>

      </div>

    </nav>

    <!--Corpo/coisas principais-->
    
    <main>

      <br>

      <h1 class="p-5">Resultados para (coisa pesquisada/parte de BD)</h1>
      
      <br>

      <a href="Pesquisar.php" class="nav-link">
        
        <div class="container">

    <?php

        // Obtém o valor do POST
        $livro = $_POST['pesquisa'];

        // Configurações do banco de dados
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "site";

        // Cria a conexão com o banco de dados
        $conexão = new mysqli($servidor, $usuario, $senha, $banco);

        // Verifica se a conexão foi bem-sucedida
        if ($conexão->connect_error) {
            die("Conexão ao servidor não realizada: " . $conexão->connect_error);
        }

        // Consulta SQL para buscar dados na tabela LIVROS
        $consultasql = "SELECT * FROM LIVROS WHERE ID_LIVRO='$livro'";
        $query = $conexão->query($consultasql);

        // Verifica se a consulta retornou algum resultado
        if ($query->num_rows > 0) {
            // Exibe os resultados
            while ($linha = $query->fetch_assoc()) {
                $titulo_livro = $linha['TITULO_LIVRO'];
                $autor_livro = $linha['AUTOR_LIVRO'];
                $preco_livro = $linha['PRECO_LIVRO'];

                
        
            }
        } else {
            echo "Nenhum registro encontrado com esse código.";
        }





        
        // Fecha a conexão com o banco de dados
        $conexão->close();
    ?>

<div class="card mb-0 transparente" style="max-width: 60%;">
          <div class="row g-7">
            <div class="col-md-4">
              <img src="img/siteicon.png" class="img-fluid rounded-start" style="width: 100%;">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"> Titulo - echo "$titulo_livro" </h5>
                <p class="card-text"> Autor - echo "$autor_livro" </p>
                <p class="card-text"><small class="text-body-secondary"> R$ echo "$preco_livro" </small></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      </a>

      <br><br>

      <a href="adiocanar.html" class="nav-link">
        
        <div class="container">

        <div class="card mb-0 transparente" style="max-width: 60%;">
          <div class="row g-7">
            <div class="col-md-4">
              <img src="img/siteicon.png" class="img-fluid rounded-start" style="width: 100%;">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>

      </div>

      </a>

      <br><br>

      <a href="adiocanar.html" class="nav-link">
        
        <div class="container">

        <div class="card mb-0 transparente" style="max-width: 60%;">
          <div class="row g-7">
            <div class="col-md-4">
              <img src="img/siteicon.png" class="img-fluid rounded-start" style="width: 100%;">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>

      </div>

      </a>

      <br><br>

      <a href="adiocanar.html" class="nav-link">
        
        <div class="container">

        <div class="card mb-0 transparente" style="max-width: 60%;">
          <div class="row g-7">
            <div class="col-md-4">
              <img src="img/siteicon.png" class="img-fluid rounded-start" style="width: 100%;">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
              </div>
            </div>
          </div>
        </div>

      </div>

      </a>

      <br><br><br><br>

    </main>

    <!--Rodapé/informações sobre a Loja-->
    <footer class="footer-bg">

      <!--Colunas de texto-->
      <div class="container text-center">

        <div class="row align-items-start">

          <div class="col">
      
            <br><h5>Redes sociais</h5>
            <label>Instagram - @Livraria</label><br>
            <label>Twitter(X) - Livraria</label><br>
            <label>Youtube - Livraria_Oficial</label><br>
            <label>TikTok - Livraria_Oficial</label><br>
            <label>Discord - Livraria</label><br>
            <label>Reddit - Livraria</label><br>
            <label>Pinterest - Livraria</label><br>
            <label>Facebook - Livraria</label><br><br>

          </div>

          <div class="col">
          
            <br><h5>Formas de Pagamento</h5>
            <img src="img/visa.svg" alt="Visa" class="pagamentos"><br>
            <img src="img/aura.svg" alt="Aura" class="pagamentos"><br>
            <img src="img/mastercard.svg" alt="Mastercard" class="pagamentos"><br>
            <img src="img/elo.svg" alt="Elo" class="pagamentos"><br>

          </div>

          <div class="col">
          
            <br><h5>Contato</h5>
            <label>Gmail - LivrariaOficial@Gmail.com</label>
            <label>Telefone - (12)3456-7890</label><br>
            <br><h5>Localização</h5>
            <label>Pais - Brasil / Estado - São Paulo</label>
            <label>Municipio - Taubaté</label><br>
            <label>Rua dos Livros, 123</label><br>

          </div>

        </div>

      </div>

    </footer>

    <!--Java Script-->
    <JS>

      <!--Link para o JS baixado-->
      <script src="js/bootstrap.bundle.js"></script>

    </JS>

  </body>

</html>