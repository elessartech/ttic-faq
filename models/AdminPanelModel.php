<?php


class AdminPanelModel
{

    public $db = null;

    public function __construct($db) 
    {
        $this->db = $db;
    }

}