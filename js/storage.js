      var StorageManagement=StorageManagement || {};
     StorageManagement=(function(){
         
         
         function isSessionEnabled(){
         
         if(typeof(Storage)!=="undefined")
  {
      return true;
  }
  else{
      return false;
  }
}

function SessionUserExist()
{
    
}

function setUser(user)
{
     sessionStorage.usersession=user;
}

var getuser= sessionStorage.usersession;


return {
    isSessionEnabled:isSessionEnabled
};

}());
         