<?php

namespace Dao\Productos;

use Dao\Table;

class categories extends Table
{

    public static function getCategoriesForCombo(): array
    {
        $sqlstr = "SELECT category_id, category_name from categories where category_status='ACT';";
        return self::obtenerRegistros($sqlstr, array());
    }

    public static function getAllCategories(): array
    {
        $sqlstr = "SELECT * from categories;";
        return self::obtenerRegistros($sqlstr, []);
    }
}
