# Documentação de Instalação do Projeto Validator

Esta documentação descreve como instalar e utilizar a classe `Validator` em seu projeto PHP. A classe `Validator` é uma ferramenta útil para validar campos em objetos de dados.

## Instalação

Você pode instalar o projeto Validator via Composer, que é uma das maneiras mais populares de gerenciar dependências em projetos PHP. Certifique-se de que você já tenha o Composer instalado em seu sistema. Se não tiver, você pode baixá-lo em [getcomposer.org](https://getcomposer.org/).

Agora, siga os passos abaixo para instalar o projeto Validator:

1. Abra um terminal e navegue até o diretório raiz do seu projeto.

2. Execute o seguinte comando para adicionar o projeto Validator como uma dependência:

   ```shell
   composer require edsonr-coosta/validator
   ```

   Certifique-se de substituir `seu-nome-de-usuario` pelo seu nome de usuário no Packagist ou pelo nome da organização, se aplicável.

3. O Composer baixará e instalará automaticamente o projeto Validator e suas dependências no diretório `vendor` do seu projeto.

## Uso Básico

Após a instalação bem-sucedida, você pode começar a usar a classe `Validator` para validar campos em objetos de dados. Aqui está um exemplo de uso básico:

```php
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
```

## Requisitos
Necessário PHP 7.4 ou superior
