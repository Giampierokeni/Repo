<?php

namespace Controllers\Mantenimientos\Categorias;

use Controllers\JSONController;
use Views\Renderer;
use Utilities\Site;

class Categorias extends JSONController
{
    public function run(): void
    {
        Site::addBeginScript('public/js/fetchJson.js');
        Renderer::render('mantenimientos/categorias/categorias', []);
    }
}
