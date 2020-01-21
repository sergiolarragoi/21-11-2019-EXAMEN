<?php
require_once 'connect_data.php';
require_once 'GroupsClass.php';


class GroupsModel extends GroupsClass{
    
    private $link;
    private $list=array();
    
    //////////////////////////////////////////////////
    function getList() {
        return $this->list;
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
    
    public function findGroupByIdGroup()
    {
               
        //rellena los datos de un objeto Group por medio del IdGroup
      
        $this->OpenConnect();
       
        $sql="call spAllGroups()";
        
        $result = $this->link->query($sql);
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            $group=new self();
            $group->setIdGroup($row['idGroup']);
            $group->setGroupName($row['groupName']);
            
            array_push($this->list, $group);
        }
        mysqli_free_result($result);
        $this->CloseConnect();
        
        
        
        
    }
      
}
