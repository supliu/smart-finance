<?php

print_r(PHP_EOL);

print_r('|--------------------------------------|'.PHP_EOL);
print_r('|  Opção escolhida: Cadastrar Despesa  |'.PHP_EOL);
print_r('|--------------------------------------|'.PHP_EOL);

print_r(PHP_EOL);

print_r('Informe o valor, data e descrição da despesa.'.PHP_EOL);

$value = null;

while ($value == null) {
    $value = readline('Valor gasto: ');

    $checkValueIsFloat = filter_var($value, FILTER_VALIDATE_FLOAT);

    if (false == $checkValueIsFloat) {
        print_r('O valor informado não é válido!'.PHP_EOL);
        $value = null;
    }
}

$day = null;

while ($day == null) {
    $day = readline('Informe o DIA: ');

    $checkDayIsInt = filter_var($day, FILTER_VALIDATE_INT);

    if (false == $checkDayIsInt || $day < 0 || $day > 31) {
        print_r('O dia informado não é válido!'.PHP_EOL);
        $day = null;
    }
}

$month = null;

while ($month == null) {
    $month = readline('Informe o MÊS: ');

    $checkMonthIsInt = filter_var($month, FILTER_VALIDATE_INT);

    if (false == $checkMonthIsInt || $month < 0 || $month > 12) {
        print_r('O mês informado não é válido!'.PHP_EOL);
        $month = null;
    }
}

$year = null;

while ($year == null) {
    $year = readline('Informe o ANO: ');

    $checkYearIsInt = filter_var($year, FILTER_VALIDATE_INT);

    if (false == $checkYearIsInt || $year < 0 || $year > 2999) {
        print_r('O ano informado não é válido!'.PHP_EOL);
        $year = null;
    }
}

$description = null;

while ($description == null) {
    $description = readline('Informe a descrição: ');

    if (strlen($description) < 0 || strlen($description) > 20) {
        print_r('A descrição informada não é valida!'.PHP_EOL);
        $description = null;
    }
}

$line = '"'.$description.'",'.$value.','.$day.','.$month.','.$year.PHP_EOL;

$fileExpenses = __DIR__ . '/../database/expenses.csv';

file_put_contents($fileExpenses, $line, FILE_APPEND);

print_r(PHP_EOL);

print_r('Despesa cadastrada com sucesso!'.PHP_EOL);