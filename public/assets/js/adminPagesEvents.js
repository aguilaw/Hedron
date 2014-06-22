(function(){
/*trigger a confirm window when attempting to delete an item
    from the 'x' icon or delete button*/
    var links= $(".items-list #delete");
    for (var i=0; i< links.length; i++){
        var link= links[i];
        link.onclick=verify;
    }
 
    $(".del-bttn").click(function(){
         return verify();
    }); 
    
    
    function verify() {
        return confirm("Delete?");
    }
    
    /*default Font Awesome Icons*/
    var UpdateIcons={"mssg":"fa-comments", "gallery":"fa-picture-o", "sketch":"fa-pencil", "event":"fa-thumb-tack"};
    /*change the name of the icon when the selected radio button changes*/
    $("input[name=updt-type]:radio").change(function(){
        $("#icon-name").val(UpdateIcons[this.value]);
    });



})();
