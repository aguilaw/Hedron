function verify(){
    if (confirm("Are you Sure?") == false) {
       var link = document.getElementById("delete");
       link.setAttribite('href','');
       return false;
    } 
    else {}
}