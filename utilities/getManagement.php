<?php
require_once("config.php");
$userID = $_POST["userID"];
$query1 = $con->prepare("SELECT * FROM location WHERE liveStatus='active' AND EXISTS(SELECT * FROM driver WHERE managementID=:managementID AND driverID=location.driverID) ORDER BY timeBegin DESC");
$query1->bindParam(":managementID", $_POST["userID"]);
$query1->execute();
$sqldata1 = $query1->fetchAll(PDO::FETCH_ASSOC);
$table1 = "";
foreach($sqldata1 as $row1)
{
    $query2 = $con->prepare("SELECT * FROM driver WHERE driverID=:driverID");
    $query2->bindParam(":driverID", $row1["driverID"]);
    $query2->execute();
    $sqldata2 = $query2->fetch(PDO::FETCH_ASSOC);
    $driverID = $row1["driverID"];
    $driverName = $sqldata2["name"];
    $ambulanceNo = $sqldata2["ambulanceNo"];
    $driverMobile = $sqldata2["driverMobile"];
    $patientID = $row1["patientID"];
    $query3 = $con->prepare("SELECT * FROM patient WHERE patientID=:patientID");
    $query3->bindParam(":patientID", $patientID);
    $query3->execute();
    $sqldata3 = $query3->fetch(PDO::FETCH_ASSOC);
    $patientName = nl2br($sqldata3["name"]);
    $patientSex = nl2br($sqldata3["sex"]);
    $patientAge = nl2br($sqldata3["age"]);
    $patientMobile = nl2br($sqldata3["patientMobile"]);
    $patientAddress = nl2br($sqldata3["address"]);
    $patientAttendee = nl2br($sqldata3["attendee"]);
    $patientEmergency = nl2br($sqldata3["emergency"]);
    $patientChronicCond = nl2br($sqldata3["chronicCond"]);
    $patientAllergies = nl2br($sqldata3["allergies"]);
    $patientGlucose = nl2br($sqldata3["glucose"]);
    $patientOxygen = nl2br($sqldata3["oxygen"]);
    $patientPulse = nl2br($sqldata3["pulse"]);
    $pickup = ($sqldata3["pickup"])." on ".($row1["timeBegin"]);
    $destination = $sqldata3["destination"];
    $patientDetails = "<ul class='alignMe'><li><b>Name</b> $patientName</li><li><b>Sex</b> $patientSex</li><li><b>Age</b> $patientAge</li><li><b>Contact No.</b> $patientMobile</li><li><b>Address</b> $patientAddress</li><li><b>Attendee</b> $patientAttendee</li><li><b>Emergency</b> $patientEmergency</li><li><b>Chronic Medical Contidions</b> $patientChronicCond</li><li><b>Allergies</b> $patientAllergies</li><li><b>Glucose Levels</b> $patientGlucose mg/dL</li><li><b>%Sp O2 Levels</b> $patientOxygen</li><li><b>Pulse</b> $patientPulse bpm</li></ul>";
    $table1 .= "<tr><td style='width:8%;'><span class='time' style='background-color: #1aa385;' onclick=\"trackAmbulance('$driverID');\"><a data-toggle='modal' data-target='#myModal-three'>Track</a></span></td><td style='width:12%;'>$driverName</td><td style='width:10%;'>$ambulanceNo</td><td style='width:10%;'>$driverMobile</td><td style='width:15%;'>$pickup</td><td style='width:15%;'>$destination</td><td style='width:30%;'>$patientDetails</td></tr>";
}
$query4 = $con->prepare("SELECT * FROM location WHERE liveStatus='inactive' AND EXISTS(SELECT * FROM driver WHERE managementID=:managementID AND driverID=location.driverID) ORDER BY timeEnd DESC");
$query4->bindParam(":managementID", $_POST["userID"]);
$query4->execute();
$sqldata4 = $query4->fetchAll(PDO::FETCH_ASSOC);
$table2 = "";
foreach($sqldata4 as $row4)
{
    $query5 = $con->prepare("SELECT * FROM driver WHERE driverID=:driverID");
    $query5->bindParam(":driverID", $row4["driverID"]);
    $query5->execute();
    $sqldata5 = $query5->fetch(PDO::FETCH_ASSOC);
    $driverID = $row4["driverID"];
    $driverName = $sqldata5["name"];
    $ambulanceNo = $sqldata5["ambulanceNo"];
    $driverMobile = $sqldata5["driverMobile"];
    $patientID = $row4["patientID"];
    $query6 = $con->prepare("SELECT * FROM patient WHERE patientID=:patientID");
    $query6->bindParam(":patientID", $patientID);
    $query6->execute();
    $sqldata6 = $query6->fetch(PDO::FETCH_ASSOC);
    $patientName = nl2br($sqldata6["name"]);
    $patientSex = nl2br($sqldata6["sex"]);
    $patientAge = nl2br($sqldata6["age"]);
    $patientMobile = nl2br($sqldata6["patientMobile"]);
    $patientAddress = nl2br($sqldata6["address"]);
    $patientAttendee = nl2br($sqldata6["attendee"]);
    $patientEmergency = nl2br($sqldata6["emergency"]);
    $patientChronicCond = nl2br($sqldata6["chronicCond"]);
    $patientAllergies = nl2br($sqldata6["allergies"]);
    $patientGlucose = nl2br($sqldata6["glucose"]);
    $patientOxygen = nl2br($sqldata6["oxygen"]);
    $patientPulse = nl2br($sqldata6["pulse"]);
    $pickup = ($sqldata6["pickup"])." on ".($row4["timeBegin"]);
    $destination = $sqldata6["destination"];
    $patientDetails = "<ul class='alignMe'><li><b>Name</b> $patientName</li><li><b>Sex</b> $patientSex</li><li><b>Age</b> $patientAge</li><li><b>Contact No.</b> $patientMobile</li><li><b>Address</b> $patientAddress</li><li><b>Attendee</b> $patientAttendee</li><li><b>Emergency</b> $patientEmergency</li><li><b>Chronic Medical Contidions</b> $patientChronicCond</li><li><b>Allergies</b> $patientAllergies</li><li><b>Glucose Levels</b> $patientGlucose mg/dL</li><li><b>%Sp O2 Levels</b> $patientOxygen</li><li><b>Pulse</b> $patientPulse bpm</li></ul>";
    $table2 .= "<tr><td style='width:12%;'>$driverName</td><td style='width:10%;'>$ambulanceNo</td><td style='width:10%;'>$driverMobile</td><td style='width:15%;'>$pickup</td><td style='width:15%;'>$destination</td><td style='width:38%;'>$patientDetails</td></tr>";
}
$query7 = $con->prepare("SELECT * FROM equipmentComplaints WHERE complaintStatus='active' AND EXISTS(SELECT * FROM driver WHERE managementID=:managementID AND driverID=equipmentComplaints.driverID) ORDER BY id DESC");
$query7->bindParam(":managementID", $_POST["userID"]);
$query7->execute();
$sqldata7 = $query7->fetchAll(PDO::FETCH_ASSOC);
$table3 = "";
foreach($sqldata7 as $row7)
{
    $query8 = $con->prepare("SELECT * FROM driver WHERE driverID=:driverID");
    $query8->bindParam(":driverID", $row7["driverID"]);
    $query8->execute();
    $sqldata8 = $query8->fetch(PDO::FETCH_ASSOC);
    $driverID = $row7["driverID"];
    $driverName = $sqldata8["name"];
    $ambulanceNo = $sqldata8["ambulanceNo"];
    $driverMobile = $sqldata8["driverMobile"];
    $complaint = $row7["complaint"];
    $complaintID = $row7["id"];
    $table3 .= "<tr><td>$driverName</td><td>$ambulanceNo</td><td>$driverMobile</td><td>$complaint</td><td><input type='checkbox' class='statusBox table-row' onclick='updateComplaintStatus(this, $complaintID);'></td></tr>";
}
$query9 = $con->prepare("SELECT * FROM equipmentComplaints WHERE complaintStatus='resolved' AND EXISTS(SELECT * FROM driver WHERE managementID=:managementID AND driverID=equipmentComplaints.driverID) ORDER BY id DESC");
$query9->bindParam(":managementID", $_POST["userID"]);
$query9->execute();
$sqldata9 = $query9->fetchAll(PDO::FETCH_ASSOC);
foreach($sqldata9 as $row9)
{
    $query10 = $con->prepare("SELECT * FROM driver WHERE driverID=:driverID");
    $query10->bindParam(":driverID", $row9["driverID"]);
    $query10->execute();
    $sqldata10 = $query10->fetch(PDO::FETCH_ASSOC);
    $driverID = $row9["driverID"];
    $driverName = $sqldata10["name"];
    $ambulanceNo = $sqldata10["ambulanceNo"];
    $driverMobile = $sqldata10["driverMobile"];
    $complaint = $row9["complaint"];
    $complaintID = $row9["id"];
    $table3 .= "<tr><td>$driverName</td><td>$ambulanceNo</td><td>$driverMobile</td><td>$complaint</td><td><input type='checkbox' class='statusBox table-row' checked  onclick='updateComplaintStatus(this, $complaintID);'></td></tr>";
}
$table4 = "";
$query11 = $con->prepare("SELECT * FROM driver WHERE managementID=:managementID ORDER BY driverID");
$query11->bindParam(":managementID", $_POST["userID"]);
$query11->execute();
$sqldata11 = $query11->fetchAll(PDO::FETCH_ASSOC);
foreach($sqldata11 as $row11)
{
    $driverID = $row11["driverID"];
    $driverName = $row11["name"];
    $ambulanceNo = $row11["ambulanceNo"];
    $driverMobile = $row11["driverMobile"];
    $table4 .= "<tr><td>$driverID</td><td>$driverName</td><td>$ambulanceNo</td><td>$driverMobile</td></tr>";
}
echo "<div id='liveTracking' class='user-box'>
<div class='cards-wrapper' style='--delay: 1s'>
  <div class='cards card'>
    <table class='table'>
      <thead>
        <tr>
          <th style='width:8%'>Live Location</th>
          <th style='width:12%;'>Driver Name</th>
          <th style='width:10%;'>Ambulance No.</th>
          <th style='width:10%;'>Mobile</th>
          <th style='width:15%;'>Pickup</th>
          <th style='width:15%;'>Destination</th>
          <th style='width:30%;'>Patient Details</th>
        </tr>
      </thead>
      <tbody>
        $table1
      </tbody>
    </table>
  </div>
</div>
</div>
<div id='tripsHistory' class='user-box' style='display:none;'>
<div class='cards-wrapper' style='--delay: 1s'>
  <div class='cards card'>
    <table class='table'>
      <thead>
        <tr>
          <th style='width:12%;'>Driver Name</th>
          <th style='width:10%;'>Ambulance No.</th>
          <th style='width:10%;'>Mobile</th>
          <th style='width:15%;'>Pickup</th>
          <th style='width:15%;'>Destination</th>
          <th style='width:38%;'>Patient Details</th>
        </tr>
      </thead>
      <tbody>
      $table2
      </tbody>
    </table>
  </div>
</div>
</div>
<div id='equipmentComplaints' class='user-box' style='display:none;'>
<div class='cards-wrapper' style='--delay: 1s'>
  <div class='cards card'>
    <table class='table'>
      <thead>
        <tr>
          <th>Driver Name</th>
          <th>Ambulance No.</th>
          <th>Mobile</th>
          <th>Complaint</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        $table3
      </tbody>
    </table>
  </div>
</div>
</div>
<div id='addAmbulance' class='user-box' style='display:none;'>
<div class='cards-wrapper' style='--delay: 1s'>
  <div class='cards card'>
    <form action='utilities/addDriver.php' id='addDriverForm' method='POST' target='DummyFrame'>
      <div class='form-group'>
          <label>Driver Name</label>
          <div>
              <div class='input-group'>
                  <span class='input-group-addon'><svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='16' height='16' viewBox='0 0 172 172' style=' fill:#000000;'><g fill='none' fill-rule='nonzero' stroke='none' stroke-width='1' stroke-linecap='butt' stroke-linejoin='miter' stroke-miterlimit='10' stroke-dasharray='' stroke-dashoffset='0' font-family='none' font-weight='none' font-size='none' text-anchor='none' style='mix-blend-mode: normal'><path d='M0,172v-172h172v172z' fill='none'></path><g fill='#666666'><path d='M86,18.8125c-16.32656,0 -29.5625,13.23594 -29.5625,29.5625v4.22021c0,16.32656 12.66888,33.78796 29.5625,33.78796c16.89363,0 29.5625,-17.4614 29.5625,-33.78796v-4.22021c0,-16.32656 -13.23594,-29.5625 -29.5625,-29.5625zM85.99475,102.125c-22.17725,0 -39.03212,4.75658 -49.09412,8.63464c-6.53062,2.51819 -11.42637,8.03462 -13.13831,14.82324l-7.63733,30.29211h20.82288c3.70338,-15.4155 23.88637,-26.875 49.05212,-26.875c25.16575,0 45.34875,11.4595 49.05212,26.875h20.82288l-7.63733,-30.29211c-1.71194,-6.78862 -6.60499,-12.30505 -13.13831,-14.82324c-10.062,-3.87806 -26.91687,-8.63464 -49.09412,-8.63464l-0.0105,0.02099zM86,139.75c-17.90144,0 -33.4031,6.99019 -37.72998,16.125h75.45996c-4.32687,-9.13481 -19.82854,-16.125 -37.72998,-16.125z'></path></g></g></svg></span>
                  <input  name='driverName' placeholder='Name' class='form-control' type='text' required>
              </div>
          </div>
      </div>
      <div class='form-group'>
          <label>Phone</label>
          <div>
              <div class='input-group'>
                  <span class='input-group-addon'><i class='glyphicon glyphicon-earphone'></i></span>
                  <input name='driverMobile' placeholder='+91 123456789' class='form-control' type='text' required>
              </div>
          </div>
      </div>
      <div class='form-group'>
          <label>Ambulance Regn No.</label>
          <div>
              <div class='input-group'>
                  <span class='input-group-addon'><svg xmlns='http://www.w3.org/2000/svg' x='0px' y='0px' width='16' height='16' viewBox='0 0 172 172' style=' fill:#000000;'><g fill='none' fill-rule='nonzero' stroke='none' stroke-width='1' stroke-linecap='butt' stroke-linejoin='miter' stroke-miterlimit='10' stroke-dasharray='' stroke-dashoffset='0' font-family='none' font-weight='none' font-size='none' text-anchor='none' style='mix-blend-mode: normal'><path d='M0,172v-172h172v172z' fill='none'></path><g fill='#333333'><path d='M109.85681,0l-9.31702,0.09448l1.05505,18.71802h6.57178zM128.10242,6.29883l-10.28809,12.55566l4.18872,3.84753l12.099,-11.00195zM79.36523,9.9469l-3.80554,7.11243l14.65002,6.98645l2.73474,-4.99182zM96.75,26.875v10.75h21.5l-1.66919,-6.67676c-0.59663,-2.39188 -2.7504,-4.07324 -5.21753,-4.07324zM13.4375,43v96.75h10.75c0,-10.38987 8.42263,-18.8125 18.8125,-18.8125c10.38987,0 18.8125,8.42263 18.8125,18.8125h51.0625c0,-10.38987 8.42262,-18.8125 18.8125,-18.8125c10.13188,0 18.37263,8.01895 18.77576,18.05139l13.47424,-1.92639v-13.4375c-1.4835,0 -2.6875,-1.204 -2.6875,-2.6875v-5.375c0,-1.4835 1.204,-2.6875 2.6875,-2.6875v-11.90479l-34.9375,-6.90771v-29.5625h24.57068l-9.05982,-14.09363c-2.967,-4.61444 -8.0756,-7.40637 -13.56348,-7.40637zM63.15625,67.1875h8.0625l1.04456,11.04919l11.04919,1.04456v8.0625l-11.04919,1.04456l-1.04456,11.04919h-8.0625l-1.04456,-11.04919l-11.04919,-1.04456v-8.0625l11.04919,-1.04456zM43,126.3125c-7.42019,0 -13.4375,6.01731 -13.4375,13.4375c0,7.42019 6.01731,13.4375 13.4375,13.4375c7.42019,0 13.4375,-6.01731 13.4375,-13.4375c0,-7.42019 -6.01731,-13.4375 -13.4375,-13.4375zM131.6875,126.3125c-7.42019,0 -13.4375,6.01731 -13.4375,13.4375c0,7.42019 6.01731,13.4375 13.4375,13.4375c7.42019,0 13.4375,-6.01731 13.4375,-13.4375c0,-7.42019 -6.01731,-13.4375 -13.4375,-13.4375zM43,134.375c2.96969,0 5.375,2.40531 5.375,5.375c0,2.96969 -2.40531,5.375 -5.375,5.375c-2.96969,0 -5.375,-2.40531 -5.375,-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375zM131.6875,134.375c2.96969,0 5.375,2.40531 5.375,5.375c0,2.96969 -2.40531,5.375 -5.375,5.375c-2.96969,0 -5.375,-2.40531 -5.375,-5.375c0,-2.96969 2.40531,-5.375 5.375,-5.375z'></path></g></g></svg></span>
                  <input name='ambulanceNo' placeholder='XX XX XX XXXX' class='form-control' type='text' required>
              </div>
          </div>
      </div>
      <div class='form-group'>
          <label>ID</label>
          <div>
              <div class='input-group'>
                  <span class='input-group-addon'><i class='glyphicon glyphicon-user'></i></span>
                  <input name='driverID' placeholder='Driver User ID' class='form-control' type='text' required>
              </div>
          </div>
      </div>
      <div class='form-group'>
          <label>Password</label>
          <div>
              <div class='input-group'>
                  <span class='input-group-addon'><i class='glyphicon glyphicon-lock'></i></span>
                  <input name='driverPWD' placeholder='Password' class='form-control' type='password' required>
              </div>
          </div>
      </div>
      <input name='managementID' id='hiddenManagementID' value='$userID' type='text' style='display:none;'>
      <div class='alert alert-success' role='alert' style='display:none;align-self:center;'>The information about the new driver has been succesfully added</div>
      <div class='alert alert-danger' role='alert' style='display:none;align-self:center;'>The ID provided already exists. Provide a new one!</div>
      <button type='submit' style='align-self: center;' class='btn btn-primary'>Submit</button>
    </form>
    <table class='table'>
      <thead>
        <tr>
          <th>Driver ID</th>
          <th>Driver Name</th>
          <th>Ambulance No.</th>
          <th>Mobile</th>
        </tr>
      </thead>
      <tbody>
        $table4
      </tbody>
    </table>
  </div>
</div>
</div>"
?>
