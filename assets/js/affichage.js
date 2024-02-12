function activeCurrentPage( idLink ){
    var current_page = document.getElementById(idLink);
        current_page.classList.add("border-bottom");
        current_page.classList.add("active");
}