<?php

class Traitements
{
    public function all(string $query)
    {
        require "Connexion.php";
        //$connexion = Connexion::getInstance();
        $stmt = $conn->prepare($query);
        $stmt ->execute();
        $result = $stmt->fetchAll();
        if ($result) {
           return $result;
        }else{
            return false;
        }
    }

    public function show(string $query, array $parms)
    {
        require "Connexion.php";
        //$connexion = Connexion::getInstance();
        $stmt = $conn->prepare($query);
        $stmt->execute($parms);
        $result = $stmt->fetchAll();
        return $result;
        
    }
    
    public function insert(string $query, array $data)
    {
        require "Connexion.php";
        //$connexion = Connexion::getInstance();
        $stmt = $conn->prepare($query);
        $result= $stmt->execute($data);
        return $result;
    }

    public function edit(string $query, array $data)
    {
        require "Connexion.php";
        //$connexion = Connexion::getInstance();
        $stmt = $conn->prepare($query);
        $result= $stmt->execute($data);
        return $result;
    }

    public function delete(string $query, array $parms)
    {
        require "Connexion.php";
        //$connexion = Connexion::getInstance();
        $stmt = $conn->prepare($query);
        $result= $stmt->execute($parms);
        return $result;
    }
}