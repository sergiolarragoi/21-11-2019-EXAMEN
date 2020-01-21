<?php
require_once 'connect_data.php';
require_once 'ContactsClass.php';
require_once 'ContactsGroupsModel.php';
require_once 'EmailsModel.php';

class ContactsModel extends ContactsClass {

    private $link;
    private $list=array(); 
    private $emailsList=array();
    private $groupsList=array();

    //////////////////////////////////////////////////
    function getList() {
        return $this->list;
    }
    public function getEmailsList()
    {
        return $this->emailsList;
    }
    public function getGroupsList()
    {
        return $this->groupsList;
    }
    public function setEmailsList($emailsList)
    {
        $this->emailsList = $emailsList;
    }
    public function setGroupsList($groupsList)
    {
        $this->groupsList = $groupsList;
    }

    ///////////////////////////////////////////////////////
    
    public function OpenConnect()
    {
        $konDat=new connect_data();
        try
        {
            $this->link=new mysqli($konDat->host,$konDat->userbbdd,$konDat->passbbdd,$konDat->ddbbname);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        $this->link->set_charset("utf8"); // honek behartu egiten du aplikazio eta
        //                  //databasearen artean UTF -8 erabiltzera datuak trukatzeko
    }
    
    public function CloseConnect()
    {
        mysqli_close ($this->link);
        
    }
    
    public function setList()
    {
        
        // rellena el comboBox   (name y surname)

        $this->OpenConnect();
        $sql="call spAllContacts()";
        
        $result = $this->link->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $newContact=new self();
            $newContact->setIdContact($row['idContact']);
            $newContact->setName($row['name']);
            $newContact->setSurname($row['surname']);
            $newContact->setTel($row['tel']);
            
            array_push($this->list, $newContact);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        
        
    }
    
    
    
    public function findContactByIdContact()
    {
               
        //rellena los datos de un objeto Contact por medio del IdContact
        //y las 2 listas
        
        $this->OpenConnect();
        
        $idContact=$this->idContact;
        
        $sql="call spContactByIdContact($idContact)";
        $result= $this->link->query($sql);
        
        if ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $this->setIdContact($row['idContact']);
            $this->setName($row['name']);
            $this->setSurname($row['surname']);
            $this->setTel($row['tel']);
            
            $email=new EmailsModel();
            
            $email->setIdContact($row['idContact']);
            $email->setList();
            
            $this->setEmailsList($email->getList());
            
            $contactsGroup=new ContactsGroupsModel();
            
            $contactsGroup->setIdContact($row['idContact']);
            $contactsGroup->setList();
            
            $this->setGroupsList($contactsGroup->getList());
            
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        
        
        
        
        
    }
    function getListJsonString() {
       
        $arr=array();
        
        foreach ($this->list as $object)
        {
            $vars = $object->getObjectVars();
            
            array_push($arr, $vars);
        }
        return json_encode($arr);
    }
    
    function getObjJsonString() {     
        
        $vars = $this->getObjectVars();
        
        if ($this->getGroupsList() !=null )
        {
            $arrGroup=array();
            foreach ($this->getGroupsList() as $contactGroup)
            {
                $varsGroup = $contactGroup->getObjectVars();
                $varsGroup['group']=$contactGroup->getObjGroup()->getObjectVars();
                array_push($arrGroup, $varsGroup);
            }
           
            $vars['groupsList']=$arrGroup;
        }
        if ($this->getEmailsList() !=null )
        {
            $arrEmail=array();
            foreach ($this->getEmailsList() as $email)
            {
                $varsEmail = $email->getObjectVars();
                array_push($arrEmail, $varsEmail);
            }
            
            $vars['emailsList']=$arrEmail;
        }
   
        return json_encode($vars);
    }
   
    
  
}
