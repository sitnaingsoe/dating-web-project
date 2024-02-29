<?php 
  session_start();
  include "header.php";
  if (isset($_SESSION['username'])) {
  	# database connection file
  	include 'app/db.conn.php';
    ?>  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<br><br><br><br>

<div class="container">
<div class="row gutters-sm">
<div class="col-md-4 d-none d-md-block">
<div class="card">
<div class="card-body">
<nav class="nav flex-column nav-pills nav-gap-y-1">
<a href="#account" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded active">
<svg style="color: #18d26e;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings mr-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>Account Settings
</a><hr>
<a href="#security" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
<svg style="color: #18d26e;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield mr-2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>Security
</a><hr>
<a href="#notification" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
<svg style="color: #18d26e;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell mr-2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>Notification
</a><hr>
<a href="#billing" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
<svg style="color: #18d26e;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card mr-2"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg>Billing
</a><hr>
<a href="#" id="signOutBtn" data-toggle="tab" class="nav-item nav-link has-icon nav-link-faded">
Sign out
</a>
</nav>
</div>
</div>
</div>
<div class="col-md-8">
<div class="card">
<div class="card-header border-bottom mb-3 d-flex d-md-none">
<ul class="nav nav-tabs card-header-tabs nav-gap-x-1" role="tablist">

<li class="nav-item">
<a href="#account" data-toggle="tab" class="nav-link has-icon active"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>
</li>
<li class="nav-item">
<a href="#security" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shield"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></a>
</li>
<li class="nav-item">
<a href="#notification" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></a>
</li>
<li class="nav-item">
<a href="#billing" data-toggle="tab" class="nav-link has-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
</li>
</ul>
</div>
<div class="card-body tab-content">

<div class="tab-pane active" id="account">

<div class="container">
<h2>My Account</h2>

<form>
<!-- First Name Section -->
<div class="form-group">
    <label for="firstName">First Name</label>
    <input type="text" class="form-control" id="firstName" value="Jin">
    <div class="success-message" id="nameSuccess"></div>
    <button type="button" class="btn  btn-pink" onclick="showSuccessMessage('name')">Save</button>
    <button type="button" class="btn btn-secondary">Cancel</button>
</div>

<!-- Email Section -->
<div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" id="email" value="jinn8122@gmail.com">
    <div class="success-message" id="emailSuccess"></div>
    <button type="button" class="btn  btn-pink" onclick="showSuccessMessage('email')">Save</button>
    <button type="button" class="btn btn-secondary">Cancel</button>
</div>

<!-- Birthday Section -->
<div class="form-group">
    <label for="birthday">Birthday</label>
    <input type="date" class="form-control" id="birthday" value="2000-12-12">
    <div class="success-message" id="dateSuccess"></div>
    <button type="button" class="btn  btn-pink" onclick="showSuccessMessage('date')">Save</button>
    <button type="button" class="btn btn-secondary">Cancel</button>
</div>

<!-- Location Section -->
<!-- Location Section -->
<div class="form-group">
<label for="location">Location</label>
<select class="form-control" id="location">
    <option value="Burma">Burma</option>
    <option value="United States">United States</option>
    <option value="United Kingdom">United Kingdom</option>
    <!-- Add more options as needed -->
</select>
<div class="success-message" id="locationSuccess"></div>
<button type="button" class="btn btn-pink" onclick="showSuccessMessage('location')">Save</button>
<button type="button" class="btn btn-secondary">Cancel</button>
</div>

<p><a href="#">Need a break? Go here to disable or delete your account.</a></p>
</form>

<script>
function showSuccessMessage(fieldId) {
    var successMessageElement = document.getElementById(fieldId + 'Success');
    successMessageElement.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16" height="16" fill="rgba(100,205,138,1)"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg> Save successfully';
}
</script>

</div>

</div>
<div class="tab-pane" id="security">
<h6>SECURITY SETTINGS</h6>
<hr>

<!-- Change Password Form -->
<form id="changePasswordForm">
    <div class="form-group">
        <label class="d-block">Change Password</label>
        <input type="password" class="form-control" placeholder="Enter your old password" name="oldPassword">
        <input type="password" class="form-control mt-1" placeholder="New password" name="newPassword">
        <input type="password" class="form-control mt-1" placeholder="Confirm new password" name="confirmPassword">
    </div>
    <button type="button" class="btn btn-pink" onclick="changePassword()">Change Password</button>
</form>

<hr>

<!-- Sessions List -->
<form id="sessionsForm">
    <div class="form-group mb-0">
        <label class="d-block">Sessions</label>
        <p class="font-size-sm text-secondary">This is a list of devices that have logged into your account. Revoke any sessions that you do not recognize.</p>
        <ul class="list-group list-group-sm" id="sessionsList">
            <!-- Session entries will be dynamically added here -->
        </ul>
    </div>
</form>
</div>

<script>
// You can place your JavaScript functions here

function changePassword() {
    // Implement logic to send data to the server using AJAX and handle the response
    // Example using jQuery AJAX
    $.post('change_password.php', $('#changePasswordForm').serialize(), function(response) {
        // Handle the response here
        console.log(response);
    });
}

function enableTwoFactorAuth() {
    // Implement logic to send data to the server using AJAX and handle the response
    // Example using jQuery AJAX
    $.post('enable_two_factor_auth.php', $('#twoFactorAuthForm').serialize(), function(response) {
        // Handle the response here
        console.log(response);
    });
}

function loadSessions() {
    // Implement logic to fetch sessions from the server using AJAX and update the sessions list
    // Example using jQuery AJAX
    $.get('get_sessions.php', function(response) {
        // Handle the response here and update the sessions list
        $('#sessionsList').html(response);
    });
}

// Load sessions when the page is ready
$(document).ready(function() {
    loadSessions();
});
</script>


<div class="tab-pane" id="notification">
<h6>NOTIFICATION SETTINGS</h6>
<hr>
<form>
<div class="form-group">
<label class="d-block mb-0">Security Alerts</label>
<div class="small text-muted mb-3">Receive security alert notifications via email</div>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="customCheck1" checked>
<label class="custom-control-label" for="customCheck1">Email each time a vulnerability is found</label>
</div>
<div class="custom-control custom-checkbox">
<input type="checkbox" class="custom-control-input" id="customCheck2" checked>
<label class="custom-control-label" for="customCheck2">Email a digest summary of vulnerability</label>
</div>
</div>
<div class="form-group mb-0">
<label class="d-block">SMS Notifications</label>
<ul class="list-group list-group-sm">
<li class="list-group-item has-icon">
Comments
<div class="custom-control custom-control-nolabel custom-switch ml-auto">
<input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
<label class="custom-control-label" for="customSwitch1"></label>
</div>
</li>
<li class="list-group-item has-icon">
Updates From People
<div class="custom-control custom-control-nolabel custom-switch ml-auto">
<input type="checkbox" class="custom-control-input" id="customSwitch2">
<label class="custom-control-label" for="customSwitch2"></label>
</div>
</li>
<li class="list-group-item has-icon">
Reminders
<div class="custom-control custom-control-nolabel custom-switch ml-auto">
<input type="checkbox" class="custom-control-input" id="customSwitch3" checked>
<label class="custom-control-label" for="customSwitch3"></label>
</div>
</li>
<li class="list-group-item has-icon">
Events
<div class="custom-control custom-control-nolabel custom-switch ml-auto">
<input type="checkbox" class="custom-control-input" id="customSwitch4" checked>
<label class="custom-control-label" for="customSwitch4"></label>
</div>
</li>
<li class="list-group-item has-icon">
Pages You Follow
<div class="custom-control custom-control-nolabel custom-switch ml-auto">
<input type="checkbox" class="custom-control-input" id="customSwitch5">
<label class="custom-control-label" for="customSwitch5"></label>
</div>
</li>
</ul>
</div>
</form>
</div>
<div class="tab-pane" id="billing">
<h6>BILLING SETTINGS</h6>
<hr>
<form>
<div class="form-group">
<label class="d-block mb-0">Payment Method</label>
<div class="small text-muted mb-3">You have not added a payment method</div>
<button class="btn btn-pink" type="button">Add Payment Method</button>
</div>
<div class="form-group mb-0">
<label class="d-block">Payment History</label>
<div class="border border-gray-500 bg-gray-200 p-3 text-center font-size-sm">You have not made any payment.</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- sign out Confirmation Modal -->
<div class="modal" id="confirmationModal" tabindex="-1" role="dialog">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Confirmation</h5>
            <button type="button" id="modalCloseBtn" class="btn-close btn-pink" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to sign out?</p>
        </div>
        <div class="modal-footer">
            <button type="button" id="cancelSignOutBtn" class="btn btn-pink" data-bs-dismiss="modal">Cancel</button>
            <button type="button" id="confirmSignOutBtn" class="btn btn-secondary">Sign Out</button>
        </div>
    </div>
</div>
</div>


<!-- Modal for Success Message -->
<div class="modal" tabindex="-1" role="dialog" id="successModal">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Success!</h5>
            <button type="button" class="close " data-dismiss="modal" aria-label="Close" style="color:#ff69b4">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            Password changed successfully!
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-pink" onclick="redirectToSettings()">OK</button>
        </div>
    </div>
</div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    var signOutBtn = document.getElementById("signOutBtn");
    var confirmationModal = new bootstrap.Modal(document.getElementById('confirmationModal'));

    signOutBtn.addEventListener("click", function (event) {
        event.preventDefault();

        // Open the confirmation modal
        confirmationModal.show();
    });

    var confirmSignOutBtn = document.getElementById("confirmSignOutBtn");
    var cancelSignOutBtn = document.getElementById("cancelSignOutBtn");
    var modalCloseBtn = document.getElementById("modalCloseBtn");

    confirmSignOutBtn.addEventListener("click", function () {
        // Call your sign-out function (clear authentication tokens, etc.)
        // For example, redirect to login.php after sign-out
        window.location.href = 'login.php';
    });

    cancelSignOutBtn.addEventListener("click", function () {
        // Close the confirmation modal
        confirmationModal.hide();
    });

    // Handle modal close event (clicking the close button)
    modalCloseBtn.addEventListener('click', function () {
        // You can add additional logic here if needed
        confirmationModal.hide();
    });
});

//script for change password 
function changePassword() {
// Simulate a successful response for testing
var response = { success: true };

// Check the actual response from your server
// if (response.success) {
$('#successModal').modal('show');
// }
}

function redirectToSettings() {
// Redirect to the settings.php page
window.location.href = 'setting.php';
}

</script>



</body>
</html>
<?php
    }else{
      header("Location: signin.php");
      exit;
    }
  ?>
 