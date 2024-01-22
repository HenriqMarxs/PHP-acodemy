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
            <li class="item-menu" id="activate">
                <a href="../cad_perguntas/cadastrar_perguntas.php">
                    <span class="icon" id="activate"><i class="bi bi-file-earmark-plus"></i></span>
                    <span class="txt-link" id="activate">Perguntas</span>
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
            <h1>Cadastro de Perguntas</h1>
            <p class="area-description">
                Cadastre e gerencie perguntas do ENADE no sistema de uma maneira simplificada, proporcionando aos
                estudantes uma valiosa ferramenta para aprimorar seus estudos
            </p>
        </div>
        <div class="container-form">
            <form action="valida_pergunta.php" method="post" class="form">
                <div class="form-child">
                    <label for="enunciado_pergunta" id="label-enunciado">Nova Pergunta</label>
                    <textarea id="enunciado_pergunta" name="enunciado_pergunta"
                        placeholder="Adicione o enunciado da pergunta" oninput="autoResize('enunciado_pergunta')"
                        class="custom-input-2"></textarea>

                    <div class="row-question">
                        <label for="opcao_a">A)</label>
                        <textarea type="text" placeholder="Enunciado da alternativa A" id="opcao_a" name="opcao_a"
                            class="custom-input" oninput="autoResize('opcao_a')" required></textarea>
                    </div>
                    <div class="row-question">
                        <label for="opcao_b">B)</label>
                        <textarea type="text" placeholder="Enunciado da alternativa B" id="opcao_b" name="opcao_b"
                            class="custom-input" oninput="autoResize('opcao_b')" required></textarea>
                    </div>
                    <div class="row-question">
                        <label for="opcao_c">C)</label>
                        <textarea type="text" placeholder="Enunciado da alternativa C" id="opcao_c" name="opcao_c"
                            class="custom-input" oninput="autoResize('opcao_c')" required></textarea>
                    </div>
                    <div class="row-question">
                        <label for="opcao_d">D)</label>
                        <textarea type="text" placeholder="Enunciado da alternativa D" id="opcao_d" name="opcao_d"
                            class="custom-input" oninput="autoResize('opcao_d')" required></textarea>
                    </div>
                    <div class="row-question">
                        <label for="opcao_e">E)</label>
                        <textarea type="text" placeholder="Enunciado da alternativa E" id="opcao_e" name="opcao_e"
                            class="custom-input" oninput="autoResize('opcao_e')" required></textarea>
                    </div>

                    <label for="" class="label-with-margin">Qual é a alternativa correta?</label>
                    <div class="row-answer">
                        <div class="row-answer-child">
                            <input type="radio" id="answer_a" name="answer" value="A" />
                            <label for="answer_a">A</label>
                        </div>
                        <div class="row-answer-child">
                            <input type="radio" id="answer_b" name="answer" value="B" />
                            <label for="answer_b">B</label>
                        </div>
                        <div class="row-answer-child">
                            <input type="radio" id="answer_c" name="answer" value="C" />
                            <label for="answer_c">C</label>
                        </div>
                        <div class="row-answer-child">
                            <input type="radio" id="answer_d" name="answer" value="D" />
                            <label for="answer_d">D</label>
                        </div>
                        <div class="row-answer-child">
                            <input type="radio" id="answer_e" name="answer" value="E" />
                            <label for="answer_e">E</label>
                        </div>
                    </div>

                    <label for="" class="label-with-margin">Qual é a área de conhecimento à qual essa pergunta
                        pertence?</label>
                    <select name="knowledge-area" id="knowledge-area" required>
                        <option value="none">Selecione</option>
                        <option value="1" required>Programação de Computadores</option>
                        <option value="2" required>Banco de Dados</option>
                        <option value="3" required>Sistemas Operacionais</option>
                        <option value="4" required>Redes de Computadores</option>
                        <option value="5" required>Engenharia de Software</option>
                        <option value="6" required>Desenvolvimento Web</option>
                        <option value="7" required>Desenvolvimento Mobile</option>
                        <option value="8" required>Inteligência Artificial e Machine Learning</option>
                        <option value="9" required>Segurança da Informação</option>
                        <option value="10" required>Gestão de Projetos</option>
                    </select>
                </div>
                <div class="btn-container">
                    <a href="../home/index.php" class="btn-cancel">Cancelar</a>
                    <input type="submit" value="Cadastrar Pergunta" class="btn-cad"/>
                </div>
            </form>
        </div>
    </main>

    <script>
        function autoResize(fieldName) {
            const textarea = document.getElementById(fieldName);
            textarea.style.height = "auto"; // Redefine a altura para auto
            textarea.style.height = textarea.scrollHeight + "px"; // Ajusta a altura com base no conteúdo
        }
    </script>
</body>

</html>