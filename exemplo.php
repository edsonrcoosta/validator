<?php
require __DIR__ . "/vendor/autoload.php";

use Negotel\Validators\Validator;



// Seus dados de exemplo
$data = (object) [
    'name' => 'John Doe',
    'email' => 'johnexample.com',
    // Outros campos aqui
];



try {

    // Crie uma instância do Validator para um campo específico
    $isName = Validator::when($data, 'name');
    $isEmail = Validator::when($data, 'email');

    // Marque o campo como obrigatório
    $isName->required();
    $isEmail->required()->email();

    // Obtenha o valor do campo (irá lançar exceção se não for válido)
    $name = $isName->getValue();
    $email = $isEmail->getValue();

    // Use o valor validado, se necessário
    echo "Nome: " . $name;
    echo "\n";
    echo "Email: " . $email;
} catch (\Exception $e) {
    // Lide com a exceção, por exemplo:
    echo "Erro: " . $e->getMessage();
}
