fetch('ajax/branches.php')
  .then((response) => response.json())
  .then((branches) => initMap(branches))
  .catch((error) => console.log(error))

const initMap = (branches) => {
  let coords = []
  let names = []
  let address = []
  for (var i = 0; i < branches.length; i++) {
    let lat = Number(branches[i].coords.split(',')[0])
    let long = Number(branches[i].coords.split(',')[1])
    coords.push([lat, long])
    names.push(branches[i].name)
    address.push(branches[i].address)
  }

  var map = L.map('mapId').setView([27.1027, 87.2975], 9)

  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: `&copy; <a href='http://www.openstreetmap.org/copyright'>OpenStreetMap</a>`,
  }).addTo(map)

  for (let i = 0; i < branches.length; i++) {
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
}
