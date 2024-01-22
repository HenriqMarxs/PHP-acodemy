<?php
include('../../../settings/conexao.php');
include('../../../settings/protectAdm.php');

if(isset($_SESSION)){
  $id = $_SESSION['id'];
  $sql_code = "SELECT * FROM usuarios WHERE id_usuario = '$id'";
  $sql_query = $mysqli->query($sql_code);
  $usuario = $sql_query->fetch_assoc();
  $_SESSION['nome'] = $usuario['nome']; 
}
?>

<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Importar Alunos</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
</head>

<body>
<nav class="menu-lateral">
        <ul>
            <li class="item-menu" id="user">
                <a href="#" style="cursor: default;">
                    <span class="icon" id="user"><i class="bi bi-person-fill"></i></span>
                    <span class="txt-link" id="user"><?php echo $_SESSION['nome'];?></span>
                    <!-- aqui vai o nome do usuário que estiver logado no momento -->
                </a>
            </li>
            <li class="item-menu">
                <a href="../home/index.php">
                    <span class="icon"><i class="bi bi-house"></i></span>
                    <span class="txt-link">Home</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../cad_perguntas/cadastrar_perguntas.php">
                    <span class="icon"><i class="bi bi-file-earmark-plus"></i></span>
                    <span class="txt-link">Perguntas</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../resumo_perguntas/index.php">
                    <span class="icon"><i class="bi bi-clipboard2-data"></i></span>
                    <span class="txt-link">Resumo</span>
                </a>
            </li>
            <li class="item-menu" id="activate">
                <a href="../cad_estudantes/index.php">
                    <span class="icon" id="activate"><i class="bi bi-person-add"></i></span>
                    <span class="txt-link" id="activate">Estudantes</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../resumo_respostas/index.php">
                    <span class="icon"><i class="bi bi-graph-up-arrow"></i></span>
                    <span class="txt-link">Desempenho</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../configs/index.php">
                    <span class="icon"><i class="bi bi-sliders2"></i></span>
                    <span class="txt-link">Configurações</span>
                </a>
            </li>
            <li class="item-menu logout">
                <a href="../../auth/logout.php">
                    <span class="icon"><i class="bi bi-box-arrow-right"></i></span>
                    <span class="txt-link">Sair</span>
                </a>
            </li>
        </ul>
    </nav>
    <main>
        <div class="text">
            <h1>Cadastro de Estudantes</h1>
            <p class="area-description">
                Cadastre e gerencie estudantes no sistema de uma maneira simples e eficiente, proporcionando facilidade
                e agilidade nas tarefas relacionadas à administração acadêmica
            </p>
        </div>
        <div class="container-form">
            <form method="post" enctype="multipart/form-data" class="form">
                <div class="form-child">
                    <h2>Importar base de estudantes</h2>
                    <p class="types-accepts">Extensão aceita: .JSON</p>
                    <div class="row-file">
                        <label for="file-input" class="custom-file-upload">
                            Selecionar Arquivo
                            <input type="file" name="file" id="file-input" accept=".json" onchange="updateFileName()" />
                        </label>
                        <span class="file-name" id="file-name">Nenhum arquivo selecionado</span>
                    </div>
                </div>
                <div class="btn-container">
                    <a href="../home/index.php" class="btn-cancel">Cancelar</a>
                    <input type="submit" onclick="uploadFile()" value="Cadastrar Estudantes" class="btn-cad">
                </div>
            </form>
            <div id="result"></div>
        </div>
    </main>
    <script src="script.js"></script>
</body>

</html>