const branches = []
// Create an XMLHttpRequest object
var xhr = new XMLHttpRequest()

// Set the callback function
xhr.onreadystatechange = function () {
  if (xhr.readyState == 4 && xhr.status == 200) {
    // Process the response
    let response = JSON.parse(xhr.responseText)
    branches.push(...response)
  }
}

// Set the request URL and send the request
xhr.open('POST', 'ajax/branches.php', true)
xhr.send()

console.log(branches)
var map = L.map('mapId').setView([27.1027, 87.2975], 9)

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
  maxZoom: 19,
  attribution: `&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>`,
}).addTo(map)

let len = branches.length
console.log(len)

for (let i = 0; i < len; i++) {
  // popups
  var popups = L.popup({
    closeOnClick: true,
  }).setContent(address[i])

  // markers
  var marker = L.marker(coords[i]).addTo(map).bindPopup(popups)

  // labels
  var toollip = L.tooltip({
    parmanent: true,
  }).setContent(names[i])
  marker.bindTooltip(toollip)
}
