<?php

print_r(PHP_EOL);

print_r('|--------------------------------------|'.PHP_EOL);
print_r('|  Opcao escolhida: Cadastrar Receita  |'.PHP_EOL);
print_r('|--------------------------------------|'.PHP_EOL);

print_r(PHP_EOL);

print_r('Informe o valor, data e descricao da receita.'.PHP_EOL);

$value = null;

while ($value == null) {

    print_r('Valor gasto: ');
    $value = stream_get_line(STDIN, 1024, PHP_EOL);

    $checkValueIsFloat = filter_var($value, FILTER_VALIDATE_FLOAT);

    if (false == $checkValueIsFloat) {
        print_r('O valor informado nao e valido!'.PHP_EOL);
        $value = null;
    }
}

$day = null;

while ($day == null) {

    print_r('Informe o DIA: ');
    $day = stream_get_line(STDIN, 1024, PHP_EOL);

    $checkDayIsInt = filter_var($day, FILTER_VALIDATE_INT);

    if (false == $checkDayIsInt || $day < 0 || $day > 31) {
        print_r('O dia informado nao e valido!'.PHP_EOL);
        $day = null;
    }
}

$month = null;

while ($month == null) {

    print_r('Informe o MES: ');
    $month = stream_get_line(STDIN, 1024, PHP_EOL);

    $checkMonthIsInt = filter_var($month, FILTER_VALIDATE_INT);

    if (false == $checkMonthIsInt || $month < 0 || $month > 12) {
        print_r('O mes informado nao e valido!'.PHP_EOL);
        $month = null;
    }
}

$year = null;

while ($year == null) {

    print_r('Informe o ANO: ');
    $year = stream_get_line(STDIN, 1024, PHP_EOL);

    $checkYearIsInt = filter_var($year, FILTER_VALIDATE_INT);

    if (false == $checkYearIsInt || $year < 0 || $year > 2999) {
        print_r('O ano informado nao e valido!'.PHP_EOL);
        $year = null;
    }
}

$description = null;

while ($description == null) {

    print_r('Informe a descricao: ');
    $description = stream_get_line(STDIN, 1024, PHP_EOL);

    if (strlen($description) < 0 || strlen($description) > 20) {
        print_r('A descricao informada nao e valida!'.PHP_EOL);
        $description = null;
    }
}

$line = '"'.$description.'",'.$value.','.$day.','.$month.','.$year.PHP_EOL;

$fileRecipes = __DIR__ . '/../database/recipes.csv';

file_put_contents($fileRecipes, $line, FILE_APPEND);

print_r(PHP_EOL);

print_r('Receita cadastrada com sucesso!'.PHP_EOL);