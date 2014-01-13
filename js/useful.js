
            var Usefulfct = Usefulfct || {};
     
            
            Usefulfct.Param=(function(){
                function GetParam(param){
                    var prmstr = window.location.search.substr(1).split("&");
                    /*
                     * Validate the paramaters to not be empty
                     * and retrieve only the values of catagory parameter
                     *
                     */
                    var arr=[];
                    var patt=new RegExp(param+"=.+");
                    if(patt.test(prmstr.toString()))
                         {                  
                    prmstr=prmstr.toString().split("=");
                         arr.push(prmstr[1]);
                     }
                     return arr;
                      }
                      return {
                          s:shownumber,
                          GetParam:GetParam }
                  }());
        Usefulfct.Param.s();
var Cat=Usefulfct.Param.GetParam("category");
