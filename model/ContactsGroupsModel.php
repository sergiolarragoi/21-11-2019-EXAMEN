<?php
require_once 'connect_data.php';
require_once 'ContactsGroupsClass.php';
require_once 'GroupsModel.php';

class ContactsGroupsModel extends ContactsGroupsClass {

    private $link;
    private $list=array(); 
    private $objGroup;
    
    //////////////////////////////////////////////////
    function getList() {
        return $this->list;
    } 
    public function getObjGroup()
    {
        return $this->objGroup;
    }
    public function setObjGroup($objGroup)
    {
        $this->objGroup = $objGroup;
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
        $this->link->set_charset("utf8"); 
    }
    
    public function CloseConnect()
    {
        mysqli_close ($this->link);
        
    }
    
    public function setList()
    {
            
            // rellenar la lista de grupos de un contacto
   

        
        
        
        
    }

    
  
}
