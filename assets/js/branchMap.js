$(document).ready(function () {
  var response = []
  $.ajax({
    type: 'GET',
    url: 'ajax/branches.php',
    async: false,
    success: function (text) {
      response = JSON.parse(text)
    },
  })
  console.log(response)

  //   parse response to json
  //   var pars = JSON.parse(response)
  //   console.log(pars)
})
