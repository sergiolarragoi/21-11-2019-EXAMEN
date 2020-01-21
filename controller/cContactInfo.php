<?php

include_once '../model/ContactsModel.php';

    $idContact=filter_input(INPUT_GET, 'idContact');
    
    $contact=new ContactsModel();
    $contact->setIdContact($idContact);
    $contact->findContactByIdContact();
   
    
    echo $contact->getObjJsonString();