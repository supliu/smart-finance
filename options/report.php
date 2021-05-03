<?php

print_r(PHP_EOL);

print_r('|----------------------------------------------------------------|'.PHP_EOL);
print_r('|                 Relatorio de Receitas e Despesas               |'.PHP_EOL);
print_r('|----------------------------------------------------------------|'.PHP_EOL);
print_r('| Tipo     | Valor      | Data       | Descricao                 |'.PHP_EOL);
print_r('|----------------------------------------------------------------|'.PHP_EOL);

// Buscando receitas
$fileRecipes = __DIR__.'/../database/recipes.csv';

$recipes = readFileToArray('RECEITA', $fileRecipes);

// Buscando despesas.
$fileExpenses = __DIR__.'/../database/expenses.csv';

$expenses = readFileToArray('DESPESA', $fileExpenses);

// Juntando receitas e despesas em um único array
$lines = array_merge($recipes, $expenses);

// Percorrendo o array de linhas, formatando e imprimindo os dados.
$total = 0;

foreach ($lines as $row) {
    if ($row['type'] == 'RECEITA') {
        $total = $total + $row['value'];
    }

    if ($row['type'] == 'DESPESA') {
        $total = $total - $row['value'];
    }

    $value = str_pad($row['value'], 10, ' ', STR_PAD_RIGHT);

    $day = str_pad($row['day'], 2, '0', STR_PAD_LEFT);
    $month = str_pad($row['month'], 2, '0', STR_PAD_LEFT);
    $date = str_pad($row['date'], 10, ' ', STR_PAD_RIGHT);
    $description = str_pad($row['description'], 25, ' ', STR_PAD_RIGHT);

    print_r('| '.$row['type'].'  | '.$value.' | '.$date.' | '.$description.' |'.PHP_EOL);
}

$totalFormated = str_pad($total, 51, ' ', STR_PAD_RIGHT);

print_r('|----------------------------------------------------------------|'.PHP_EOL);
print_r('| Total:   | '.$totalFormated.' |'.PHP_EOL);
print_r('|----------------------------------------------------------------|'.PHP_EOL);
