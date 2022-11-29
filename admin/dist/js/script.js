let url = window.location.href;
url = url.split("/").pop().split(".")[0] || "index";

let list = document.querySelector(`.${url}`).classList.add("active");
