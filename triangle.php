<?php

/**
 * Строит равнобедренный треугольник из чисел, если возможно.
 *
 * Принимает количество элементов и проверяет, можно ли разложить его
 * в треугольник вида: 1, затем 3, затем 5 и т.д. (нечётные уровни).
 * Если возможно — выводит треугольник, иначе сообщает об ошибке.
 *
 * @param int $n Количество элементов
 * @return void
 */

function build_triangle($n) {
    $level = 1;
    $total_count = 0;

    // Проверяем, можно ли разложить число на уровни с нечётным числом элементов
    while (true) {
        $total_count += 2 * $level - 1;
        if ($total_count == $n) {
            break;
        } elseif ($total_count > $n) {
            echo "Невозможно построить треугольник\n";
            return;
        }
        $level++;
    }

    $current_number = 1;
    for ($i = 1; $i <= $level; $i++) {
        $numbers_in_row = 2 * $i - 1;
        $spaces = str_repeat(" ", ($level - $i) * 2);

        echo $spaces;
        for ($j = 0; $j < $numbers_in_row; $j++) {
            echo $current_number . " ";
            $current_number++;
        }
        echo "\n";
    }
}

// Чтение из командной строки
if (isset($argv[1]) && is_numeric($argv[1])) {
    $input_number = intval($argv[1]);
    build_triangle($input_number);
} else {
    echo "Пожалуйста, передайте целое число в качестве аргумента.\n";
}
