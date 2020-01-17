<?php

print_r(PHP_EOL);

print_r('|-------------------------------|'.PHP_EOL);
print_r('|  Bem vindo ao SmartFinance!   |'.PHP_EOL);
print_r('|-------------------------------|'.PHP_EOL);

print_r(PHP_EOL);

print_r('O que você deseja fazer? (Escolha uma das seguintes opções)'.PHP_EOL);

print_r(PHP_EOL);
print_r(PHP_EOL);

print_r('1) Cadastrar Receita '.PHP_EOL);
print_r('2) Cadastrar Despesa '.PHP_EOL);
print_r('3) Ver relatório de gastos '.PHP_EOL);
print_r('4) Sair '.PHP_EOL);

print_r(PHP_EOL);

$option = null;

while ($option == null) {
    $option = readline('Digite a opção escolhida: ');

    $checkOptionIsInt = filter_var($option, FILTER_VALIDATE_INT);

    if (false == $checkOptionIsInt || $option < 0 || $option > 4) {
        print_r('Opção inválida!'.PHP_EOL);
        $option = null;
    }
}

switch ($option) {
    case 1:
        include('options/create-recipe.php');

    break;
    case 2:
        include('options/create-expense.php');

    break;
    case 3:
        include('options/report.php');
    
    break;
}

print_r(PHP_EOL);

print_r('|---------------------------------------------------|'.PHP_EOL);
print_r('|  Até logo! :-) Obrigado por usar o SmartFinance!  |'.PHP_EOL);
print_r('|---------------------------------------------------|'.PHP_EOL);