function activeCurrentPage( idLink ){
    var current_page = document.getElementById(idLink);
        current_page.classList.add("border-bottom");
        current_page.classList.add("active");
}
function collapseAction(togglerId){
    var collapser = document.getElementById(togglerId);
    collapser.addEventListener("click" , function() {
        var data = document.getElementById(collapser.dataset.target.replace("#" , ""));

        if( collapser.ariaExpanded === "false" ){
            collapser.ariaExpanded = "true";
            collapser.classList.remove("collapsed");
            data.classList.add("collapsing");
            data.classList.remove("collapsing");
            data.classList.add("show");
            console.log("AFFICHER")
        }
        else{
            collapser.ariaExpanded = "false";
            collapser.classList.add("collapsed");
            data.classList.add("collapsing");
            data.classList.remove("collapsing");
            data.classList.remove("show");
            console.log("CACHER");
        }
    });
}