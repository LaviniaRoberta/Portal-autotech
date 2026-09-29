<?php

$quilometragem = 0;
$status = "";
$mensagem = "";
$avaliado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $quilometragem = floatval($_POST["quilometragem"]);

    if ($quilometragem <= 5000) {

        $status = "Manutenção em dia";
        $mensagem = "O veículo está dentro de uma quilometragem adequada para a manutenção.";

    } elseif ($quilometragem <= 10000) {

        $status = "Manutenção recomendada";
        $mensagem = "É recomendado realizar uma revisão preventiva do veículo.";

    } else {

        $status = "Manutenção necessária";
        $mensagem = "A quilometragem está alta. Procure uma oficina para realizar uma revisão.";

    }

    $avaliado = true;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Avaliador de Manutenção - AutoTech</title>

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

            <h2>Avaliador de Manutenção</h2>

            <p>
                Informe a quilometragem do veículo para verificar
                a situação da manutenção.
            </p>


            <form method="POST">

                <div class="campo">

                    <label for="quilometragem">
                        Quilometragem atual do veículo:
                    </label>

                    <input
                        type="number"
                        id="quilometragem"
                        name="quilometragem"
                        min="0"
                        step="1"
                        placeholder="Ex: 8500"
                        required>

                </div>


                <button
                    type="submit"
                    class="botao-formulario">

                    Avaliar manutenção

                </button>

            </form>


            <?php if ($avaliado): ?>

                <div class="resultado">

                    <h3>Resultado da Avaliação</h3>


                    <p>

                        <strong>Quilometragem:</strong>

                        <?php
                        echo number_format(
                            $quilometragem,
                            0,
                            ',',
                            '.'
                        );
                        ?>

                        km

                    </p>


                    <p>

                        <strong>Situação:</strong>

                        <?php echo $status; ?>

                    </p>


                    <hr>


                    <p>

                        <?php echo $mensagem; ?>

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

