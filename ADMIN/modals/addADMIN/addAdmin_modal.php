<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

function sanitize($conn, $data)
{
    $sanitizedData = mysqli_real_escape_string($conn, $data);
    return $sanitizedData;
}

if (isset($_POST['add_admin'])) {
    // Retrieve form data
    $countryCode = '+63';
    $firstName = sanitize($conn, $_POST["firstName"]);
    $lastName = sanitize($conn, $_POST["lastName"]);
    $birthday = sanitize($conn, $_POST["dob"]);
    $age = sanitize($conn, $_POST["age"]);
    $cpNum = sanitize($conn, $countryCode . $_POST["cpNum"]);
    $address = sanitize($conn, $_POST["address"]);
    $email = sanitize($conn, $_POST["email"]);
    $password = sanitize($conn, $_POST["password"]);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Perform validation if needed

    $query = "INSERT INTO tbl_admin (fname, lname, admin_cpNumber, admin_birthday, admin_age, admin_address, email, password) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ssssisss", $firstName, $lastName, $cpNum, $birthday, $age, $address, $email, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['status'] = "Admin Added.";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Error: " . mysqli_stmt_error($stmt);
        $_SESSION['status_code'] = "error";
    }

    mysqli_stmt_close($stmt);
}
?>




<!-- Create the modal container -->
<div class="modal-overlay" id="<?php echo 'addAdminModal'  ?>">
    <div class="modal-container modal-form-size modal-l">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Add New Admin" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'addAdminModal'  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="post">

                    <!-- <div class="form-group">
                        <label class="label" for="">ID:</label>
                        <input type="text" name="admin_id" id="applicant_id" class="form-control" readonly value="<?php //echo getLatestApplicantId(); 
                                                                                                                    ?>">
                    </div> -->
                    <hr>
                    <h3 class="modalHeader">PERSONAL INFORMATION:</h3>
                    <hr>
                    <div class="form-group">
                        <label class="label" for="">First Name</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter First Name ">
                        <span class="validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter Last Name" required>
                        <span class="error-message hidden"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Mobile Number</label>
                        <div class="input-container">
                            <span class="country-code" name="countryCode">+63</span>
                            <input type="tel" class="form-control" name="cpNum" id="cpNum" placeholder="9XXXXXXXXX" required oninput="validatePhoneNumber()" />
                        </div>
                    </div>
                    <div id="cpNumError" class="error-message"></div>



                    <div class="form-group">
                        <label class="label" for="dob">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" id="dob" oninput="validateBirthDate()" required>
                        <span id="dobError" class="error-message hidden">Please enter a valid birth date.</span>
                    </div>

                    <div class="form-group">
                        <label class="label" for="age">Age</label>
                        <input type="text" class="form-control" name="age" id="age" readonly>
                        <span id="ageError" class="error-message hidden">Applicants under 18 years old cannot apply.</span>
                    </div>


                    <div class="form-group">
                        <label class="label" for="">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required>
                    </div>
                    <hr>
                    <h3 class="modalHeader">ACCOUNT INFORMATION:</h3>
                    <hr>
                    <div class="form-group">
                        <label class="label" for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                    </div>

                    <div class=" form-group">
                        <label class="label" for="">Temporary Password</label>
                        <div class="password-input-container">
                            <input type="text" class="form-control" id="passwordInputEdit" name="password" placeholder="Generate random password" required>
                            <span id="togglePasswordEdit" class="toggle-password" onclick="togglePasswordVisibilityEdit()">
                                <ion-icon name="eye"></ion-icon>
                            </span>
                        </div>
                        <button type="button" class="generate-password-button" id="generatePasswordButton" onclick="generateRandomPassword()">Generate Password</button>

                    </div>
            </div>
            <br />
            <div class="modal-footer">
                <button type="submit" name="add_admin" class="btn" onclick="validate()">Submit</button>

            </div>
            </form>
        </div>

    </div>
</div>

<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>