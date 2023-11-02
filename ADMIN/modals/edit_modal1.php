<?php
// this functions sets the description of the status values
//if pending verification admin should not be able to approve or deny, if email verified admin can, if approved buttons should be hidden if denied hidden or disabled





?>


<!-- for handling the application -->
<div class="modal-overlay" id="<?php echo 'user' . $id; ?>">
    <div class="modal-container modal-form-size modal-l">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "View " . ucfirst($fname) . " " . ucfirst($lname) . " Account" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'user' . $id; ?>">
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
                        <input type="text" name="applicant_id" id="applicant_id" value="<?php echo "$id"; ?>" class=" form-control" readonly>
                    </div>
                    <hr>
                    <h3 class="modalHeader">PERSONAL INFORMATION:</h3>
                    <hr>
                    <div class="form-group">
                        <label class="label" for="">First Name</label>
                        <input type="text" class="form-control" name="firstName" id="firstName" value="<?php echo ucfirst($fname); ?>">
                        <span class="validation-message"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Last Name</label>
                        <input type="text" class="form-control" name="lastName" id="lastName" value="<?php echo ucfirst($lname); ?>" required>
                        <span class="error-message hidden"></span>
                    </div>
                    <div class="form-group">
                        <label class="label" for="">Mobile Number</label>
                        <div class="input-container">
                            <input type="tel" class="form-control" name="cpNum" id="cpNum" value="<?php echo ($cpNumber); ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="label" for="dob">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" id="dob" value="<?php echo ($birthday); ?>" required>
                        <span id="dobError" class="error-message hidden">Please enter a valid birth date.</span>
                    </div>

                    <div class="form-group">
                        <label class="label" for="age">Age</label>
                        <input type="text" class="form-control" name="age" id="age" value="<?php echo ($age); ?>" readonly>
                        <span id="ageError" class="error-message hidden">Applicants under 18 years old cannot apply.</span>
                    </div>

                    <div class="form-group">
                        <label class="label" for="">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo ($address); ?>" required>
                    </div>
                    <hr>
                    <h3 class="modalHeader">ACCOUNT INFORMATION:</h3>
                    <hr>
                    <div class="form-group">
                        <label class="label" for="">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="<?php echo ($email); ?>" required>
                    </div>


                    <div class="form-group">
                        <label class="label" for="">Status:</label>
                        <div style="display: flex; align-items: center;">
                            <input type="text" class="form-control" name="status" id="status" value="<?php echo ($status); ?>" disabled>

                            <?php
                            if ($status === "Pending Verification") {
                                echo '<button type="button" class="btnModal modal-trigger verify-email-button" data-modal-id="verifyEmail' . $id . '" 
                data-email="' . $email . '" data-fullname="' . $fname . ' ' . $lname . '">Verify Email</button>';
                            }
                            ?>

                            <?php
                            include "modals/email_verification_modal/adminVerifyEmail_modal.php";
                            ?>
                        </div>
                    </div>
                    <div class=" form-group">
                        <label class="label" for="">Temporary Password</label>
                        <div class="password-input-container">
                            <input type="text" class="form-control" id="passwordInputEdit" name="password" value="<?php echo ($password); ?>" required>
                            <span id="togglePasswordEdit" class="toggle-password" onclick="togglePasswordVisibilityEdit()">
                                <ion-icon name="eye"></ion-icon>
                            </span>
                        </div>
                        <button type="button" class="generate-password-button" id="generateEditPasswordButton">Generate Password</button>

                    </div>

            </div>

            <br />
            <div class="modal-footer">
                <button type="submit" name="update_user" class="btn btn-warning text-dark" onsubmit="return validate()">
                    Update
                </button>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
// if (isset($_POST['update_user'])) {
//     $id = mysqli_real_escape_string($conn, $_POST['user_id']);
//     $acc_status = mysqli_real_escape_string($conn, $_POST['acc_status']);

//     // Update user account status using prepared statement
//     $insertQuery = $connection->prepare("UPDATE account_profiles SET account_validation = ? WHERE user_id = ?");
//     $insertQuery->bind_param("si", $acc_status, $id);
//     if ($insertQuery->execute()) {
//         echo
//         '<script>
//                     alert("' . ucfirst($fname) . ' ' . ucfirst($lname) . ' account is ' . $acc_status . '");
//                     window.location.href = "userAccounts.php";
//                 </script>';
//     } else {
//         echo $insertQuery->error;
//     }
// }
?>