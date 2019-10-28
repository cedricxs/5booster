<?php
  class User{
    static $count = 0;
    $nom;
    $pwd;
    $PhoneNumber;
    $Email;
    $id;
    __contructor($nom,$pwd,$PhoneNumber,$Email){
      $this->nom = $nom;
      $this->pwd = $pwd;
      $this->PhoneNumber = $PhoneNumber;
      $this->Email = $Email;
      $this->id = User::id++;
    }
    
    
    }

    $a = new User(1,2,3,4);