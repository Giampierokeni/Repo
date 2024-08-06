<?php

namespace Controllers\Microcontroladores;

use Controllers\PublicController;
use Dao\TallerMicrocontroladores\TallerMicrocontroladores as DaoMicrocontrolador;
use Utilities\Validators;
use Utilities\Site;
use Utilities\ArrUtils;
use Views\Renderer;

class MicrocontroladoresForm extends PublicController
{
    private $viewData = [];
    private $nombre_microcontrolador = "";
    private $modelo = "";
    private $fecha_adquisicion = "";
    private $estado = "Disponible";
    private $id = 0;
    private $mode = "DSP";

    private $modeDscArr = [
        "DSP" => "Mostrar %s",
        "INS" => "Crear Nuevo",
        "UPD" => "Actualizar %s",
        "DEL" => "Eliminar %s"
    ];
    private $error = [];
    private $has_errors = false;
    private $isReadOnly = "readonly";
    private $showActions = true;
    private $cxfToken = "";

    private $estadoOpciones = [
        "En uso" => "En uso",
        "En reparación" => "En reparación",
        "Disponible" => "Disponible",
        "Descartado" => "Descartado"
    ];

    private function addError($errorMsg, $origin = "global")
    {
        if (!isset($this->error[$origin])) {
            $this->error[$origin] = [];
        }
        $this->error[$origin][] = $errorMsg;
        $this->has_errors = true;
    }

    private function getGetData()
    {
        if (isset($_GET['mode'])) {
            $this->mode = $_GET['mode'];
            if (!isset($this->modeDscArr[$this->mode])) {
                $this->addError('Modo Inválido');
            }
        }
        if (isset($_GET["id"])) {
            $this->id = intval($_GET["id"]);
            $tmpMicrocontroladorFromDb = DaoMicrocontrolador::getById($this->id);
            if ($tmpMicrocontroladorFromDb) {
                $this->nombre_microcontrolador = $tmpMicrocontroladorFromDb['nombre_microcontrolador'];
                $this->modelo = $tmpMicrocontroladorFromDb['modelo'];
                $this->fecha_adquisicion = $tmpMicrocontroladorFromDb['fecha_adquisicion'];
                $this->estado = $tmpMicrocontroladorFromDb['estado'];
            } else {
                $this->addError("Microcontrolador No Encontrado");
            }
        }
    }

    private function getPostData()
    {
        if (isset($_POST["cxfToken"])) {
            $this->cxfToken = $_POST['cxfToken'];
            if (Validators::IsEmpty($this->cxfToken)) {
                $this->addError('Token Inválido');
            }
        }
        if (isset($_POST['mode'])) {
            $tmpMode = $_POST['mode'];
            if (!isset($this->modeDscArr[$tmpMode])) {
                $this->addError("Modo Inválido");
            }
            if ($this->mode != $tmpMode) {
                $this->addError("Modo Inválido");
            }
        }
        if (isset($_POST["nombre_microcontrolador"])) {
            $this->nombre_microcontrolador = $_POST['nombre_microcontrolador'];
            if (Validators::IsEmpty($this->nombre_microcontrolador)) {
                $this->addError('Nombre Inválido', "nombre_microcontrolador_error");
            }
        }
        if (isset($_POST["modelo"])) {
            $this->modelo = $_POST['modelo'];
            if (Validators::IsEmpty($this->modelo)) {
                $this->addError('Modelo Inválido', "modelo_error");
            }
        }
        if (isset($_POST["fecha_adquisicion"])) {
            $this->fecha_adquisicion = $_POST['fecha_adquisicion'];
            if (Validators::IsEmpty($this->fecha_adquisicion)) {
                $this->addError('Fecha de Adquisición Inválida', "fecha_adquisicion_error");
            }
        }
        if (isset($_POST["estado"])) {
            $this->estado = $_POST['estado'];
            if (!isset($this->estadoOpciones[$this->estado])) {
                $this->addError('Estado Inválido', "estado_error");
            }
        }
    }

    private function executePostAction()
    {
        switch ($this->mode) {
            case "INS":
                $result = DaoMicrocontrolador::add(
                    $this->nombre_microcontrolador,
                    $this->modelo,
                    $this->fecha_adquisicion,
                    $this->estado
                );
                if ($result > 0) {
                    Site::redirectToWithMsg(
                        "index.php?page=Microcontroladores_MicrocontroladoresList",
                        "Microcontrolador Creado"
                    );
                } else {
                    $this->addError("Error al Crear el Microcontrolador");
                }
                break;
            case "UPD":
                $result = DaoMicrocontrolador::update(
                    $this->id,
                    $this->nombre_microcontrolador,
                    $this->modelo,
                    $this->fecha_adquisicion,
                    $this->estado
                );
                if ($result > 0) {
                    Site::redirectToWithMsg(
                        "index.php?page=Microcontroladores_MicrocontroladoresList",
                        "Microcontrolador Actualizado"
                    );
                } else {
                    $this->addError("Error al Actualizar el Microcontrolador");
                }
                break;
            case "DEL":
                $result = DaoMicrocontrolador::delete(
                    $this->id
                );
                if ($result > 0) {
                    Site::redirectToWithMsg(
                        "index.php?page=Microcontroladores_MicrocontroladoresList",
                        "Microcontrolador Eliminado"
                    );
                } else {
                    $this->addError("Error al Eliminar el Microcontrolador");
                }
                break;
            default:
                $this->addError("Modo Inválido");
                break;
        }
    }

    private function prepareView()
    {
        $this->viewData["modeDsc"] = sprintf($this->modeDscArr[$this->mode], $this->nombre_microcontrolador);
        $this->viewData["mode"] = $this->mode;
        $this->viewData["nombre_microcontrolador"] = $this->nombre_microcontrolador;
        $this->viewData["modelo"] = $this->modelo;
        $this->viewData["fecha_adquisicion"] = $this->fecha_adquisicion;
        $this->viewData["estado"] = $this->estado;
        $this->viewData["id"] = $this->id;
        $this->viewData["error"] = $this->error;
        $this->viewData["has_errors"] = $this->has_errors;

        if ($this->mode == "DSP" || $this->mode == "DEL") {
            $this->isReadOnly = true;
            if ($this->mode == "DSP") {
                $this->showActions = false;
            }
        } else {
            $this->isReadOnly = "";
            $this->showActions = true;
        }
        $this->viewData["isReadOnly"] = $this->isReadOnly;
        $this->viewData["showActions"] = $this->showActions;
        $this->viewData["cxfToken"] = $this->cxfToken;
        $this->viewData["estadoOpciones"] = ArrUtils::toOptionsArray(
            $this->estadoOpciones,
            "key",
            "values",
            "selected",
            $this->estado
        );
    }

    public function run(): void
    {
        $this->getGetData();
        if ($this->isPostBack()) {
            $this->getPostData();
            $this->executePostAction();
        }
        $this->prepareView();

        Renderer::render("micro/form", $this->viewData);
    }
}
