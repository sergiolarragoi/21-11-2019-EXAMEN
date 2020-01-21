<?php

class ContactsClass {
    protected $idContact;
    protected $name;
    protected $surname;
    protected $tel;
    
    
    function getIdContact() {
        return $this->idContact;
    }

    function getName() {
        return $this->name;
    }

    function getSurname() {
        return $this->surname;
    }

    function getTel() {
        return $this->tel;
    }
    
    function setIdContact($idContact) {
        $this->idContact = $idContact;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setSurname($surname) {
        $this->surname = $surname;
    }

    function setTel($tel) {
        $this->tel = $tel;
    }  
    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    }
}