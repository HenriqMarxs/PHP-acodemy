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
  // while(isset($_POST['alternativa_'.$pergunta['id_pergunta']''].$num)){
    // $respostaUsuario = $_POST ['alternativa_'.$pergunta['id_pergunta']];
    // $sql_code = "SELECT resposta_pergunta from pergunta where id_pergunta = '$pergunta[id_pergunta]'";
    // $sql_query = $mysqli ->query($sql_code);
    // $gabarito = $sql_query ->fetch_assoc();
//  if($respostaUsuario == $gabarito ){
      // $acertos++;
    // }
  // }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css"
    />
    <title>Simulado</title>
  </head>

  <body>
    <nav class="menu-lateral">
      <ul>
        <li class="item-menu" id="user">
          <a href="#" style="cursor: default">
            <span class="icon" id="user"
              ><i class="bi bi-person-fill"></i
            ></span>
            <span class="txt-link" id="user">Manuela</span>
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
            <span class="icon" id="activate"
              ><i class="bi bi-journal-bookmark"></i
            ></span>
            <span class="txt-link" id="activate">Simulados</span>
          </a>
        </li>
        <li class="item-menu">
          <a href="#">
            <span class="icon"><i class="bi bi-bar-chart-steps"></i></span>
            <span class="txt-link">Trilha</span>
          </a>
        </li>
        <li class="item-menu">
          <a href="#">
            <span class="icon"><i class="bi bi-graph-up-arrow"></i></span>
            <span class="txt-link">Desempenho</span>
          </a>
        </li>
        <li class="item-menu">
          <a href="#">
            <span class="icon"><i class="bi bi-sliders2"></i></span>
            <span class="txt-link">Configurações</span>
          </a>
        </li>
        <li class="item-menu logout">
          <a href="#">
            <span class="icon"><i class="bi bi-box-arrow-right"></i></span>
            <span class="txt-link">Sair</span>
          </a>
        </li>
      </ul>
    </nav>
    <main>
      <div class="text">
        <h1>Feedback do Simulado</h1>
      </div>
      <div class="container-form">
        <form action="" method="post" class="form">
          <div class="form-child">
            <label for="enunciado_pergunta" id="label-enunciado"
              >Questão 1</label
            >
            <p class="feedback-certo">Resposta Correta</p>
            <p>
              A chance de uma criança de baixa renda ter um futuro melhor que a
              realidade em que nasceu está, em maior ou menor grau, relacionada
              à escolaridade e ao nível de renda de seus pais. Nos países ricos,
              o "elevador social" anda mais rápido. Nos emergentes, mais
              devagar. No Brasil, ainda mais lentamente. O país ocupa a segunda
              pior posição em um estudo sobre mobilidade social feito pela
              Organização para a Cooperação e Desenvolvimento Econômico (OCDE),
              em 2018, com dados de 30 países. Segundo os resultados, seriam
              necessárias nove gerações para que os descendentes de um
              brasileiro entre os 10% mais pobres ati ngissem o nível médio de
              rendimento do país. A esti mati va é a mesma para a África do Sul
              e só perde para a Colômbia, onde o período de ascensão levaria 11
              gerações. Mais de 1/3 daqueles que nascem entre os 20% mais pobres
              no Brasil permanece na base da pirâmide, enquanto apenas 7%
              consegue chegar aos 20% mais ricos. Filhos de pais na base da
              pirâmide têm difi culdade de acesso à saúde e maior probabilidade
              de frequentar uma escola com ensino de baixa qualidade. A educação
              precária, em geral, limita as opções para esses jovens no mercado
              de trabalho. Sobram-lhes empregos de baixa remuneração, em que a
              possibilidade de crescimento salarial para quem tem pouca qualifi
              cação é pequena – e a chance de perpetuação do ciclo de pobreza,
              grande. LEMOS, V. Brasil é o segundo pior em mobilidade social em
              ranking de 30 países. BBC News Brasil, 15 jun. 2018 (adaptado). A
              partir das informações apresentadas, é correto afirmar que
            </p>
            <div class="row-question">
              <input type="radio" value="opcao_a" name="alternativa" disabled />
              <label for="opcao_a">A)</label>
              <p>
                o fator ambiental e o fator demográfi co afetam a mobilidade
                social observada, sendo ela menor nos países que apresentam as
                maiores taxas de natalidade.
              </p>
            </div>
            <div class="row-question">
              <input type="radio" value="opcao_b" name="alternativa" disabled />
              <label for="opcao_b">B)</label>
              <p>
                a baixa organização social dos economicamente menos favorecidos
                determina a baixa mobilidade social da base para o topo da
                pirâmide.
              </p>
            </div>
            <div class="row-question">
              <input type="radio" value="opcao_c" name="alternativa" disabled />
              <label for="opcao_c">C)</label>
              <p>
                a mobilidade social é caracterizada por um fator ancestral que
                se revela ao longo das gerações, sendo um limitador da efi cácia
                de políti cas públicas de redução das desigualdades sociais.
              </p>
            </div>
            <div class="row-question">
              <input type="radio" value="opcao_d" name="alternativa" disabled />
              <label for="opcao_d">D)</label>
              <p>
                a análise de mobilidade social permite a observação de um ciclo
                vicioso, que se caracteriza por uma subida nas camadas sociais
                seguida de uma queda, repeti ndo-se esse ciclo de modo
                sucessivo.
              </p>
            </div>
            <div class="row-question">
              <input type="radio" value="opcao_e" name="alternativa" disabled />
              <label for="opcao_e">E)</label>
              <p>
                a ascensão social depende de fatores viabilizadores que estão
                fora do alcance das camadas pobres, o que ocasiona conflitos
                sociais em busca do acesso a tais fatores.
              </p>
            </div>
          </div>
          <div class="form-child">
            <label for="enunciado_pergunta" id="label-enunciado"
              >Questão 2</label
            >
            <p class="feedback-errado">Resposta Errada</p>
            <p>
              A chance de uma criança de baixa renda ter um futuro melhor que a
              realidade em que nasceu está, em maior ou menor grau, relacionada
              à escolaridade e ao nível de renda de seus pais. Nos países ricos,
              o "elevador social" anda mais rápido. Nos emergentes, mais
              devagar. No Brasil, ainda mais lentamente. O país ocupa a segunda
              pior posição em um estudo sobre mobilidade social feito pela
              Organização para a Cooperação e Desenvolvimento Econômico (OCDE),
              em 2018, com dados de 30 países. Segundo os resultados, seriam
              necessárias nove gerações para que os descendentes de um
              brasileiro entre os 10% mais pobres ati ngissem o nível médio de
              rendimento do país. A esti mati va é a mesma para a África do Sul
              e só perde para a Colômbia, onde o período de ascensão levaria 11
              gerações. Mais de 1/3 daqueles que nascem entre os 20% mais pobres
              no Brasil permanece na base da pirâmide, enquanto apenas 7%
              consegue chegar aos 20% mais ricos. Filhos de pais na base da
              pirâmide têm difi culdade de acesso à saúde e maior probabilidade
              de frequentar uma escola com ensino de baixa qualidade. A educação
              precária, em geral, limita as opções para esses jovens no mercado
              de trabalho. Sobram-lhes empregos de baixa remuneração, em que a
              possibilidade de crescimento salarial para quem tem pouca qualifi
              cação é pequena – e a chance de perpetuação do ciclo de pobreza,
              grande. LEMOS, V. Brasil é o segundo pior em mobilidade social em
              ranking de 30 países. BBC News Brasil, 15 jun. 2018 (adaptado). A
              partir das informações apresentadas, é correto afirmar que
            </p>
            <div class="row-question">
              <input type="radio" value="opcao_a" name="alternativa" disabled />
              <label for="opcao_a">A)</label>
              <p>
                o fator ambiental e o fator demográfi co afetam a mobilidade
                social observada, sendo ela menor nos países que apresentam as
                maiores taxas de natalidade.
              </p>
            </div>
            <div class="row-question">
              <input type="radio" value="opcao_b" name="alternativa" disabled />
              <label for="opcao_b">B)</label>
              <p>
                a baixa organização social dos economicamente menos favorecidos
                determina a baixa mobilidade social da base para o topo da
                pirâmide.
              </p>
            </div>
            <div class="row-question">
              <input type="radio" value="opcao_c" name="alternativa" disabled />
              <label for="opcao_c">C)</label>
              <p>
                a mobilidade social é caracterizada por um fator ancestral que
                se revela ao longo das gerações, sendo um limitador da efi cácia
                de políti cas públicas de redução das desigualdades sociais.
              </p>
            </div>
            <div class="row-question">
              <input type="radio" value="opcao_d" name="alternativa" disabled />
              <label for="opcao_d">D)</label>
              <p>
                a análise de mobilidade social permite a observação de um ciclo
                vicioso, que se caracteriza por uma subida nas camadas sociais
                seguida de uma queda, repeti ndo-se esse ciclo de modo
                sucessivo.
              </p>
            </div>
            <div class="row-question">
              <input type="radio" value="opcao_e" name="alternativa" disabled />
              <label for="opcao_e">E)</label>
              <p>
                a ascensão social depende de fatores viabilizadores que estão
                fora do alcance das camadas pobres, o que ocasiona conflitos
                sociais em busca do acesso a tais fatores.
              </p>
            </div>
          </div>
          <div class="btn-container">
            <p style="margin-right: 10px"><b>Total de Acertos:</b> 7</p>
            <a href="../home/index.html" class="btn-view">Voltar</a>
            <a href="index.html" class="btn-cad">Fazer Novo Simulado</a>
          </div>
        </form>
      </div>
    </main>

    <script>
      function autoResize(fieldName) {
        const textarea = document.getElementById(fieldName);
        textarea.style.height = 'auto'; // Redefine a altura para auto
        textarea.style.height = textarea.scrollHeight + 'px'; // Ajusta a altura com base no conteúdo
      }
    </script>
  </body>
</html>
