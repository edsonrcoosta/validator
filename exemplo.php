<?php
require __DIR__ ."/vendor/autoload.php";
use Negotel\Validators\Validator;



// Seus dados de exemplo
$data = (object) [
    'name' => 'John Doe',
    'email' => 'john@example.com',
    // Outros campos aqui
];

// Crie uma instância do Validator para um campo específico
$validator = Validator::when($data, 'name');

// Marque o campo como obrigatório
$validator->required();

try {
    // Obtenha o valor do campo (irá lançar exceção se não for válido)
    $name = $validator->getValue();

    // Use o valor validado, se necessário
    echo "Nome: " . $name;
} catch (\Exception $e) {
    // Lide com a exceção, por exemplo:
    echo "Erro: " . $e->getMessage();
}
