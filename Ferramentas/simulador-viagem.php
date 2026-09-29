<?php

$distancia = 0;
$consumo = 0;
$preco_combustivel = 0;
$litros = 0;
$custo = 0;
$calculado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $distancia = floatval($_POST["distancia"]);
    $consumo = floatval($_POST["consumo"]);
    $preco_combustivel = floatval($_POST["preco_combustivel"]);

    if ($consumo > 0) {

        $litros = $distancia / $consumo;
        $custo = $litros * $preco_combustivel;

        $calculado = true;
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Simulador de Viagem - AutoTech</title>

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

        <a href="../index.php">Início</a>

        <a href="calculadora-orcamento.php">Orçamento</a>

        <a href="troca-pneus.php">Pneus</a>

        <a href="calculadora-combustivel.php">Combustível</a>

        <a href="avaliador-manutencao.php">Serviço</a>

        <a href="simulador-viagem.php">Viagem</a>

    </nav>


    <main>

        <section class="area-formulario">

            <h2>Simulador de Viagem</h2>

            <p>
                Calcule uma estimativa do combustível necessário
                e do custo da sua viagem.
            </p>


            <form method="POST">

                <div class="campo">

                    <label for="distancia">
                        Distância da viagem (km):
                    </label>

                    <input
                        type="number"
                        id="distancia"
                        name="distancia"
                        step="0.1"
                        min="0"
                        placeholder="Ex: 300"
                        required>

                </div>


                <div class="campo">

                    <label for="consumo">
                        Consumo do veículo (km/l):
                    </label>

                    <input
                        type="number"
                        id="consumo"
                        name="consumo"
                        step="0.1"
                        min="0.1"
                        placeholder="Ex: 12"
                        required>

                </div>


                <div class="campo">

                    <label for="preco_combustivel">
                        Preço do combustível (R$/litro):
                    </label>

                    <input
                        type="number"
                        id="preco_combustivel"
                        name="preco_combustivel"
                        step="0.01"
                        min="0"
                        placeholder="Ex: 6,00"
                        required>

                </div>


                <button
                    type="submit"
                    class="botao-formulario">

                    Simular viagem

                </button>

            </form>


            <?php if ($calculado): ?>

                <div class="resultado">

                    <h3>Resultado da Viagem</h3>


                    <p>

                        <strong>Distância:</strong>

                        <?php echo number_format($distancia, 1, ',', '.'); ?>

                        km

                    </p>


                    <p>

                        <strong>Consumo do veículo:</strong>

                        <?php echo number_format($consumo, 1, ',', '.'); ?>

                        km/l

                    </p>


                    <p>

                        <strong>Combustível necessário:</strong>

                        <?php echo number_format($litros, 2, ',', '.'); ?>

                        litros

                    </p>


                    <p>

                        <strong>Preço do combustível:</strong>

                        R$

                        <?php
                        echo number_format(
                            $preco_combustivel,
                            2,
                            ',',
                            '.'
                        );
                        ?>

                    </p>


                    <hr>


                    <p>

                        <strong>Custo estimado da viagem:</strong>

                        R$

                        <?php
                        echo number_format(
                            $custo,
                            2,
                            ',',
                            '.'
                        );
                        ?>

                    </p>


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