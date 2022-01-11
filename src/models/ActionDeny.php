<?php

namespace Htmlacademy\Models;
use Htmlacademy\Models\ActionExecute;

class ActionDeny extends AbstractClass
{

    protected $publicName = "Отказаться";
    protected $innerName = "act_deny";

    public function checkRights(int $idExecutor, int $idTaskmaker, int $idUser):bool
    {
        return $idUser === $idExecutor;
    }
}
