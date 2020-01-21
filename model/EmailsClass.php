<?php

class EmailsClass{
    protected $idEmail;
    protected $idContact;
    protected $e_mail;
    
    function getIdEmail() {
        return $this->idEmail;
    }

    function getIdContact() {
        return $this->idContact;
    }

    function setIdEmail($idEmail) {
        $this->idEmail = $idEmail;
    }

    function setIdContact($idContact) {
        $this->idContact = $idContact;
    }
    function getE_mail() {
        return $this->e_mail;
    }

    function setE_mail($e_mail) {
        $this->e_mail = $e_mail;
    }

    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    }

            
}
