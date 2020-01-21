<?php

class ContactsGroupsClass{
    protected $idContact;
    protected $idGroup;
    
    function getIdContact() {
        return $this->idContact;
    }

    function getIdGroup() {
        return $this->idGroup;
    }

    function setIdContact($idContact) {
        $this->idContact = $idContact;
    }

    function setIdGroup($idGroup) {
        $this->idGroup = $idGroup;
    }
    function getObjectVars()
    {
        $vars = get_object_vars($this);
        return  $vars;
    }

}
