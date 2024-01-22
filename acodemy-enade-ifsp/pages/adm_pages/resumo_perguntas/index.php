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
            <li class="item-menu" id="activate">
                <a href="../resumo_perguntas/index.php">
                    <span class="icon" id="activate"><i class="bi bi-clipboard2-data"></i></span>
                    <span class="txt-link" id="activate">Resumo</span>
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
            <h1>Resumo Geral de Perguntas</h1>
            <p class="area-description">
                Esta lista apresenta todas as perguntas que você cadastrou.
            </p>
        </div>
        <div class="container-main">

            <!-- essa tabela deve conter um resumo de todas as perguntas que o admin cadastrou -->
            <div class="table-container">
                <table>
                    <tr class="header-table">
                        <th>Disciplina</th>
                        <th>Enunciado</th>
                        <th>Resposta</th>
                    </tr>
                    <?php
                    $sqlCode ="SELECT pergunta.enunciado_pergunta, pergunta.resposta_pergunta, disciplina.nome FROM pergunta, disciplina where fk_id_disciplina = disciplina.id_disciplina and fk_usuario = '$id';";
                    $sql_query = $mysqli->query($sqlCode);
                    
                    if($sql_query->num_rows>0){
                        while($row = $sql_query->fetch_assoc()){
                            $disciplinaCadastrada = $row['nome'];
                            $enunciadoCadastrado = $row['enunciado_pergunta'];
                            $respostaCadastrada = $row['resposta_pergunta'];

                            if(strlen($enunciadoCadastrado)>25){
                                $enunciadoAbreviado = substr($enunciadoCadastrado,0,25)."...";
                            }
                            else{
                                $enunciadoAbreviado = $enunciadoCadastrado;
                            }
                            echo"<tr>
                            <td>$disciplinaCadastrada</td>
                            <td>$enunciadoAbreviado</td>
                            <td>$respostaCadastrada</td>
                        </tr>";

                        }
                    }
                    
                    ?>
                </table>
            </div>
            <div class="btn-container">
                <a href="../cad_perguntas/cadastrar_perguntas.html" class="btn-cad">Cadastrar Nova Pergunta</a>
                <a href="../resumo_respostas/index.php" class="btn-view">Ver Desempenho dos Estudantes</a>
            </div>
        </div>
    </main>
</body>

</html>