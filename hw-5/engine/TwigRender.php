<?php

namespace app\engine;

use app\interfaces\IRenderer;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TwigRender implements IRenderer
{
    public function renderTemplate($template, $params = [])
    {
        //рендер через Твиг
        $loader = new FilesystemLoader('../twigtemplates');
        $twig = new Environment($loader);

        echo $twig->render($template, $params);

    }
}