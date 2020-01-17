<?php

print_r(PHP_EOL);

print_r('|----------------------------------------------------------------|'.PHP_EOL);
print_r('|                 Relatório de Receitas e Despesas               |'.PHP_EOL);
print_r('|----------------------------------------------------------------|'.PHP_EOL);
print_r('| Tipo     | Valor      | Data       | Descrição                 |'.PHP_EOL);
print_r('|----------------------------------------------------------------|'.PHP_EOL);

$lines = [];

/*
 * Buscando receitas e preenchendo o array de linhas.
 */
$fileRecipes = __DIR__ . '/../database/recipes.csv';

$recipesArray = file($fileRecipes);

for($i = 0; $i < count($recipesArray); $i++){

    $lineArray = str_getcsv($recipesArray[$i]);

    $lines[] = [
        'type' => 'RECEITA',
        'description' => $lineArray[0],
        'value' => $lineArray[1],
        'day' => $lineArray[2],
        'month' => $lineArray[3],
        'year' => $lineArray[4]
    ];
}

/*
 * Buscando despesas e preenchendo o array de linhas.
 */
$fileExpenses = __DIR__ . '/../database/expenses.csv';

$expensesArray = file($fileExpenses);

for($i = 0; $i < count($expensesArray); $i++){

    $lineArray = str_getcsv($expensesArray[$i]);

    $lines[] = [
        'type' => 'DESPESA',
        'description' => $lineArray[0],
        'value' => $lineArray[1],
        'day' => $lineArray[2],
        'month' => $lineArray[3],
        'year' => $lineArray[4]
    ];
}

function orderByDate($a, $b) {

    $timeStampA = mktime(0, 0, 0, $a['month'], $a['day'], $a['year']);
    $timeStampB = mktime(0, 0, 0, $b['month'], $b['day'], $b['year']);

    return $timeStampA > $timeStampB;
}

uasort($lines, 'orderByDate');

/*
 * Percorrendo o array de linhas, formatando e imprimindo os dados.
 */
$total = 0;

foreach($lines as $row){

    if($row['type'] == 'RECEITA'){
        $total = $total + $row['value'];
    }

    if($row['type'] == 'DESPESA'){
        $total = $total - $row['value'];
    }

    $value = str_pad($row['value'], 10, ' ', STR_PAD_RIGHT);
    
    $day = str_pad($row['day'], 2, '0', STR_PAD_LEFT);
    $month = str_pad($row['month'], 2, '0', STR_PAD_LEFT);

    $date = $day . '/' . $month . '/' . $row['year'];

    $description = str_pad($row['description'], 25, ' ', STR_PAD_RIGHT);

    print_r('| '.$row['type'].'  | '.$value.' | '.$date.' | '.$description.' |'.PHP_EOL);
}

$totalFormated = str_pad($total, 51, ' ', STR_PAD_RIGHT);

print_r('|----------------------------------------------------------------|'.PHP_EOL);
print_r('|Total:    | '.$totalFormated.' |'.PHP_EOL);
print_r('|----------------------------------------------------------------|'.PHP_EOL);