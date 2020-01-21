<?php

    include_once '../model/ContactsModel.php';
    
    $contacts=new ContactsModel();
    
    $contacts->setList();
   
    $contactsList=$contacts->getListJsonString();
    
    echo $contactsList;