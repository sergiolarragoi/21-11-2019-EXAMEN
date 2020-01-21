<?php
require_once 'connect_data.php';
require_once 'EmailsClass.php';

class EmailsModel extends EmailsClass {

    private $link;
    private $list=array();  
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
    
    //////////////////////////////////////////////////
    function getList() {
        return $this->list;
    }
    
    public function setList()
    {      
            
        // rellenar la lista de emails de un contacto
        
        $this->OpenConnect();
        $idContact=$this->idContact;
        $sql="call spEmailsByIdContact($idContact)";
        
        $result = $this->link->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $newEmail=new self();
            $newEmail->setIdEmail($row['idEmail']);
            $newEmail->setIdContact($row['idContact']);
            $newEmail->setE_mail($row['e_mail']);
            
            array_push($this->list, $newEmail);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        
        
    }
    
 
}
