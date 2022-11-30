let url = window.location.href;
url = url.split("/").pop().split(".")[0] || "index";

let list = document.querySelector(`.${url}`)
if(list){
    list.classList.add("active");
}


//tooltip
$(function() {
    $('[data-toggle="tooltip"]').tooltip()
})
