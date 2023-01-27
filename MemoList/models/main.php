<?php

class Main {
    private function connect()
    {
        try {
            $db = new PDO('mysql:host=db.3wa.io;dbname=thomastestaud_MemoList', 'thomastestaud', 'c23e2220a763a675189ecf8ba3b047fa', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ]);
            // echo "connect";
            return $db;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    
    public function getList()
    {
        $db = $this->connect();

        $query = $db->prepare(
            'SELECT word, guess FROM `list`'
        );
        
        $query->execute();
        
        $list = $query->fetchAll();
        return $list;
    }
    
    public function addItem()
    {
        $db = $this->connect();
        $db = $this->connect();

        $query = $db->prepare(
            'INSERT INTO `list`(`word`, `guess`, `list_id`) VALUES (:word, :guess, 1)'
        );
        
        $query->execute([
            
        ]);
    }
}
