<?php

namespace Htmlacademy\Models;
use Htmlacademy\Models\ActionExecute;

class ActionExecute extends AbstractClass
{
    protected $publicName = "Выполнено";
    protected $innerName = "act_execute";

    public function checkRights(int $idExecutor, int $idTaskmaker, int $idUser):bool
    {
        return $idExecutor === $idUser;
    }
}
