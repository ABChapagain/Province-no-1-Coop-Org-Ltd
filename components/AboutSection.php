<?php
$sql = "SELECT * FROM members";
$res = $conn->query($sql);
$members = $res->fetch_all(MYSQLI_ASSOC);

if ($res->num_rows !== 0) {

?>


<!-- Team Area Start -->
<div class="team-area pt-95 pb-70">
    <div class="container">
        <div class="product-top-bar section-border mb-50">
            <div class="section-title-wrap style-two text-center">
                <h3 class="section-title">Our Members</h3>
            </div>
        </div>
        <div class="row">
            <?php
                foreach ($members as $member) :
                ?>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="team-wrapper mb-30">
                    <div class="team-img">
                        <img src="uploads/members/<?php echo $member['image'] ?>" alt="Team" />
                    </div>
                    <div class="team-content text-center">
                        <h4><?php echo $member['name'] ?></h4>
                        <span style="color: #519f10"><?php echo $member['position'] ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- Team Area End -->

<?php
}
?>

<!-- Branches Area Start -->
<div id="branchesInfoContainer">

</div>
<!-- Branches Area End -->

<?php require_once('./components/Testimonial.php') ?>




<script>
fetch('ajax/branches.php')
    .then((response) => response.json())
    .then((branches) => initMap(branches))
    .catch((error) => console.log(error))

const initMap = (branches) => {
    const branchesInfoContainer = document.querySelector('#branchesInfoContainer')

    let branchesInfoHtml = ''
    if (branches.length !== 0) {
        branchesInfoHtml = `<div class="branch-area pt-100 pb-100">
    <div class="container">
        <div class="section-title-wrap style-two text-center mb-50">
            <h3 class="section-title">Our Branches</h3>
        </div>
        <div class="row">
            <div class="col-4 border p-2" style="height: 700px; overflow-y: scroll;">
                <div class="section-title-wrap style-two text-center">
                    <h3 class="section-title">Branch Locator</h3>
                </div>
                <div class="my-5">
               `

        branches.forEach((branch) => {
            branchesInfoHtml += `<div class="col-12 px-3" id="branchesInfo-${branch.id}">
                        <h5>${branch.name}</h5>
                        <h5>${branch.address}</h5>
                        <a href="tel:${branch.phone}">
                            <h5 class="text-green">${branch.phone}</h5>
                        </a>
                        <a href="mailto:${branch.email}">
                            <h5 class="text-green">${branch.email}</h5>
                        </a>
                    </div>
                    <hr>`
        })
        branchesInfoHtml += `</div>

            </div>
            <div class="col-8">
                <div id="mapId" style="height: 100%; width: 100%"></div>
            </div>
            </div>
</div>
</div>`;

    }


    branchesInfoContainer.innerHTML = branchesInfoHtml

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
    }).addTo(map)

    for (let i = 0; i < branches.length; i++) {
        const branchesInfo = document.querySelector(
            `#branchesInfo-${branches[i].id}`
        )
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

        branchesInfo.addEventListener('mouseover', () => {
            map.flyTo(coords[i], 12)
        })
    }
}
</script>