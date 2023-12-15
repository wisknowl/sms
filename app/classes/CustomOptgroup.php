<?php

namespace App\Html\Elements;

use Spatie\Html\BaseElement;
use Spatie\Html\Elements\Optgroup;

class CustomOptgroup extends BaseElement implements Optgroup
{
    protected $tag = 'optgroup';

    public function __construct(string $label, array $options)
    {
        parent::__construct();

        $this->attribute('label', $label);

        foreach ($options as $value => $text) {
            $this->addChild(html()->option($value, $text));
        }
    }
}
