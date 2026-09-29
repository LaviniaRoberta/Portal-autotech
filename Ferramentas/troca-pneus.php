<?php

$largura_atual = 0;
$perfil_atual = 0;
$aro_atual = 0;

$largura_novo = 0;
$perfil_novo = 0;
$aro_novo = 0;

$diametro_atual = 0;
$diametro_novo = 0;
$diferenca = 0;

$calculado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $largura_atual = floatval($_POST["largura_atual"]);
    $perfil_atual = floatval($_POST["perfil_atual"]);
    $aro_atual = floatval($_POST["aro_atual"]);

    $largura_novo = floatval($_POST["largura_novo"]);
    $perfil_novo = floatval($_POST["perfil_novo"]);
    $aro_novo = floatval($_POST["aro_novo"]);

    /*
    Cálculo do diâmetro:
    altura do pneu = largura × perfil / 100
    diâmetro = (altura × 2) + (aro × 25,4)
    */

    $altura_atual = $largura_atual * ($perfil_atual / 100);
    $altura_novo = $largura_novo * ($perfil_novo / 100);

    $diametro_atual = ($altura_atual * 2) + ($aro_atual * 25.4);
    $diametro_novo = ($altura_novo * 2) + ($aro_novo * 25.4);

    $diferenca = abs($diametro_novo - $diametro_atual);

    $calculado = true;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calculadora de Pneus - AutoTech</title>

    <link rel="stylesheet" href="../css/style.css">

</head>

<body>

    <header class="topo">

        <div class="logo">

            <h1>Auto<span>Tech</span></h1>

            <p>OFICINA MECÂNICA</p>

        </div>

        <div class="informacao">

            <h3>PORTAL DE FERRAMENTAS</h3>

            <p>Soluções rápidas para o dia a dia da oficina</p>

        </div>

    </header>


    <nav class="menu">

        <a href="../index.php"> Início</a>

        <a href="calculadora-orcamento.php">Orçamento</a>

        <a href="troca-pneus.php">Pneus</a>

        <a href="calculadora-combustivel.php">Combustível</a>

        <a href="avaliador-manutencao.php">Serviço</a>

        <a href="simulador-viagem.php">Viagem</a>

    </nav>


    <main>

        <section class="area-formulario">

            <h2>Calculadora de Pneus</h2>

            <p>
                Compare o tamanho do pneu atual com o novo pneu.
            </p>


            <form method="POST">

                <h3 style="margin-bottom: 20px;">
                    Pneu atual
                </h3>

                <div class="campo">

                    <label for="largura_atual">
                        Largura (mm):
                    </label>

                    <input
                        type="number"
                        id="largura_atual"
                        name="largura_atual"
                        min="1"
                        step="1"
                        placeholder="Ex: 205"
                        required>

                </div>


                <div class="campo">

                    <label for="perfil_atual">
                        Perfil (%):
                    </label>

                    <input
                        type="number"
                        id="perfil_atual"
                        name="perfil_atual"
                        min="1"
                        step="1"
                        placeholder="Ex: 55"
                        required>

                </div>


                <div class="campo">

                    <label for="aro_atual">
                        Aro (polegadas):
                    </label>

                    <input
                        type="number"
                        id="aro_atual"
                        name="aro_atual"
                        min="1"
                        step="1"
                        placeholder="Ex: 16"
                        required>

                </div>


                <h3 style="margin-top: 30px; margin-bottom: 20px;">
                    Pneu novo
                </h3>


                <div class="campo">

                    <label for="largura_novo">
                        Largura (mm):
                    </label>

                    <input
                        type="number"
                        id="largura_novo"
                        name="largura_novo"
                        min="1"
                        step="1"
                        placeholder="Ex: 215"
                        required>

                </div>


                <div class="campo">

                    <label for="perfil_novo">
                        Perfil (%):
                    </label>

                    <input
                        type="number"
                        id="perfil_novo"
                        name="perfil_novo"
                        min="1"
                        step="1"
                        placeholder="Ex: 55"
                        required>

                </div>


                <div class="campo">

                    <label for="aro_novo">
                        Aro (polegadas):
                    </label>

                    <input
                        type="number"
                        id="aro_novo"
                        name="aro_novo"
                        min="1"
                        step="1"
                        placeholder="Ex: 16"
                        required>

                </div>


                <button
                    type="submit"
                    class="botao-formulario">

                    Calcular

                </button>

            </form>


            <?php if ($calculado): ?>

                <div class="resultado">

                    <h3>Resultado da Comparação</h3>


                    <p>

                        <strong>Diâmetro do pneu atual:</strong>

                        <?php
                        echo number_format(
                            $diametro_atual,
                            2,
                            ',',
                            '.'
                        );
                        ?>

                        mm

                    </p>


                    <p>

                        <strong>Diâmetro do pneu novo:</strong>

                        <?php
                        echo number_format(
                            $diametro_novo,
                            2,
                            ',',
                            '.'
                        );
                        ?>

                        mm

                    </p>


                    <p>

                        <strong>Diferença:</strong>

                        <?php
                        echo number_format(
                            $diferenca,
                            2,
                            ',',
                            '.'
                        );
                        ?>

                        mm

                    </p>


                    <hr>


                    <?php if ($diferenca <= 10): ?>

                        <p class="alerta">

                            As medidas possuem uma diferença pequena
                            de diâmetro.

                        </p>

                    <?php else: ?>

                        <p class="alerta">

                            As medidas possuem uma diferença
                            significativa de diâmetro. Consulte um
                            profissional antes da troca.

                        </p>

                    <?php endif; ?>


                </div>

            <?php endif; ?>

        </section>

    </main>


    <footer class="rodape">

        <div class="rodape-coluna">

            <h3>
                Auto<span style="color:#e52525;">Tech</span>
            </h3>

            <p>
                Portal de ferramentas para oficina mecânica.
            </p>

        </div>


        <div class="rodape-coluna">

            <h3>Ferramentas</h3>

            <p>Orçamento</p>

            <p>Pneus</p>

            <p>Combustível</p>

        </div>


        <div class="rodape-coluna">

            <h3>AutoTech</h3>

            <p>
                Qualidade em cada quilômetro.
            </p>

            <p>
                Santana de Parnaíba - SP
            </p>

        </div>


        <div class="copyright">

            © 2026 AutoTech - Portal de Ferramentas

        </div>

    </footer>

</body>

</html>
