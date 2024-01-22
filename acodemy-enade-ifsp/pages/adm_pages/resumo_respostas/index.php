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
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <title>Home</title>
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
            <li class="item-menu">
                <a href="../cad_estudantes/index.php">
                    <span class="icon"><i class="bi bi-person-add"></i></span>
                    <span class="txt-link">Estudantes</span>
                </a>
            </li>
            <li class="item-menu" id="activate">
                <a href="../resumo_respostas/index.php">
                    <span class="icon" id="activate"><i class="bi bi-graph-up-arrow"></i></span>
                    <span class="txt-link" id="activate">Desempenho</span>
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
            <h1>Desempenho dos Estudantes</h1>
            <p class="area-description">
                Esse é o desempenho dos estudantes nos questionários
            </p>
        </div>
        <div class="container-main">

            <!-- essa tabela deve conter um resumo de todas as perguntas que o admin cadastrou -->
            <div class="table-container">
                <table>
                    <tr class="header-table">
                        <th>Nome do Estudante</th>
                        <th>N° Médio de Acertos</th>
                        <th>N° de Tentativas</th>
                    </tr>
                    <tr>
                        <td>João Felipe</td>
                        <td>50/60</td>
                        <td>10</td>
                    </tr>
                    <tr>
                        <td>Maria Silva</td>
                        <td>45/60</td>
                        <td>8</td>
                    </tr>
                    <tr>
                        <td>Carlos Oliveira</td>
                        <td>55/60</td>
                        <td>12</td>
                    </tr>
                    <tr>
                        <td>Ana Souza</td>
                        <td>48/60</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>Rafael Santos</td>
                        <td>58/60</td>
                        <td>11</td>
                    </tr>
                    <tr>
                        <td>Juliana Lima</td>
                        <td>40/60</td>
                        <td>7</td>
                    </tr>
                </table>
            </div>
            <div class="btn-container">
                <a href="../cad_perguntas/cadastrar_perguntas.html" class="btn-cad">Cadastrar Novo Estudante</a>
                <a href="../resumo_perguntas/index.php" class="btn-view">Ver Perguntas</a>
            </div>
        </div>
    </main>
</body>

</html>