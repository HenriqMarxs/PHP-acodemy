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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Home Estudante</title>
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
            <li class="item-menu" id="activate">
                <a href="../home/index.php">
                    <span class="icon" id="activate"><i class="bi bi-house"></i></span>
                    <span class="txt-link" id="activate">Home</span>
                </a>
            </li>
            <li class="item-menu">
                <a href="../simulado/index.php">
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
            <li class="item-menu">
                <a href="../resumo/index.php">
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
            <h1>Centro acadêmico</h1>
            <p class="area-description-2">Aqui você encontra todas as nossas funcionalidades centrais do Acodemy</p>
        </div>
        <div class="container-areas">
            <div class="container-child child-1">
                <div class="ranking">
                    <h1 class="area-title">Ranking</h1>
                    <p class="area-description">Esses foram os três estudantes que obtiveram o mellhor desempenho
                        durante os estudos</p>
                    <div class="result-student">
                        <div class="infos-name-result">
                            <h1>1°</h1>
                            <p>João</p>
                        </div>
                        <div class="bar">
                            <div class="progress-bar item-1"></div>
                            <p class="acertos-quantidade">50 acertos</p>
                        </div>
                    </div>
                    <div class="result-student">
                        <div class="infos-name-result">
                            <h1>2°</h1>
                            <p>Shawn</p>
                        </div>
                        <div class="bar">
                            <div class="progress-bar item-2"></div>
                            <p class="acertos-quantidade">50 acertos</p>
                        </div>
                    </div>
                    <div class="result-student">
                        <div class="infos-name-result">
                            <h1>3°</h1>
                            <p>Justin</p>
                        </div>
                        <div class="bar">
                            <div class="progress-bar item-3"></div>
                            <p class="acertos-quantidade">50 acertos</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-child child-2">
                <div class="provas">
                    <h1 class="area-title">Trilha de Estudos</h1>
                    <p class="area-description">Sabemos que se preparar para o ENADE é uma etapa importante em sua
                        jornada
                        acadêmica. Para ajudá-lo a direcionar seus estudos de maneira eficiente, confira esta trilha
                        sugerida
                        com base nos conteúdos que geralmente caem na prova.</p>
                    <div class="btn-container">
                        <a href="../trilha/index.php" class="btn-cad">Conferir</a>
                        <!-- ajustar esse link e deixar essa parte melhor -->
                    </div>
                </div>
                <div class="provas">
                    <h1 class="area-title">Simulados</h1>
                    <p class="area-description">Responda e acompanhe seu desempenho nas perguntas do ENADE,
                        de modo a facilitar e aprimorar seus estudos.</p>
                    <div class="btn-container">
                        <a href="../simulado/index.php" class="btn-cad">Fazer Simulado</a>
                        <a href="../resumo/index.php" class="btn-view">Desempenho</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>