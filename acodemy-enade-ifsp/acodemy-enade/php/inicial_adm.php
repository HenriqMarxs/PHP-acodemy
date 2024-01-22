<?php
    session_start();

    if (!isset($_SESSION['nome'])) {
        header("Location: ../html/login.html");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/style_home.css">
    <title>Home</title>
</head>
<body>
    <h2>Bem-vindo, <?php echo $_SESSION['nome']; ?>!</h2>
    <p>Seu conteúdo protegido está aqui.</p>
    

    <div class="sidebar">
        sidebar
        <a href="logout.php">Sair</a>
    </div>

    <div class="sidebar">
        <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
        <ul>
            <li><a href="#">Link 1</a></li>
            <li><a href="#">Link 2</a></li>
            <li><a href="#">Link 3</a></li>
            <li><a href="#">Link 4</a></li>
        </ul>
    </div>

    <div class="ranking">
        ranking
    </div>

    <div class="questions">
        criar perguntas
    </div>

    <div class="students">
        cadastrar alunos
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');
            
            if (sidebar.style.left === '-250px') {
                sidebar.style.left = '0';
                content.style.marginLeft = '250px';
            } else {
                sidebar.style.left = '-250px';
                content.style.marginLeft = '0';
            }
        }

    </script>
</body>
</html>
