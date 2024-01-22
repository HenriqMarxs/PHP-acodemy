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
    <link rel="icon" href="../../../images/logo-favicon.png" type="image/png">
    <title>Trilha</title>
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
            <li class="item-menu" id="activate">
                <a href="../trilha/index.php">
                    <span class="icon" id="activate"><i class="bi bi-bar-chart-steps"></i></span>
                    <span class="txt-link" id="activate">Trilha</span>
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
            <h1>Trilha de Estudos</h1>
        </div>
        <p class="area-description">Sabemos que se preparar para o ENADE é uma etapa importante em sua jornada
            acadêmica.
            Para ajudá-lo a direcionar seus estudos de maneira eficiente, aqui está uma trilha
            sugerida com base nos conteúdos que geralmente caem na prova.</p>

        <div class="container-trilha">
            <!-- Programação de Computadores -->
            <div class="item-trilha">
                <p class="title-item-trilha">Programação de Computadores</p>
                <hr class="line-blue">
                </hr>
                <p class="content-item-trilha">
                    Comece revisando os fundamentos da lógica de programação, compreendendo estruturas condicionais,
                    loops e manipulação de dados. Em seguida, aprofunde-se em uma linguagem de programação, como Java
                    ou Python, explorando tópicos avançados como orientação a objetos, manipulação de exceções e
                    design patterns. Pratique a resolução de problemas complexos e participe de projetos práticos
                    para consolidar seu conhecimento.
                </p>
            </div>

            <!-- Banco de Dados -->
            <div class="item-trilha">
                <p class="title-item-trilha">Banco de Dados</p>
                <hr class="line-tur">
                </hr>
                <p class="content-item-trilha">
                    Estude a fundo a modelagem de dados, incluindo o design de diagramas ER e a normalização de
                    esquemas. Pratique consultas SQL avançadas, envolvendo junções complexas e otimização de
                    consultas. Compreenda os diferentes tipos de Sistemas de Gerenciamento de Banco de Dados (SGBD)
                    e suas aplicações práticas em cenários do mundo real.
                </p>
            </div>

            <!-- Sistemas Operacionais -->
            <div class="item-trilha">
                <p class="title-item-trilha">Sistemas Operacionais</p>
                <hr class="line-sal">
                </hr>
                <p class="content-item-trilha">
                    Desenvolva uma compreensão sólida dos princípios fundamentais de sistemas operacionais,
                    abrangendo processos, gerenciamento de memória e sistemas de arquivos. Explore tópicos avançados,
                    como virtualização e sistemas distribuídos. Participe de projetos que envolvam a otimização de
                    desempenho e a solução de problemas relacionados aos sistemas operacionais.
                </p>
            </div>

            <!-- Redes de Computadores -->
            <div class="item-trilha">
                <p class="title-item-trilha">Redes de Computadores</p>
                <hr class="line-blue">
                </hr>
                <p class="content-item-trilha">
                    Estude em detalhes os conceitos de protocolos de rede, abrangendo TCP/IP, UDP e DNS. Explore
                    topologias de redes e entenda os protocolos de roteamento. Aprofunde-se em segurança de redes,
                    incluindo firewalls e detecção de intrusões. Realize simulações de redes para aplicar seus
                    conhecimentos na prática.
                </p>
            </div>

            <!-- Engenharia de Software -->
            <div class="item-trilha">
                <p class="title-item-trilha">Engenharia de Software</p>
                <hr class="line-tur">
                </hr>
                <p class="content-item-trilha">
                    Conheça as metodologias de desenvolvimento, desde as tradicionais, como o modelo em cascata, até
                    as ágeis, como Scrum e Kanban. Explore práticas avançadas de teste de software, incluindo
                    testes automatizados e TDD. Aprofunde-se na modelagem de sistemas, utilizando UML e outras
                    ferramentas. Participe de projetos que envolvam o ciclo completo de desenvolvimento de software.
                </p>
            </div>

            <!-- Desenvolvimento Web -->
            <div class="item-trilha">
                <p class="title-item-trilha">Desenvolvimento Web</p>
                <hr class="line-sal">
                </hr>
                <p class="content-item-trilha">
                    Explore HTML, CSS e JavaScript em profundidade, dominando conceitos como responsive design,
                    animações e manipulação de DOM. Adquira experiência com frameworks populares, como React, Angular
                    ou Vue.js. Participe de projetos de desenvolvimento web completos, integrando front-end e
                    back-end, e explore conceitos avançados, como Progressive Web Apps (PWAs) e GraphQL.
                </p>
            </div>

            <!-- Desenvolvimento Mobile -->
            <div class="item-trilha">
                <p class="title-item-trilha">Desenvolvimento Mobile</p>
                <hr class="line-blue">
                </hr>
                <p class="content-item-trilha">
                    Compreenda os conceitos fundamentais do desenvolvimento móvel para Android e iOS. Estude
                    arquiteturas de aplicativos móveis, otimização de desempenho e resolução de problemas específicos
                    de dispositivos móveis. Explore frameworks multiplataforma, como Flutter ou React Native, e
                    participe de projetos práticos que envolvam o ciclo completo de desenvolvimento de aplicativos
                    móveis.
                </p>
            </div>

            <!-- Inteligência Artificial e Machine Learning -->
            <div class="item-trilha">
                <p class="title-item-trilha">Inteligência Artificial e Machine Learning</p>
                <hr class="line-tur">
                </hr>
                <p class="content-item-trilha">
                    Entenda a fundo os fundamentos da Inteligência Artificial (IA) e Machine Learning (ML),
                    explorando algoritmos de aprendizado supervisionado e não supervisionado. Aprofunde-se em
                    técnicas de pré-processamento de dados, seleção de modelos e ajuste de hiperparâmetros.
                    Participe de projetos práticos que envolvam a implementação de soluções de IA/ML em problemas
                    do mundo real.
                </p>
            </div>

            <!-- Segurança da Informação -->
            <div class="item-trilha">
                <p class="title-item-trilha">Segurança da Informação</p>
                <hr class="line-sal">
                </hr>
                <p class="content-item-trilha">
                    Estude princípios avançados de criptografia, abrangendo algoritmos simétricos e assimétricos.
                    Compreenda políticas de segurança, incluindo controle de acesso e gestão de identidade.
                    Explore técnicas de detecção e prevenção de ameaças cibernéticas, participando de simulações de
                    ataques e implementando estratégias de mitigação em ambientes controlados.
                </p>
            </div>

            <!-- Gestão de Projetos -->
            <div class="item-trilha">
                <p class="title-item-trilha">Gestão de Projetos</p>
                <hr class="line-blue">
                </hr>
                <p class="content-item-trilha">
                    Conheça em detalhes as práticas de gerenciamento de projetos, desde o planejamento estratégico
                    até a execução e monitoramento. Aprofunde-se em metodologias tradicionais, como o PMBOK, e
                    ágeis, como Scrum. Familiarize-se com ferramentas de gestão de projetos, como o Gantt Chart, e
                    participe de projetos práticos que envolvam a gestão eficiente de recursos, prazos e
                    qualidade.
                </p>
            </div>
        </div>

        <p>Lembre-se de praticar com exercícios anteriores do ENADE, revisar suas anotações e buscar recursos adicionais
            sempre que necessário. Boa sorte em seus estudos e no ENADE! Estamos torcendo por seu sucesso.</p>
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