<?php
include('../../../settings/conexao.php');
include('../../../settings/protect.php');
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
    <title>Desempenho Pessoal</title>
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
                <a href="../resumo_perguntas/index.php">
                    <span class="icon"><i class="bi bi-journal-bookmark"></i></span>
                    <span class="txt-link">Simulados</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../trilha/index.php">
                    <span class="icon"><i class="bi bi-bar-chart-steps"></i></span>
                    <span class="txt-link">Trilha</span>
                </a>
            </li>
            <li class="item-menu" id="activate">
                <a href="../resumo/index.php">
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
            <h1>Desempenho Pessoal</h1>
            <p class="area-description">
                Esse é o seu desempenho geral nos simulados do ENADE
            </p>
        </div>
        <div class="container-main">
            <!-- essa tabela deve conter um resumo de todas as tentativas que o estudante realizou -->
            <div class="table-container">
                <table>
                    <tr class="header-table">
                        <th>Data</th>
                        <th>Horário</th>
                        <th>N° de Acertos</th>
                    </tr>
                    <tr>
                        <td>Ter, 1 de Novembro de 2023</td>
                        <td>16:45</td>
                        <td>7/10</td>
                    </tr>
                    <tr>
                        <td>Qui, 3 de Novembro de 2023</td>
                        <td>19:30</td>
                        <td>8/10</td>
                    </tr>
                    <tr>
                        <td>Sáb, 5 de Novembro de 2023</td>
                        <td>14:15</td>
                        <td>6/10</td>
                    </tr>
                    <tr>
                        <td>Seg, 7 de Novembro de 2023</td>
                        <td>20:00</td>
                        <td>9/10</td>
                    </tr>
                    <tr>
                        <td>Qua, 9 de Novembro de 2023</td>
                        <td>18:30</td>
                        <td>5/10</td>
                    </tr>
                    <tr>
                        <td>Sex, 11 de Novembro de 2023</td>
                        <td>17:00</td>
                        <td>8/10</td>
                    </tr>
                    <tr>
                        <td>Dom, 13 de Novembro de 2023</td>
                        <td>21:45</td>
                        <td>7/10</td>
                    </tr>
                    <tr>
                        <td>Ter, 15 de Novembro de 2023</td>
                        <td>23:30</td>
                        <td>6/10</td>
                    </tr>
                    <tr>
                        <td>Qui, 17 de Novembro de 2023</td>
                        <td>15:15</td>
                        <td>9/10</td>
                    </tr>
                    <tr>
                        <td>Sáb, 19 de Novembro de 2023</td>
                        <td>13:30</td>
                        <td>8/10</td>
                    </tr>
                    <tr>
                        <td>Seg, 21 de Novembro de 2023</td>
                        <td>22:15</td>
                        <td>7/10</td>
                    </tr>
                    <tr>
                        <td>Qua, 23 de Novembro de 2023</td>
                        <td>20:45</td>
                        <td>6/10</td>
                    </tr>
                    <tr>
                        <td>Sex, 25 de Novembro de 2023</td>
                        <td>18:00</td>
                        <td>8/10</td>
                    </tr>
                    <tr>
                        <td>Dom, 27 de Novembro de 2023</td>
                        <td>16:30</td>
                        <td>9/10</td>
                    </tr>
                    <tr>
                        <td>Ter, 29 de Novembro de 2023</td>
                        <td>19:15</td>
                        <td>7/10</td>
                    </tr>
                </table>
            </div>
            <div class="btn-container">
                <a href="../simulado/index.html" class="btn-cad">Fazer Simulado</a>
                <a href="../home/index.html" class="btn-view">Home</a>
            </div>
        </div>
    </main>
</body>

</html>