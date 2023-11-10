<hr>
<h3 class="profile-header">PERSONAL INFORMATION:</h3>
<hr>

<div class="profile-info-container">
    <div class="profile-picture">
        <label for="profileImage" class="profile-image-label">
            <img src="../images/default.png" alt="Profile" id="userIcon">
            <span>Change Picture</span>
        </label>
        <input type="file" id="profileImage" name="profileImage" accept="image/*" style="display: none;" onchange="previewImage(this)">
    </div>
    <div class="card">
        <div class="form-group">
            <label class="label" for="memberID">Member ID:</label>
            <input type="text" class="form-control" name="memberID" id="memberID" placeholder="Enter Member ID">
            <span class="validation-message"></span>
        </div>
    </div>
    <div class="card">
        <div class="form-group">
            <label class="label" for="membershipStatus">Membership Status:</label>
            <input type="text" class="form-control" name="membershipStatus" id="membershipStatus" placeholder="Enter Membership Status">
            <span class="validation-message"></span>
        </div>
    </div>
    <div class="card">
        <div class="form-group">
            <label class="label" for="pedicabNumber">PEDICAB #:</label>
            <input type="text" class="form-control" name="pedicabNumber" id="pedicabNumber" placeholder="Enter PEDICAB #">
            <span class="validation-message"></span>
        </div>
    </div>
</div>

<div class="member-info">
    <div class="form-group">
        <label class="label" for="fullName">Full Name</label>
        <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Enter Full Name">
        <span class="validation-message"></span>
    </div>
    <div class="form-group">
        <label class="label" for="birthday">Birthday</label>
        <input type="text" class="form-control" name="birthday" id="birthday" placeholder="Enter Birthday">
        <span class="validation-message"></span>
    </div>
    <div class="form-group">
        <label class="label" for="age">Age</label>
        <input type="text" class="form-control" name="age" id="age" placeholder="Enter Age">
        <span class="validation-message"></span>
    </div>

    <div class="form-group">
        <label class="label" for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address">
        <span class="validation-message"></span>
    </div>
    <div class="form-group">
        <label class="label" for="email">Email Address</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email Address">
        <span class="validation-message"></span>
    </div>
    <div class="form-group">
        <label class="label" for="mobileNumber">Mobile Number</label>
        <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="Enter Mobile Number">
        <span class="validation-message"></span>
    </div>

    <!-- Add other member info fields here -->
</div>