/*get more updates when the bottom of the updates box is reached*/
/*****sq-rnd = the box containing the list of updates*/
$(document).ready(function(){
    /*extract the page name fron the current url*/
    var path = window.location.pathname;
    var pageName = path.substr(path.lastIndexOf("/") + 1);
    
   /*request the nav element with the current page name and add 
   selected-tab class to change color */
    var currentPage=$("."+pageName);
    currentPage.addClass("selected-tab");
    
    /*when a nav button is clicked remove selected class from previous */
  $(".nav-bttn").click(function() {
    currentPage.removeClass("selected-tab");
});
    /*activate big text for home page speech bubble*/
  $(".bigtext").bigtext({minfontsize: 24});
});

