<?php

namespace Controllers\Microcontroladores;

use Controllers\PublicController;
use Dao\TallerMicrocontroladores\TallerMicrocontroladores;
use Views\Renderer;

class MicrocontroladoresList extends PublicController
{
    public function run(): void
    {
        $viewData["micro"] = TallerMicrocontroladores::getAll();
        Renderer::render("micro/list", $viewData);
    }
}
