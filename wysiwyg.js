function iFrameon(){
    richtextfield.document.designMode = 'On';
}
function iBold(){
    richtextfield.document.execCommand('bold',false,null);
    return false;
}
function iUnderline(){
    richtextfield.document.execCommand('underline',false,null);
    return false;
}
function iItalic(){
    richtextfield.document.execCommand('italic',false,null);
    return false;
}
function iFontsize(){
    var size = prompt("Enter font-size between 1-7");
    richtextfield.document.execCommand('FontSize',false,size);
    return false;
}
function iOl(){
    richtextfield.document.execCommand('insertOrderedList',false,null);
    return false;
}
function iul(){
    richtextfield.document.execCommand('insertUnorderedList',false,null);
    return false;
}
function ilink(){
    var link = prompt("Enter the URL for a link : ","http://");
    richtextfield.document.execCommand('CreateLink',false,link);
    return false;
}
function iUnlink(){
    richtextfield.document.execCommand('unLink',false,null);
    return false;
}
function ileft(){
    richtextfield.document.execCommand('justifyLeft',false,null);
    return false;
}
function iright(){
    richtextfield.document.execCommand('justifyRight',false,null);
    return false;
}
function ijustify(){
    richtextfield.document.execCommand('justifyCenter',false,null);
    return false;
}
function submit_form(){
    var form = document.getElementById("blog_form");
    form.elements["blog_text"].value = window.frames['richtextfield'].document.body.innerHTML;
    form.submit();
}