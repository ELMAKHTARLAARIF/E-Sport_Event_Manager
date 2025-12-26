<?php
require_once './database/Connection.php';

function getPDO(): PDO {
    $db = new Connection();
    return $db->getConnection();
}