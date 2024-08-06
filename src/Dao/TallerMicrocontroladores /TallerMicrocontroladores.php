<?php

namespace Dao\TallerMicrocontroladores;

use Dao\Table;

class TallerMicrocontroladores extends Table
{
    //getAll
    public static function getAll()
    {
        return self::obtenerRegistros("SELECT * FROM TallerMicrocontroladores", []);
    }
}
