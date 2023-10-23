<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function getLatestApplicantId()  //gets the latest auto incremented id
{
    require "../database/config.php"; // Include your database connection code
    $sql = "SELECT MAX(id) AS max_id FROM account_profiles";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $latestId = $row['max_id'] + 1; // Increment the latest ID by 1 for the new applicant
        return $latestId;
    } else {
        return 1; // Default to 1 if there are no existing applicants
    }
}
function sanitize($conn, $data)
{
    $sanitizedData = mysqli_real_escape_string($conn, $data);
    return $sanitizedData;
}


function generateRandomPassword($length = 8)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}




if (isset($_POST['add_applicant'])) {
    // $generatedPassword = generateRandomPassword(8);
    // $firstName = $_POST['firstName'];
    // $lastName = $_POST['lastName'];
    // $cpNum = $_POST['cpNum'];
    // $address = $_POST['address'];
    // $email = $_POST['email'];
    // $password = $_POST['password']; // Use the generated password
    // // We will email this code to the applicant the 1st time they log in
    // $otp = rand(100000, 999999);
    // $otp_expiration = date('Y-m-d H:i:s', strtotime('+5 minutes'));
    // $verificationStatus = getStatusText(0);  //status 0 = email not verified


    $fullname = sanitize($conn, $_POST["firstName"] . $_POST["lastName"]);
    $firstName = sanitize($conn, $_POST["firstName"]);
    $lastName = sanitize($conn, $_POST["lastName"]);
    $cpNum = sanitize($conn, $_POST["cpNum"]);
    $address = sanitize($conn, $_POST["address"]);
    $email = sanitize($conn, $_POST["email"]);
    $password = sanitize($conn, $_POST["password"]);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $otp = rand(100000, 999999);
    $otp_expiration = date('Y-m-d H:i:s', strtotime('+30 minutes'));
    $verificationStatus = getStatusText(0);  //status 0 = email not verified

    // Perform database insertion
    $query = "INSERT INTO account_profiles (firstName, lastName, cpNumber, address, email, password, otp, otp_exp, status) 
              VALUES ('$firstName', '$lastName', '$cpNum', '$address', '$email',  '$hashedPassword', $otp, '$otp_expiration', '$verificationStatus')";

    if (mysqli_query($conn, $query)) {
        // Data inserted successfully
        $_SESSION['status'] = "New applicant profile added.";
        $_SESSION['status_code'] = "success";

        // Send the OTP email
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 2;  // Set this to 2 for detailed debugging
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'yeojsoriano721@gmail.com'; // Replace with your email
        $mail->Password = 'vweswchyhxelzyhz'; // Replace with your email password
        $mail->SMTPSecure = 'tls';
        $mail->setFrom('CAPEDAInc@gmail.com', 'CAPEDA');
        $mail->addAddress($email, $firstName . ' ' . $lastName);
        $mail->Subject = 'Email OTP Verification';
        $mail->Body = "Your OTP for registration is: $otp. This OTP is valid for 5 minutes. Please use this code to verify your email.";

        if ($mail->send()) {
            echo "Email sent successfully";
        } else {
            echo "Email sending failed. Error: " . $mail->ErrorInfo;
        }

        // Redirect to a success page or perform other actions as needed
        // header("Location: your-success-page.php");
        // exit();
    } else {
        // Error occurred
        echo "Error: " . mysqli_error($conn);
    }
}



?>


<!-- Create the modal container -->
<div class="modal-overlay" id="<?php echo 'addApplicantModal'  ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Add New Applicant" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'addApplicantModal'  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="post">
                    <div class="form-group">
                        <label class="label" for="">ID:</label>
                        <input type="text" name="applicant_id" id="applicant_id" class="form-control" readonly value="<?php echo getLatestApplicantId(); ?>">
                    </div>
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
                        <label class="label" for="">Contact Number</label>
                        <div class="phone-input">
                            <input type="text" class="form-control" name="cpNum" id="cpNum" placeholder="Enter cellphone number" required>
                        </div>
                        <div id="phoneNumberError" class="error-message hidden">Avoid entering numeric characters.</div>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Enter address" required>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                    </div>
                    <!-- <div class="form-group">
                        <label class="label" for="">Status</label>
                        <input type="text" class="form-control" name="status" id="status" value="required>
                    </div> -->
                    <!-- Add this inside your edit modal's form -->
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
                <button type="submit" name="add_applicant" class="btn" onsubmit="return validate()">
                    Submit
                </button>
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