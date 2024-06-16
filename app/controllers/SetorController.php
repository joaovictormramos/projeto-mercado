<?php

namespace app\controllers;

use app\models\Setor;

class SetorController extends Controller
{
    public function getSetor()
    {
        $setores = new Setor();
        $setores = $setores->getSetor();
        return $setores;
    }
}
