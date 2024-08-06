<?php


namespace Controllers\Mantenimientos\Productos;

use Controllers\JSONController;
use Dao\Productos\Productos as DaoProductos;

class ProductosJson extends JSONController
{
    public function run(): void
    {
        $viewData["productos"] = DaoProductos::readAllProductos('');

        $this->json($viewData);
    }
}
