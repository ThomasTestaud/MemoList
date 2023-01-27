<?php

class Word {
    
    private function getList(): array
    {
        $newList = new Main;
        $list = $newList->getList();
        return $list;
    }
    
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
    
    public function CheckAnswer()
    {
        //Si on répond au formulaire
        if(isset($_POST['answer'])){
            //On check si le réponce correspond au résultat attendu
            if($_POST['answer'] === $_SESSION['guess']){
                //si c'est le cas, on affiche "bravo" et on génère un nouveau mot
                echo "<p class='not'>Bravo</p>";
                $_SESSION['goodPoints'] += 1;
                $_SESSION['newWord'] = true;
                $this->ChooseRandowWord();
            }
            //si non, on affiche 'raté' et on garde le même mot
            else{
                $_SESSION['badPoints'] += 1;
                echo "<p class='not'>Raté!</p>";
            }
        }
            
    }
    
}
