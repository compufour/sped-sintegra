<?php

namespace NFePHP\Sintegra\Elements;

/**
 *  Registro de inventário
 */

use NFePHP\Sintegra\Common\Element;
use NFePHP\Sintegra\Common\ElementInterface;
use \stdClass;

class Z74 extends Element implements ElementInterface
{
    const REGISTRO = '74';

    protected $parameters = [
        'DATA_INVENTARIO' => [
            'type' => 'string',
            'regex' => '^(2[0-9]{3})(0?[1-9]|1[012])(0?[1-9]|[12][0-9]|3[01])$',
            'required' => true,
            'info' => 'Data do inventário',
            'format' => '',
            'length' => 8
        ],
        'CODIGO_PRODUTO' => [
            'type' => 'string',
            'regex' => '^.{1,14}$',
            'required' => true,
            'info' => 'Código do produto',
            'format' => 'empty',
            'length' => 14
        ],
        'QUANTIDADE' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => '	Quantidade do produto (com 3 decimais)',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'VL_PRODUTO' => [
            'type' => 'numeric',
            'regex' => '^\d+(\.\d*)?|\.\d+$',
            'required' => true,
            'info' => 'Valor bruto do produto (valor unitário multiplicado por quantidade) - com 2 decimais',
            'format' => 'totalNumber',
            'length' => 13
        ],
        'CODIGO_POSSE' => [
            'type' => 'string',
            'regex' => '^(1|2|3)$',
            'required' => true,
            'info' => 'Código de posse das mercadorias inventariadas (1 - Mercadorias de propriedade do Informante e em seu poder; 2 - Mercadorias de propriedade do Informante em poder de terceiros; 3 - Mercadorias de propriedade de terceiros em poder do Informante)',
            'format' => 'empty',
            'length' => 1
        ],
        'CNPJ' => [
            'type' => 'string',
            'regex' => '^[0-9]{14}$',
            'required' => false,
            'info' => 'Número de inscrição do estabelecimento matriz da pessoa jurídica no CNPJ.',
            'format' => '',
            'length' => 14
        ],
        'IE' => [
            'type' => 'string',
            'regex' => '^[0-9]{2,14}$',
            'required' => false,
            'info' => 'Número de inscrição do estudal.',
            'format' => '',
            'length' => 14
        ],
        'UF' => [
            'type' => 'string',
            'regex' => '^(AC|AL|AM|AP|BA|CE|DF|ES|GO|MA|MG|MS|MT|PA|PB|PE|PI|PR|RJ|RN|RO|RR|RS|SC|SE|SP|TO)$',
            'required' => true,
            'info' => 'UF do possuidor/proprietário',
            'format' => 'empty',
            'length' => 2
        ],
        'BRANCOS' => [
            'type' => 'string',
            'regex' => '',
            'required' => false,
            'info' => 'Brancos',
            'format' => 'empty',
            'length' => 45
        ]
    ];

    /**
     * Constructor
     * @param \stdClass $std
     */
    public function __construct(\stdClass $std)
    {
        parent::__construct(self::REGISTRO);
        $std->BRANCOS = '';
        $this->std = $this->standarize($std);
        $this->postValidation();
    }
}