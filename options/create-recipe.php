<?php

require_once 'functions.php';

print_r(PHP_EOL);

print_r('|--------------------------------------|'.PHP_EOL);
print_r('|  Opcao escolhida: Cadastrar Receita  |'.PHP_EOL);
print_r('|--------------------------------------|'.PHP_EOL);

print_r(PHP_EOL);

print_r('Informe o valor, data e descricao da receita.'.PHP_EOL);

$value = readFloat('Valor recebido: ');

$date = readDate('Informe a data: ');

$description = readString('Informe a descricao: ');

$line = '"'.$description.'",'.$value.','.$date.PHP_EOL;

$fileRecipes = __DIR__.'/../database/recipes.csv';

file_put_contents($fileRecipes, $line, FILE_APPEND);

print_r(PHP_EOL);

print_r('### RECEITA CADASTRADA COM SUCESSO! ###'.PHP_EOL);
