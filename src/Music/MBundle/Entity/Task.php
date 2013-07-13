<?php

// src/Acme/TaskBundle/Entity/Task.php
namespace Music\MBundle\Entity;

class Task
{
    protected $data;

    public function getData()
    {
        return $this->data;
    }
    public function setData($data)
    {
        $this->data = $data;
    }

}