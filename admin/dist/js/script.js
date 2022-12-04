import  "../../plugins/sweetalert2/sweetalert2.min.js"

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


//sidebar toggle
  $(document).on("click", "[data-widget='pushmenu']", function() {
        if (document.querySelector("body").classList.contains("sidebar-collapse")) {
            document.querySelector("body").classList.remove("sidebar-collapse")
        } else {
            document.querySelector("body").classList.add("sidebar-collapse")
        }
    })