<?php

class Word {
    
    public function __construct()
    {
        $this->addWord();
        $this->ChooseRandowWord();
        $this->CheckAnswer();
        $this->deleteItem();
    }
    
    private function getList(): array
    {
        $newList = new Main;
        $list = $newList->getList();
        return $list;
    }
    
    //Choisi un nouveau mot si il y est autorisé
    public function ChooseRandowWord(): void
    {
        $list = $this->getList();
        
        if(!isset($_SESSION['newWord'])){
            $_SESSION['newWord'] = true;
        }
        
        if($_SESSION['newWord']){
            $length = count($list);
            $randomNumber = rand(1, $length);
            $randomNumber -= 1;
            $_SESSION['word'] = $list[$randomNumber]['word'];
            $_SESSION['guess'] = $list[$randomNumber]['guess'];
            $_SESSION['clue'] = $_SESSION['guess'];
            $_SESSION['newWord'] = false;
        }
    }
    
    //Si un mot a été saisit, vérifie si la réponse est bonne
    public function CheckAnswer(): void
    {
        if(isset($_POST['answer'])){
            if($_POST['answer'] === $_SESSION['guess']){
                echo "<p class='not'>Bravo</p>";
                $_SESSION['newWord'] = true;
                $this->ChooseRandowWord();
            }
            else{
                echo "<p class='not'>Raté!</p>";
            }
        }
    }
    
    //Ajoute un mot à la base de donné si le formulaire est rempli
    public function addWord(): void
    {
        if(!empty($_POST['newWord'])&&!empty($_POST['newGuess'])){
            $send = new Main;
            $send->addItem();
            echo '<p class="not">Ajouté!</p>';
        }
    }
    
    public function deleteItem(): void
    {
        
        if(isset($_GET['page'])){
            if($_GET['page'] === 'delete'){
                // echo "<p class='not'>Delete</p>";
                $delete = new Main;
                $delete->deleteItem();
                $_SESSION['newWord'] = true;
            }
        }
    }
}
