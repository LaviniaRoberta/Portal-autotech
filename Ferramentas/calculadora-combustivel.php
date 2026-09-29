<?php

$servico = "";
$pecas = 0;
$mao_obra = 0;
$total = 0;
$calculado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servico = $_POST["servico"];
    $pecas = floatval($_POST["pecas"]);
    $mao_obra = floatval($_POST["mao_obra"]);

    $total = $pecas + $mao_obra;

    $calculado = true;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calculadora de Orçamento - AutoTech</title>

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

        <a href="calculadora-orcamento.php">
            Orçamento
        </a>

        <a href="troca-pneus.php">
            Pneus
        </a>

        <a href="calculadora-combustivel.php">
            Combustível
        </a>

        <a href="avaliador-manutencao.php">
            Serviço
        </a>

        <a href="simulador-viagem.php">
            Viagem
        </a>

    </nav>


    <main>

        <section class="area-formulario">

            <h2>Calculadora de Orçamento</h2>

            <p>
                Preencha os dados para calcular o valor total do serviço.
            </p>


            <form method="POST">

                <div class="campo">

                    <label for="servico">
                        Descrição do serviço:
                    </label>

                    <input
                        type="text"
                        id="servico"
                        name="servico"
                        placeholder="Ex: Troca de pastilhas de freio"
                        required>

                </div>


                <div class="campo">

                    <label for="pecas">
                        Valor das peças:
                    </label>

                    <input
                        type="number"
                        id="pecas"
                        name="pecas"
                        step="0.01"
                        min="0"
                        placeholder="0,00"
                        required>

                </div>


                <div class="campo">

                    <label for="mao_obra">
                        Valor da mão de obra:
                    </label>

                    <input
                        type="number"
                        id="mao_obra"
                        name="mao_obra"
                        step="0.01"
                        min="0"
                        placeholder="0,00"
                        required>

                </div>


                <button
                    type="submit"
                    class="botao-formulario">

                    Calcular orçamento

                </button>

            </form>


            <?php if ($calculado): ?>

                <div class="resultado">

                    <h3>
                        Resumo do Orçamento
                    </h3>


                    <p>

                        <strong>Serviço:</strong>

                        <?php
                        echo htmlspecialchars($servico);
                        ?>

                    </p>


                    <p>

                        <strong>Peças:</strong>

                        R$

                        <?php
                        echo number_format(
                            $pecas,
                            2,
                            ',',
                            '.'
                        );
                        ?>

                    </p>


                    <p>

                        <strong>Mão de obra:</strong>

                        R$

                        <?php
                        echo number_format(
                            $mao_obra,
                            2,
                            ',',
                            '.'
                        );
                        ?>

                    </p>


                    <hr>


                    <p>

                        <strong>Total:</strong>

                        R$

                        <?php
                        echo number_format(
                            $total,
                            2,
                            ',',
                            '.'
                        );
                        ?>

                    </p>


                    <?php if ($total > 1000): ?>

                        <p class="alerta">

                            Orçamento de alto valor.
                            Consulte as condições de pagamento.

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