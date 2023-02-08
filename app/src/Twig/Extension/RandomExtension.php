<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\RandomExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class RandomExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/3.x/advanced.html#automatic-escaping
            new TwigFilter('random', [$this,'random']),
        ];
    }

    public function random($text)
    {
        $i = 0;
        foreach (str_split($text) as $char){
            $i++;
            if($i % 2 == 0){
               echo strtoupper($char);
            }else{
               echo  strtolower($char);
            }
           
        }
    }
}
