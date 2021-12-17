if(sessionStorage.getItem('userID')!=null)
{
    let userID = sessionStorage.getItem('userID');
    if(userID[0]=='M')
    {
        $.ajax({
            type:"POST",
            url:"utilities/getManagement.php",
            data: {userID:sessionStorage.getItem('userID')},
            dataType:"html",
            success: function(data)
            {
                $(".main-container").append(data);
            }
        });
    }
}
$("#liveTrackingLink").click(function()
{
    $("#tripsHistory").css("display", "none");
    $("#equipmentComplaints").css("display", "none");
    $("#addAmbulance").css("display", "none");
    $("#liveTracking").css("display", "block");
    $(this).addClass('active').siblings().removeClass('active');
});
$("#tripsHistoryLink").click(function()
{
    $("#liveTracking").css("display", "none");
    $("#equipmentComplaints").css("display", "none");
    $("#addAmbulance").css("display", "none");
    $("#tripsHistory").css("display", "block");
    $(this).addClass('active').siblings().removeClass('active');
});
$("#equipmentComplaintsLink").click(function()
{
    $("#liveTracking").css("display", "none");
    $("#tripsHistory").css("display", "none");
    $("#addAmbulance").css("display", "none");
    $("#equipmentComplaints").css("display", "block");
    $(this).addClass('active').siblings().removeClass('active');
});
$("#addAmbulanceLink").click(function()
{
    $("#liveTracking").css("display", "none");
    $("#tripsHistory").css("display", "none");
    $("#equipmentComplaints").css("display", "none");
    $("#addAmbulance").css("display", "block");
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
function trackAmbulance(driverID)
{
    $("#map-canvas").show();
    getLiveDriverLocation = setInterval(function(){
        $.ajax({
            type:"POST",
            url:"utilities/getLocations.php",
            data: {userID: driverID},
            dataType:"html",
            success: function(data)
            {
                positionObj = JSON.parse(data);
                reposition({lat:parseFloat(positionObj.lat), lng:parseFloat(positionObj.lng)});
                console.log(positionObj.liveStatus);
                if(positionObj.liveStatus=='inactive')
                {
                    clearInterval(getLiveDriverLocation);
                    clearInterval(stopLiveLocationInterval);
                    window.location.reload();
                }
            }
        });
    }, 5000);
    stopLiveLocationInterval = setInterval(function(){
        if($("#myModal-three").css("display")=="none")
        {
            clearInterval(getLiveDriverLocation);
            clearInterval(stopLiveLocationInterval);
        }
    }, 1);
}
function updateComplaintStatus(obj, complaintID)
{
    if (obj.checked == true)
    {
        $.post("utilities/updateComplaintStatus.php", {status:'resolved', id:complaintID});
    }
    else
    {
        $.post("utilities/updateComplaintStatus.php", {status:'active', id:complaintID});
    }
}