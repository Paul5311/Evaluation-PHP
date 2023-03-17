<?php

abstract class AbstractRepository
{
    protected $db;

    public function __construct()
    {
        $dsn = 'mysql:host=localhost;dbname=tp_blog';
        $user = 'mflasquin2';
        $password = 'mflasquin2';

        try {
            $this->db = new PDO($dsn, $user, $password);
        } catch (Exception $e) {
            echo 'Connexion échouée : ' . $e->getMessage();
        }
    }
}