<?php

namespace Negotel\Validators;

use Exception;

class Validator
{
    /**
     * @var object O objeto contendo os dados a serem validados.
     */
    protected $data;

    /**
     * @var string O nome do campo a ser validado.
     */
    protected $field;

    /**
     * @var bool Indica se o campo é obrigatório.
     */
    protected $isRequired = false;

    /**
     * Construtor da classe Validator.
     *
     * @param object $data  O objeto contendo os dados a serem validados.
     * @param string $field O nome do campo a ser validado.
     */
    public function __construct($data, $field)
    {
        $this->data = (array)$data;
        $this->field = $field;
    }

    /**
     * Cria uma nova instância do Validator.
     *
     * @param object $data  O objeto contendo os dados a serem validados.
     * @param string $field O nome do campo a ser validado.
     *
     * @return Validator A instância do Validator.
     */
    public static function when($data, $field)
    {
        return new self($data, $field);
    }

    /**
     * Marca o campo como obrigatório e verifica se ele não está vazio.
     *
     * @throws Exception Se o campo não existir ou estiver vazio e for marcado como obrigatório.
     *
     * @return Validator A instância do Validator para encadeamento.
     */
    public function required()
    {
        $this->isRequired = true;

        if (!isset($this->data[$this->field])) {
            throw new Exception("The field '{$this->field}' was not found.");
        } elseif (empty($this->data[$this->field])) {
            throw new Exception("The {$this->field} field is mandatory");
        }

        return $this; // Retorna a instância atual para encadeamento
    }

    /**
     * Obtém o valor do campo.
     *
     * @throws Exception Se o campo não existir ou estiver vazio e não for marcado como obrigatório.
     *
     * @return mixed O valor do campo, ou null se o campo for vazio e não for obrigatório.
     */
    public function getValue()
    {
        if ($this->isRequired || (!empty($this->data[$this->field]))) {
            return $this->data[$this->field];
        } else {
            return null;
        }
    }
}
