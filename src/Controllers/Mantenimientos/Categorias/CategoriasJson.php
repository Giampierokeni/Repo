<?php


namespace Controllers\Mantenimientos\Categorias;

use Controllers\JSONController;
use Dao\Productos\Categories as DaoCategories;

class CategoriasJson extends JSONController
{

    public function run(): void
    {
        $viewData["categorias"] = DaoCategories::getAllCategories();
        $this->json($viewData);
    }
}
