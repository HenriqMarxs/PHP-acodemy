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
    <title>Configurações</title>
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
            <li class="item-menu" id="activate">
                <a href="../configs/index.php">
                    <span class="icon" id="activate"><i class="bi bi-sliders2"></i></span>
                    <span class="txt-link" id="activate">Configurações</span>
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
            <h1>Configurações</h1>
        </div>
        <div class="container-form">
            <form action="update.php" method="post" class="form">
                <div class="form-child">
                    <label for="nome_usuario" class="label-enunciado">Nome</label>
                    <input type="text" id="nome_usuario" name="nome_usuario" placeholder="Nome Completo" class="custom-input-2">

                    <label for="email" class="label-enunciado">E-mail</label>
                    <input type="email" id="email" name="email" placeholder="E-mail atualizado" class="custom-input-2">

                    <label for="senha_antiga" class="label-enunciado">Senha Atual</label>
                    <input type="password" id="senha_antiga" name="senha" placeholder="Digite sua senha atual" class="custom-input-2">

                    <label for="senha_nova" class="label-enunciado">Nova Senha</label>
                    <input type="password" id="senha_nova" name="senha_nova" placeholder="Digite a nova senha" class="custom-input-2">
                </div>
                <div class="btn-container">
                    <a href="../home/index.php" class="btn-cancel">Cancelar</a>
                    <input type="submit" value="Atualizar Dados" class="btn-cad" />
                </div>
            </form>
        </div>
    </main>
</body>

</html>