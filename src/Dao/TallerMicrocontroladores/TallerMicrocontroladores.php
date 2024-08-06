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
    //getById
    public static function getById($id)
    {
        return self::obtenerUnRegistro(
            "SELECT * FROM TallerMicrocontroladores WHERE id = :id",
            ["id" => $id]
        );
    }
    //add
    public static function add(
        $nombre_microcontrolador,
        $modelo,
        $fecha_adquisicion,
        $estado
    ) {
        $insersql = "INSERT INTO TallerMicrocontroladores (nombre_microcontrolador, modelo, fecha_adquisicion, estado) VALUES (:nombre_microcontrolador, :modelo, :fecha_adquisicion, :estado)";
        return self::executeNonQuery($insersql, [
            "nombre_microcontrolador" => $nombre_microcontrolador,
            "modelo" => $modelo,
            "fecha_adquisicion" => $fecha_adquisicion,
            "estado" => $estado
        ]);
    }
    //update
    public static function update(
        $id,
        $nombre_microcontrolador,
        $modelo,
        $fecha_adquisicion,
        $estado
    ) {
        $updateSql = "UPDATE TallerMicrocontroladores SET nombre_microcontrolador = :nombre_microcontrolador, modelo = :modelo, fecha_adquisicion = :fecha_adquisicion, estado = :estado WHERE id = :id";
        return self::executeNonQuery($updateSql, [
            "id" => $id,
            "nombre_microcontrolador" => $nombre_microcontrolador,
            "modelo" => $modelo,
            "fecha_adquisicion" => $fecha_adquisicion,
            "estado" => $estado
        ]);
    }
    //delete
    public static function delete($id)
    {
        $deleteSql = "DELETE FROM TallerMicrocontroladores WHERE id = :id";
        return self::executeNonQuery($deleteSql, ["id" => $id]);
    }
}
