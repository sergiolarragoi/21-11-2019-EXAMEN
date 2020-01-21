<?php
class GroupsClass{
    
   protected $idGroup;
   protected $groupName;
   
   function setIdGroup($idGroup) {
       $this->idGroup = $idGroup;
   }
  
   function getIdGroup() {
       return $this->idGroup;
   }
   
   function getGroupName() {
       return $this->groupName;
   }

   function setGroupName($groupName) {
       $this->groupName = $groupName;
   }  
   function getObjectVars()
   {
       $vars = get_object_vars($this);
       return  $vars;
   }
}
