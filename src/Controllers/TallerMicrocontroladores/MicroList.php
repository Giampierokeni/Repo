<?php

namespace Controllers\TallerMicrocontroladores;

use Controllers\PublicController;
use Dao\TallerMicrocontroladores\TallerMicrocontroladores;
use Views\Renderer;

class LibrosList extends PublicController
{
    public function run(): void
    {
        $viewData["micro"] = TallerMicrocontroladores::getAll();
        Renderer::render("micro/list", $viewData);
    }
}
