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
    <title>Simulado</title>
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
            <li class="item-menu" id="activate">
                <a href="../resumo_perguntas/index.php">
                    <span class="icon" id="activate"><i class="bi bi-journal-bookmark"></i></span>
                    <span class="txt-link" id="activate">Simulados</span>
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
            <h1>Simulado</h1>
        </div>
        <div class="container-form">
            <form action="feedback.php" method="post" class="form">
                <div class="form-child">
                <?php
                // Select questão um aleatória
                $sql_code = "SELECT DISTINCT fk_id_disciplina FROM pergunta ORDER BY rand();";
                $sql_query = $mysqli->query($sql_code);
                $num = 0;
                $finalizou =false;
                if($sql_query->num_rows>0){
                    // Adapte o action conforme necessário

                    while($disciplina_row = $sql_query->fetch_assoc()){
                        $num++;
                        $disciplina = $disciplina_row['fk_id_disciplina'];
                        $sql_code ="SELECT * FROM pergunta WHERE fk_id_disciplina = '$disciplina' ORDER BY rand() limit 10;";
                        $query = $mysqli->query($sql_code);
                        
                        if($query->num_rows>0){
                            $pergunta = $query->fetch_assoc();
                            $respostaCorreta = $pergunta['resposta_pergunta'];
                            $enunciado = $pergunta['enunciado_pergunta'];
                            $opcaoA = $pergunta["alternativa_a"];
                            $opcaoB = $pergunta["alternativa_b"];
                            $opcaoC = $pergunta["alternativa_c"];
                            $opcaoD = $pergunta["alternativa_d"];
                            $opcaoE = $pergunta["alternativa_e"]; 
                            
                            
                            // Exibir a pergunta e opções no HTML 
                            echo  '<label for="enunciado_pergunta" id="label-enunciado">Questão'.$num.'</label><br/>';                            echo '<p>'.$enunciado.'</p>';
                            echo '<div class="row-question">
                                     <input type="radio" value="A" name="alternativa_'.$pergunta['id_pergunta'].'">
                                    <label for="A">A)</label>
                                    <p>'. $opcaoA .'</p>
                                </div>';
                            echo '<div class="row-question">
                                    <input type="radio" value="B" name="alternativa_'.$pergunta['id_pergunta'].'">
                                    <label for="B">B)</label>
                                    <p>'. $opcaoB .'</p>
                                    </div>';
                            echo '<div class="row-question">
                                    <input type="radio" value="C" name="alternativa_'.$pergunta['id_pergunta'].'">
                                    <label for="C">C)</label>
                                    <p>'. $opcaoC .'</p>
                                    </div>';
                            echo '<div class="row-question">
                                    <input type="radio" value="D" name="alternativa_'.$pergunta['id_pergunta'].'">
                                    <label for="D">D)</label>
                                <p>'. $opcaoD .'</p>
                                </div>';
                            echo '<div class="row-question">
                                    <input type="radio" value="E" name="alternativa_'.$pergunta['id_pergunta'].'">
                                    <label for="E">E)</label>
                                <p>'. $opcaoE .'</p>
                            </div> <br/>';
                        }
                    }
                }
              ?>
              <
                <div class="btn-container" name="alternativa">
                    <input type="submit" value="Enviar" class="btn-cad"/>
                </div>
            </form>
        </div>
    <script>
        function autoResize(fieldName) {
            const textarea = document.getElementById(fieldName);
            textarea.style.height = "auto"; // Redefine a altura para auto
            textarea.style.height = textarea.scrollHeight + "px";
             // Ajusta a altura com base no conteúdo
        }


    </script>
</body>

</html>