
      <script>
        $(document).ready(function(){
            
            
      
            
            
                     var mar=function(arg){   $.ajax({
        
       type: "POST",
       url: "fcs/topfcsview/topfcsajax.php",
       data: { id: arg },
       success: function(msg){
   $("#derdaman").html(msg);
},
    error: function()
    { 
        }
     })};
     
     new mar('tc');
     
            $(".sameline").click(function(){
                var valid=  $(this).attr("id");
             if(valid=='tr')
                 {
                     $('#tr').css({"z-index":"1","background-color":"#993333","color":"#fff"});
                     $('#tc').css({"z-index":"0","background-color":"#ccc","color":"#333"});
            new     mar('tr');
            
            }
                 else
            {
                                     $('#tc').css({"z-index":"1","background-color":"#993333","color":"#fff"})
                                     $('#tr').css({"z-index":"0","background-color":"#ccc","color":"#333"})
        new mar('tc')    
        }
            })
        })    
              $('#loadingDiv')
    .hide()  // hide it initially
    .ajaxStart(function() {
        $(this).show();
    })
    .ajaxStop(function() {
        $(this).hide();
    })
;
</script>
    </head>

    <style>
        #tc
        {
            background-color: #993333;
            color: #fff;
        }
        #topfcs
        {
            
position:absolute;
            padding: 5px 5px 5px 7px;
                    display: inline-block;
                    
        }
        .sameline
        {
            cursor: pointer; 
            cursor: hand;
            background-color: #ccc;
            display:inline-block;
            width:120px;
            word-wrap:break-word;
            border-collapse: collapse;     
border-radius: 5px 25px 0 0px;
-ms-border-top-right-radius:25px;
        margin-right: -20px;
        padding-left: 15px;
        position: relative;
        
        }
#derdaman a
{
    text-decoration:none; color:#333
}

#derdaman a>div
{
    background-color:#fff; width:240px; display:block; text-align:left; font-size:11px;
                        margin:auto; margin-top:5px; height:54px;
}
#derdaman a>div>img
{
    float:left; height:50px; width:75px; margin:2px 0px 0px 2px; padding-right:4px;
}

        #loadingDiv
        {
            margin:auto;
            margin-top:50%
        }
        
    </style>
        <div id="topfcs">
            <div style="display:block">
                <div style=" z-index: 1" id="tc" class="sameline">Top Comments</div>
            <div style=" z-index: 0" id="tr" class="sameline">Top Read</div> 
            </div>
            <div id="derdaman" style="display:block; border:solid 2px #fff; width:255px; height:300px; text-align: center; background-color: #993333;">
                <img id="loadingDiv" src="fcs/images/ajax-loader.gif" />
            </div>
        </div>