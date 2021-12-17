if(sessionStorage.getItem('userID')!=null)
{
    let userID = sessionStorage.getItem('userID');
    if(userID[0]=='D')
    {
        $("#complaintUserID").attr('value', sessionStorage.getItem('userID'));
    }
}
$("#emergencyLink").click(function()
{
    $("#equipmentComplaint").css("display", "none");
    $("#emergency").css("display", "flex");
    $(this).addClass('active').siblings().removeClass('active');
});
$("#equipmentComplaintLink").click(function()
{
    $("#emergency").css("display", "none");
    $("#equipmentComplaint").css("display", "flex");
    $(this).addClass('active').siblings().removeClass('active');
});
function signOut()
{
    $.post('utilities/signout.php', {userID: sessionStorage.getItem('userID')});
    sessionStorage.clear();
    window.location='index.php';
}
window.lat = 15.3916934;
window.lng = 75.0235759;
function getLocation()
{
    if (navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(updatePosition);
    }
    return null;
};
function updatePosition(position)
{
  if (position)
  {
    window.lat = position.coords.latitude;
    window.lng = position.coords.longitude;
  }
}
function currentLocation()
{
  return {lat:window.lat, lng:window.lng};
}
updatePosition(getLocation());
var map, mark;
var initialize = function()
{
  map  = new google.maps.Map(document.getElementById('map-canvas'), {center:{lat:lat,lng:lng},zoom:19, zoomControl: true, mapTypeControl: true, scaleControl: true, streetViewControl: true, rotateControl: true, fullscreenControl: true});
  mark = new google.maps.Marker({position:{lat:lat, lng:lng}, map:map, title:"Emergency!", icon:"assets/mapMarker.gif"});
};
window.initialize = initialize;
var reposition = function(location)
{
    lat = location.lat;
    lng = location.lng;
    map.setCenter({lat:lat, lng:lng, alt:0});
    mark.setPosition({lat:lat, lng:lng, alt:0});
};
window.addEventListener("beforeunload", function () {
    $.post("utilities/stopSharing.php", {});
});
var liveStatus = "inactive";
function submitandGoLive()
{
    if(liveStatus=="inactive")
    {
        var empty = $("#driverGoLive").find('input[required]').filter(function() {
            return this.value == '';
        });
        if (empty.length)
        {
            alert("Fill all the required fields to start sharing the location!");
            return;
        }
        else
        {
            $("#driverGoLive").submit();
        }
        liveStatus = "sharing";
        liveButton = document.getElementById("offerButton");
        liveButton.style.backgroundColor = "red";
        liveButton.innerHTML = "Sharing your live location...(click here to end the live sharing). Do not reload the page!";
        $("#formDivision input").attr("readonly", true);
        $("#formDivision select").attr("readonly", true);
        $("#formDivision textarea").attr("readonly", true);
        getSharingLiveLocation = setInterval(function(){updatePosition(getLocation()); $.post("utilities/driverShare.php", {userID: sessionStorage.getItem("userID"), patientID: $("#patientIDstore").html(), latitude: window.lat, longitude: window.lng});}, 5000);
    }
    else if(liveStatus=="sharing")
    {
        clearInterval(getSharingLiveLocation);
        liveStatus = "inactive";
        liveButton = document.getElementById("offerButton");
        liveButton.style.backgroundColor = "#4255d4";
        liveButton.innerHTML = "Submit the Patient Details and Share Live Location to the management";
        $("#formDivision input").attr("readonly", false);
        $("#formDivision select").attr("readonly", false);
        $("#formDivision textarea").attr("readonly", false);
        $.post("utilities/stopSharing.php", {userID: sessionStorage.getItem('userID')});
    }
}