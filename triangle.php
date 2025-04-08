<?php
function build_triangle($n) {
    $level = 1;
    $total_count = 0;

    while (true) {
        $total_count += 2 * $level - 1;
        if ($total_count == $n) {
            break;
        } elseif ($total_count > $n) {
            return "Невозможно построить треугольник";
        }
        $level++;
    }

    $current_number = 1;
    $output = "";

    for ($i = 1; $i <= $level; $i++) {
        $numbers_in_row = 2 * $i - 1;
        $spaces = str_repeat(" ", ($level - $i) * 2);
        $output .= $spaces;

        for ($j = 0; $j < $numbers_in_row; $j++) {
            $output .= $current_number . " ";
            $current_number++;
        }

        $output .= "\n";
    }

    return $output;
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Результат</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Результат:</h2>

<div class="result">
<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["number"])) {
    $n = intval($_POST["number"]);
    echo htmlspecialchars(build_triangle($n));
} else {
    echo "Пожалуйста, введите число.";
}
?>
</div>

<p><a href="index.html">Назад</a></p>

</body>
</html>
