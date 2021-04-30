<?php

require_once 'functions.php';

print_r(PHP_EOL);

print_r('|--------------------------------------|'.PHP_EOL);
print_r('|  Opcao escolhida: Cadastrar Despesa  |'.PHP_EOL);
print_r('|--------------------------------------|'.PHP_EOL);

print_r(PHP_EOL);

print_r('Informe o valor, data e descricao da despesa.'.PHP_EOL);

$value = readFloat('Valor gasto: ');

$date = readDate('Informe a data: ');

$description = readString('Informe a descricao: ');

$line = '"'.$description.'",'.$value.','.$date.PHP_EOL;

$fileExpenses = __DIR__.'/../database/expenses.csv';

file_put_contents($fileExpenses, $line, FILE_APPEND);

print_r(PHP_EOL);

print_r('### DESPESA CADASTRADA COM SUCESSO! ###'.PHP_EOL);
