<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Virtual</title>
    <link rel="stylesheet" href="style/pet.css">
</head>

<body>

    <div class="painel-pet">

        <!-- Vetor e estrutura de repetição para exibir produtos -->
        <h1>Pet Virtual</h1>


        <?php
        $energia = isset($_POST['energia']) ? $_POST['energia'] : 50;
        $humor = isset($_POST['humor']) ? $_POST['humor'] : 50;
        $acao = isset($_POST['acao']) ? $_POST['acao'] : "";

        /* Atualiza os valores de energia e humor com base na ação  */

        /* Switch é uma estrutura de controle que permite escolher entre várias opções com base no valor de uma variável */
        /* Case é uma palavra-chave utilizada dentro do switch para definir cada uma das opções */
        /* Break é usado para sair do switch após a execução de um case */

        /* O &nbsp; é utilizado para criar espaços em branco */
        echo "Energia: " . $energia . "&nbsp" . "&nbsp" . "&nbsp" . "&nbsp";
        echo "Humor: " . $humor;
        
        switch ($acao) {
            case "alimentar":
                $energia += 10;
                $humor += 5;
                echo "<p>Você alimentou seu PET! 🍔</p>";

                if($energia > 100 || $humor > 100) {
                    echo "<p>Seu PET está com muita energia! Evite alimentá-lo demais. 🍽️</p>";
                    $energia = 100; // Limita a energia máxima a 100
                    $humor = 100; // Limita o humor máximo a 100
                } elseif($energia < 0 || $humor < 0) {
                    echo "<p>Seu PET está sem energia! Dê um tempo para ele descansar. 💤</p>";
                    $energia = 0; // Limita a energia mínima a 0
                }

                break;
            case "brincar":
                $energia -= 5;
                $humor += 10;
                echo "<p>Você brincou com seu PET! 🎾</p>";

                if($humor > 100) {
                    echo "<p>Seu PET está com muita energia! Evite alimentá-lo demais. 🍽️</p>";
                    $humor = 100; // Limita o humor máximo a 100
                } elseif($energia < 0) {
                    echo "<p>Seu PET está sem energia! Dê um tempo para ele descansar. 💤</p>";
                    $energia = 0; // Limita a energia mínima a 0
                }

                break;
            case "dormir":
                $energia += 10;
                $humor -= 5;
                echo "<p>Seu PET dormiu! 😴</p>";

                if($energia > 100) {
                    echo "<p>Seu PET está com muita energia! 😃</p>";
                    $energia = 100; // Limita a energia máxima a 100
                } elseif($humor < 0) {
                    echo "<p>Seu PET está sem energia! Dê um tempo para ele descansar. 💤</p>";
                    $humor = 0; // Limita o humor mínima a 0
                }

                break;
            case "carinho":
                $humor += 15;
                $energia -= 5;
                echo "<p>Você fez carinho no seu PET! ❤️</p>";

                if($humor > 100) {
                    echo "<p>Seu PET está muito feliz! Continue cuidando bem dele. 😊</p>";
                    $humor = 100; // Limita o humor máximo a 100
                } elseif($energia < 0) {
                    echo "<p>Seu PET está triste! Dê mais atenção a ele. 😢</p>";
                    $energia = 0; // Limita a energia mínima a 0
                }

                break;
        }

        /*/for($i = 0; $i < $energia / 10; $i++) {
            echo "⚡"; // Exibe um ícone de raio para cada 10 pontos de energia
        }*/


        ?>

        <form action="" method="post">
            <input type="hidden" name="energia" value="<?= $energia; ?>">
            <input type="hidden" name="humor" value="<?= $humor; ?>">
            <!--- Ações do PET -->

            <button type="submit" name="acao" value="alimentar">🍔Alimentar</button>
            <button type="submit" name="acao" value="brincar">🎾Brincar</button>
            <button type="submit" name="acao" value="dormir">😴Dormir</button>
            <button type="submit" name="acao" value="carinho">❤️Carinho</button>
        </form>

        <br>
        <br>

        <small>Clique em um dos botões para interagir com seu PET!</small> <!-- small é uma tag HTML para texto menor -->

    </div>
</body>

</html>