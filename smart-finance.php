<?php

print_r(PHP_EOL);

print_r('|-------------------------------|'.PHP_EOL);
print_r('|  Bem vindo ao SmartFinance!   |'.PHP_EOL);
print_r('|-------------------------------|'.PHP_EOL);

print_r(PHP_EOL);

print_r('O que voce deseja fazer? (Escolha uma das seguintes opcoes)'.PHP_EOL);

print_r(PHP_EOL);
print_r(PHP_EOL);

print_r('1) Cadastrar Receita '.PHP_EOL);
print_r('2) Cadastrar Despesa '.PHP_EOL);
print_r('3) Ver relatorio de gastos '.PHP_EOL);
print_r('4) Sair '.PHP_EOL);

print_r(PHP_EOL);

$option = null;

while ($option == null) {
    
    print_r('Digite a opcao escolhida: ');
    $option = stream_get_line(STDIN, 1024, PHP_EOL);

    $checkOptionIsInt = filter_var($option, FILTER_VALIDATE_INT);

    if (false == $checkOptionIsInt || $option < 0 || $option > 4) {
        print_r('Opção invalida!'.PHP_EOL);
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
print_r('|  Ate logo! :-) Obrigado por usar o SmartFinance!  |'.PHP_EOL);
print_r('|---------------------------------------------------|'.PHP_EOL);