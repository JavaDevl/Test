(function()
{var b=function(w){
        var v=1,u=2,s=4,q=8,o=/^\s*(\d+)((px)|\%)?\s*$/i,
        m=/(^\s*(\d+)((px)|\%)?\s*$)|^$/i,l=/^\d+px$/,
        t=""
        ,r=""
        ,c=""
        ,a=""
        ,x=false
        ,y="";
        var k;
        var p=CKEDITOR.plugins.getPath("doksoft_image");
        ttl=w.lang.doksoft_image.dlg_title;
        return{
            title:ttl,
            minWidth:420,
            minHeight:110,
            onShow:function(){
                c=this.getContentElement("info","message").getElement();
                a=this.getContentElement("info","message1").getElement();
                r=this.getContentElement("info","uploadButton").getElement();
                x=false;makethumb=false;
                if(t!=""){c.hide();a.hide();t.show();r.show();
                }},
            onOk:function(){
                var d=this;
                d.imageElement=w.document.createElement("img");
                d.imageElement.setAttribute("alt","");
                d.imageElement.setAttribute("class","doksoft_image_img");
                d.commitContent(v,d.imageElement);
               
              w.insertElement(d.imageElement);
              
            },
            onLoad:function(){var d=this;var e=d._.element.getDocument();},onHide:function(){var d=this;if(d.originalElement){d.originalElement.remove();d.originalElement=false;}delete d.imageElement;},contents:[{id:"info",label:w.lang.doksoft_image.status_file_upload,accessKey:"I",elements:[{type:"vbox",padding:0,children:[{type:"vbox",id:"uploadbox",align:"right",children:[{type:"html",style:"margin-top:30px;width:40px;height:40px;font-weight:bold;",id:"message",html:w.lang.doksoft_image.status_file_upload_success,hidden:true},{type:"html",style:"margin-top:30px;width:40px;height:40px;font-weight:bold;",id:"message1",html:w.lang.doksoft_image.status_file_upload_wait,hidden:true},{type:"file",id:"upload",style:"height:40px",size:38,onChange:function(){x=true;t=this.getElement();}},{type:"fileButton",id:"uploadButton",onClick:function(){if(x){a.show();t.hide();r.hide();}},filebrowser:{action:"QuickUpload",target:"info:txtUrl",url:w.config.filebrowserImageUploadUrl,onSelect:function(d,f){if(d){var h=this.getDialog();var e=this.filebrowser.target||null;d=d.replace(/#/g,"%23");if(e){var i=e.split(":");var g=h.getContentElement(i[0],i[1]);if(g){g.setValue(d);}}}else{x=false;a.hide();t.show();r.show();alert(w.lang.doksoft_image.status_file_upload_fail);}return false;}},label:w.lang.doksoft_image.label_send_to_server,"for":["info","upload"]},{id:"txtUrl",type:"text",label:w.lang.common.url,required:true,onChange:function(){var f=this.getDialog(),e=this.getValue();if(e.length>0){var d=f.originalElement;a.hide();c.show();}},setup:function(g,f){if(g==v){var e=f.data("cke-saved-src")||f.getAttribute("src"),d=this;this.getDialog().dontResetSize=true;}},commit:function(f,e){var d=this;if(f==v&&(d.getValue()||d.isChanged())){e.data("cke-saved-src",d.getValue());e.setAttribute("src",d.getValue());}else{e.setAttribute("src","");e.removeAttribute("src");}},validate:CKEDITOR.dialog.validate.notEmpty(w.lang.doksoft_image.label_no_file),hidden:true}]}]}]}]};};CKEDITOR.dialog.add("doksoft_image",function(a){return b(a);});})();