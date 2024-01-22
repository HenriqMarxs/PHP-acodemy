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

  try{
    $Select = "SELECT r.acerto, u.nome 
        FROM usuarios u
        INNER JOIN responde r ON r.fk_prontuario_aluno = u.id_usuario
        WHERE r.fk_prontuario_aluno = u.id_usuario
        ORDER BY r.acerto DESC LIMIT 3;";

    $Query = $mysqli->query($Select);

    if(!$Query){
        throw new Exception("Whoops, algo deu errado!");
    }

    $ResultadoRanking = $Query->fetch_all(MYSQLI_ASSOC);
}catch (Exception $E){
    echo $E->getMessage();
}
?> 
/*



*/

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Home</title>
</head>

<body>
    <nav class="menu-lateral">
        <ul>
            <li class="item-menu" id="user">
                <a href="#" style="cursor: default;">
                    <span class="icon" id="user"><i class="bi bi-person-fill"></i></span>
                    <span class="txt-link" id="user"><?php echo $_SESSION['nome'];?></span>
                </a>
            </li>
            <li class="item-menu" id="activate">
                <a href="../home/index.php">
                    <span class="icon" id="activate"><i class="bi bi-house"></i></span>
                    <span class="txt-link" id="activate">Home</span>
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
            <h1>Centro administrativo</h1>
            <p class="area-description-2">Aqui você encontra todas as nossas funcionalidades centrais do Acodemy</p>
        </div>
        <div class="container-areas">
            <div class="container-child child-1">
                <div class="ranking">
                    <h1 class="area-title">Ranking</h1>
                    <p class="area-description">Esses foram os três estudantes que obtiveram o mellhor desempenho durante os estudos</p>

                    <?php
                    if(isset($ResultadoRanking)){
                        foreach($ResultadoRanking as $Key => $Ranking){
                    ?>
                            <div class="result-student">
                                <div class="infos-name-result">
                                    <h1><?php echo $Key+1; ?>°</h1>
                                    <p><?php echo $Ranking['nome']; ?></p>
                                </div>
                                <div class="bar">
                                    <div class="progress-bar item-1"></div>
                                    <p class="acertos-quantidade"><?php echo $Ranking['acerto']; ?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }else{
                        echo 'Whoops, não encontamos usuários para rankear!';
                    }
                    ?>
                </div>
            </div>
            <div class="container-child child-2">
                <div class="provas">
                    <h1 class="area-title">Provas anteriores</h1>
                    <p class="area-description">Explore com detalhes as provas anteriores do ENADE, proporcionando a você 
                        a oportunidade de escolher criteriosamente as perguntas que melhor se 
                        alinham aos objetivos de estudo de seus alunos. Use os links abaixo para ver os arquivos em PDF.</p>
                        <div class="provas-container">
                            <div class="item-prova">
                                <p class="ano-prova">2021</p>
                                <div class="circle"><i class="bi bi-file-earmark"></i></div>
                                <a href="provas/2021/prova.pdf" download="prova_2021.pdf"><b>prova</b></a>
                                <a href="provas/2021/gabarito.pdf" download="gabarito_2021.pdf">gabarito</a>
                            </div>
                            <div class="item-prova">
                                <p class="ano-prova">2017</p>
                                <div class="circle"><i class="bi bi-file-earmark"></i></div>
                                <a href="provas/2017/prova.pdf" download="prova_2017.pdf"><b>prova</b></a>
                                <a href="provas/2017/gabarito.pdf" download="gabarito_2017.pdf">gabarito</a>
                            </div>
                            <div class="item-prova">
                                <p class="ano-prova">2014</p>
                                <div class="circle"><i class="bi bi-file-earmark"></i></div>
                                <a href="provas/2014/prova.pdf" download="prova_2014.pdf"><b>prova</b></a>
                                <a href="provas/2014/gabarito.pdf" download="gabarito_2014.pdf">gabarito</a>
                            </div>
                            <div class="item-prova">
                                <p class="ano-prova">2011</p>
                                <div class="circle"><i class="bi bi-file-earmark"></i></div>
                                <a href="provas/2011/prova.pdf" download="prova_2011.pdf"><b>prova</b></a>
                                <a href="provas/2011/gabarito.pdf" download="gabarito_2011.pdf">gabarito</a>
                            </div>
                            <div class="item-prova">
                                <p class="ano-prova">2008</p>
                                <div class="circle"><i class="bi bi-file-earmark"></i></div>
                                <a href="provas/2008/prova.pdf" download="prova_2008.pdf"><b>prova</b></a>
                                <a href="provas/2008/gabarito.pdf" download="gabarito_2008.pdf">gabarito</a>
                            </div>
                        </div>
                </div>
                <div class="bancos">
                    <div class="banco-item">
                        <h1 class="area-title">Banco de perguntas</h1>
                        <p class="area-description">Cadastre e gerencie perguntas do ENADE no sistema de uma maneira
                            simplificada, proporcionando aos estudantes uma valiosa ferramenta
                            para aprimorar seus estudos.</p>
                        <div class="btn-container">
                            <a href="../cad_perguntas/cadastrar_perguntas.html" class="btn-cad">Cadastrar</a>
                            <a href="../resumo_perguntas/index.php" class="btn-view">Visualizar</a>
                        </div>
                    </div>
                    <div class="banco-item">
                        <h1 class="area-title">Banco de estudantes</h1>
                        <p class="area-description">Cadastre e gerencie estudantes no sistema de uma maneira simples
                            e eficiente, proporcionando facilidade e agilidade nas tarefas
                            relacionadas à administração acadêmica.</p>
                        <div class="btn-container">
                            <a href="../cad_estudantes/index.html" class="btn-cad">Cadastrar</a>
                            <a href="#" class="btn-view">Visualizar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>