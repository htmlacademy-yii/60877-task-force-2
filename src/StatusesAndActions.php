<?php

class StatusesAndActions
{
    const STATUS_NEW = "Новое";
    const STATUS_CANCELLED = "Отмененное";
    const STATUS_INWORK = "В работе";
    const STATUS_DONE = "Сделано";
    const STATUS_FAILED = "Провалено";
    const ACTION_EXECUTE = 'execute';
    const ACTION_DONE = 'done';
    const ACTION_CANCEL = 'cancel';
    const ACTION_DENY = 'deny';

    public function __construct($taskAuthor, $idMaker)
    {
        $this->taskAuthor = $taskAuthor;
        $this->idMaker = $idMaker;
    }

    public function returnMapStatuses()
    {
        $mapStatuses = [
            STATUS_NEW => "Новое",
            STATUS_CANCELLED => "Отмененное",
            STATUS_INWORK => "В работе",
            STATUS_DONE => "Сделано",
            STATUS_FAILED => "Провалено"
        ];
        return $mapStatuses;
    }

    public function returnMapActions()
    {

        return   [
            ACTION_EXECUTE => 'execute',
            ACTION_DONE => 'done',
            ACTION_CANCEL => 'cancel',
            ACTION_DENY => 'deny'
        ];
    }

    public function getStatuses($status)
    {
        if (STATUS_NEW===$status) {
return ACTION_EXECUTE;
        } else if (STATUS_CANCELLED===$status) {
return ACTION_CANCEL;
        } else if (STATUS_INWORK===$status) {
       return  ACTION_EXECUTE;
        } else if (STATUS_DONE===$status) {
      return ACTION_DONE;
        } else if (STATUS_FAILED===$status) {
return [ACTION_CANCEL, ACTION_DENY];
        }
    }

    public function getActions($action)
    {

        if (ACTION_EXECUTE ===$action) {
            return STATUS_INWORK;
        } else if (ACTION_DONE===$action) {
            return STATUS_DONE;
        } else if (ACTION_CANCEL===$action) {
            return STATUS_CANCELLED;
        } else if (ACTION_DENY===$action) {
            return STATUS_FAILED;
        }
    }

}
