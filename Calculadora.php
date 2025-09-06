<?php 
$resultado = null; //var que guarda o resultado

//calcula
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $op = $_POST['operacao'];

 //operações
    switch ($op) {
        case 'soma':
            $resultado = $num1 + $num2;
            break;
        case 'sub':
            $resultado = $num1 - $num2;
            break;
        case 'mult':
            $resultado = $num1 * $num2;
            break;
        case 'div':
            if ($num2 != 0) {
                $resultado = $num1 / $num2;
            } else {
                $resultado = "Erro: divisão por zero!";
            }
            break;
        case 'resto':
            if ($num2 != 0) {
                $resultado = $num1 % $num2;
            } else {
                $resultado = "Erro: resto por zero!";
            }
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    
    <title>Calculadora</title>
    <link rel="stylesheet" href="css.css">
</head>

<body>
<div class="borda">
    <h2> TJ Calculadora <h2>
            <h4> Calcule! <h4>
                    <form method="post"> <!-- formulario pra fazer a operação-->
                        <input type="number" name="num1" required value="<?= $_POST['num1'] ?? '' ?>"><br><br>
                        <input type="number" name="num2" required value="<?= $_POST['num2'] ?? '' ?>"><br><br>

                        <select name="operacao"> <!-- escolha do calculo-->
                            <option value="soma" <?= (($_POST['operacao'] ?? '') == 'soma') ? 'selected' : '' ?>>Somar
                            </option>
                            <option value="sub" <?= (($_POST['operacao'] ?? '') == 'sub') ? 'selected' : '' ?>>Subtrair
                            </option>
                            <option value="mult" <?= (($_POST['operacao'] ?? '') == 'mult') ? 'selected' : '' ?>>
                                Multiplicar
                            </option>
                            <option value="div" <?= (($_POST['operacao'] ?? '') == 'div') ? 'selected' : '' ?>>Dividir
                            </option>
                            <option value="resto" <?= (($_POST['operacao'] ?? '') == 'resto') ? 'selected' : '' ?>>Resto
                            </option>
                        </select>

                        <input type="submit" value="Calcular"><br><br>  <!-- botão calcular-->
                        <a href="calculadora.php" class="btn-limpar">Limpar</a> <!-- botão limpar-->
                    </form>

                    <!-- Resultado -->
                    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
                        <h3>Resultado:</h3>
                        <p><?= $resultado ?></p>
                    <?php endif; ?>
 </div>
                    
</body>

</html>