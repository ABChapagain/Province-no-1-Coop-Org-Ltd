let url = window.location.href;
url = url.split("/").pop().split(".")[0] || "index";

let list = document.querySelector(`.${url}`);
if (list) {
  list.classList.add("active");
}

//tooltip
$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

//sidebar toggle
$(document).on("click", "[data-widget='pushmenu']", function () {
  if (document.querySelector("body").classList.contains("sidebar-collapse")) {
    document.querySelector("body").classList.remove("sidebar-collapse");
  } else {
    document.querySelector("body").classList.add("sidebar-collapse");
  }
});

//light box for image
$(function () {
  $(document).on("click", '[data-toggle="lightbox"]', function (event) {
    event.preventDefault();
    $(this).ekkoLightbox({
      alwaysShowClose: true,
    });
  });
});

//toast
var Toast = Swal.mixin({
  toast: true,
  position: "top-end",
  showConfirmButton: false,
  timer: 3000,
});

const success = function (status, message) {
  Toast.fire({
    icon: status,
    title: message,
  });
};

//show delete confirmation
async function deleteConfirmation() {
  return await Swal.fire({
    title: "Are you sure?",
    text: "You won't be able to revert this!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Delete",
  });
}

// delete product
const deleteProduct = async function (id) {
  const result = await deleteConfirmation();
  if (result.isConfirmed) {
    location.replace(`pages/delete/product.php?id=${id}`);
  }
};

//delete category
const deleteCategory = async function (id) {
  const result = await deleteConfirmation();
  if (result.isConfirmed) {
    location.replace(`pages/delete/category.php?id=${id}`);
  }
};

//delete image
async function deleteImage(id, name) {
  const result = await deleteConfirmation();
  if (result.isConfirmed) {
    $.ajax({
      type: "post",
      url: "../../ajax/delete_image.php",
      data: { id: id, name: name },
      success: function (response) {
        location.reload();
      },
    });
  }
}
