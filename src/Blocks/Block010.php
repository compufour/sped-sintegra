<?php

namespace NFePHP\Sintegra\Blocks;

use NFePHP\Sintegra\Elements;
use NFePHP\Sintegra\Common\Block;
use NFePHP\Sintegra\Common\BlockInterface;

/**
 * Classe constutora do bloco 010 (inicial) Sintegra
 *
 * Esta classe irá usar um recurso para invocar as classes de cada um dos elementos
 * constituintes listados.
 */
final class Block010 extends Block implements BlockInterface
{
    public $elements = [
        'z0000' => ['class' => Elements\Z0000::class, 'level' => 0, 'type' => 'single'],
    ];
}