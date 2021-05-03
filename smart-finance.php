<?php

include 'functions.php';

print_r(PHP_EOL);

print_r('|-------------------------------|'.PHP_EOL);
print_r('|  Bem vindo ao SmartFinance!   |'.PHP_EOL);
print_r('|-------------------------------|'.PHP_EOL);

$exit = false;

while ($exit == false) {
    print_r(PHP_EOL.'O que voce deseja fazer agora? (Escolha uma das seguintes opcoes)'.PHP_EOL);

    print_r(PHP_EOL);
    print_r(PHP_EOL);

    print_r('1) Cadastrar Receita '.PHP_EOL);
    print_r('2) Cadastrar Despesa '.PHP_EOL);
    print_r('3) Ver relatorio de gastos '.PHP_EOL);
    print_r('4) Sair '.PHP_EOL);

    print_r(PHP_EOL);

    $option = readString('Digite uma opção: ');

    switch ($option) {
        case 1:
            include 'options/create-recipe.php';

        break;
        case 2:
            include 'options/create-expense.php';

        break;
        case 3:
            include 'options/report.php';

        break;
        case 4:
            $exit = true;
        break;
        default:
            print_r('Opcao invalida!'.PHP_EOL);
        break;
    }
}

print_r(PHP_EOL);

print_r('|---------------------------------------------------|'.PHP_EOL);
print_r('|  Ate logo! :-) Obrigado por usar o SmartFinance!  |'.PHP_EOL);
print_r('|---------------------------------------------------|'.PHP_EOL);
