<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;







if (isset($_POST['approve_user'])) {
    $fullname = $fname . " " . $lname;
    $id = mysqli_real_escape_string($conn, $_POST['applicantIdToApprove']);
    $emailStatus = getEmailStatus($id);

    $status = getStatusText($emailStatus);
    echo "Email Status: " . $emailStatus;

    if ($emailStatus == 0) {
        echo '<script>
            alert("Cannot approve the application because the email is still pending for verification.");
            window.location.href = "adminManageApplications.php";
        </script>';
    } elseif ($emailStatus == 1) {
        if ($status != "Account Accepted") {
            // Check if the status is not already "Account Accepted"
            $status = 2;
            $updateQuery = $conn->prepare("UPDATE account_profiles SET status = ? WHERE id = ?");
            $updateQuery->bind_param("ii", $status, $id);

            if ($updateQuery->execute()) {
                // echo '<script>
                //     alert("User ' . ucfirst($fname) . ' ' . ucfirst($lname) . ' has been approved.");
                //     window.location.href = "adminManageApplications.php";
                // </script>';
                // ======================= SEND EMAIL WHEN THE ACCOUNT IS APPROVED====================
                $mail = new PHPMailer;
                $mail->isHTML(true);
                $mail->isSMTP();
                $mail->SMTPDebug = 2; // Enable verbose debugging
                $mail->Debugoutput = 'html'; // Display debugging output in HTML format
                $mail->SMTPKeepAlive = true;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = 'yeojsoriano721@gmail.com'; // Replace with your email
                $mail->Password = 'vweswchyhxelzyhz'; // Replace with your email password
                $mail->SMTPSecure = 'tls';
                $mail->setFrom('CAPEDAInc@gmail.com', 'CAPEDA'); // Replace with your info
                $mail->addAddress($email, $fullname);
                $mail->Subject = 'Account Approval Notification';
                $mail->Body = "
  <!DOCTYPE html>
  <html lang='en'>
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>CAPEDA | Registration</title>
  </head>
  <body>
      <div style='font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2'>
    <div style='margin:50px auto;width:70%;padding:20px 0'>
      <div style='border-bottom:1px solid #eee'>
        <a href='' style='font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>Account Approval Notification</a>
      </div>
      <p style='font-size:1.1em'>Hello, Thank you for waiting for our response.</p>
      <p> We are glad to tell you That you are elligible to become a member of CAPEDA. 
     <p>You can now log in to the system and upload the required documents. Please make sure to read the instructions before uploading your documents.  </p>

      
        </p>

      <p style='font-size:0.9em;'>Regards,<br />CAPEDA Org.</p>
      <hr style='border:none;border-top:1px solid #eee' />
      <div style='float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300'>
        <p>Camella II Pedicab Association</p>
        <pSample Address</p>
        <p> Sample Address,</p>
        <p>Bacoor city, Cavite Philippines</p>
        <p> +63 908 8125221 / +63915 7016270</p>
      </div>
    </div>
  </div>
  </body>
  </html>
";


                if ($mail->send()) { // If the email is sent successfully
                    $_SESSION['status'] = "Email sent to applicant";
                    $_SESSION['status_code'] = "success";

                    exit();
                } else {
                    $_SESSION['status'] = "Failed to resend OTP: " . $mail->ErrorInfo;
                    $_SESSION['status_code'] = "error";
                    exit();
                }
            } else {
                echo '<script>
                    alert("User not approved");
                    window.location.href = "userAccounts.php";
                </script>';
            }
        } else {
            // Handle the case where the application is already approved
            //for some reason ndi to gumagana hahahaha 
            echo '<script>
                alert("User ' . ucfirst($fname) . ' ' . ucfirst($lname) . ' is already approved.");
                window.location.href = "adminManageApplications.php";
            </script>';
        }
    }
}




if (isset($_POST['deny_user'])) {
    $fullname = $fname . " " . $lname;
    $id = mysqli_real_escape_string($conn, $_POST['applicantIdToApprove']);
    $denialReasons = mysqli_real_escape_string($conn, $_POST['denial_reasons']); // Get denial reasons from the form
    $emailStatus = getEmailStatus($id);

    $status = getStatusText($emailStatus);
    echo "Email Status: " . $emailStatus;

    if ($emailStatus == 0) {
        echo '<script>
            alert("Cannot approve the application because the email is still pending for verification.");
            window.location.href = "adminManageApplications.php";
        </script>';
    } elseif ($emailStatus == 1) {
        if ($status != "Account Accepted") {
            // Check if the status is not already "Account Accepted"

            $status = 4;
            $updateQuery = $conn->prepare("UPDATE account_profiles SET status = ?, denial_reason = ? WHERE id = ?");
            $updateQuery->bind_param("isi", $status, $denialReasons, $id);

            if ($updateQuery->execute()) {
                // echo '<script>
                //     alert("User ' . ucfirst($fname) . ' ' . ucfirst($lname) . ' has been approved.");
                //     window.location.href = "adminManageApplications.php";
                // </script>';
                // ======================= SEND EMAIL WHEN THE ACCOUNT IS APPROVED====================
                $mail = new PHPMailer;
                $mail->isHTML(true);
                $mail->isSMTP();
                $mail->SMTPDebug = 2; // Enable verbose debugging
                $mail->Debugoutput = 'html'; // Display debugging output in HTML format
                $mail->SMTPKeepAlive = true;
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = 587;
                $mail->SMTPAuth = true;
                $mail->Username = 'yeojsoriano721@gmail.com'; // Replace with your email
                $mail->Password = 'vweswchyhxelzyhz'; // Replace with your email password
                $mail->SMTPSecure = 'tls';
                $mail->setFrom('CAPEDAInc@gmail.com', 'CAPEDA'); // Replace with your info
                $mail->addAddress($email, $fullname);
                $mail->Subject = 'Application Status Notification';
                $mail->Body = "
  <!DOCTYPE html>
  <html lang='en'>
  <head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>CAPEDA | Registration</title>
  </head>
  <body>
      <div style='font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2'>
    <div style='margin:50px auto;width:70%;padding:20px 0'>
      <div style='border-bottom:1px solid #eee'>
        <a href='' style='font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>Application Status Update</a>
      </div>
      <p style='font-size:1.1em'>Hello, Thank you for your interest on joining CAPEDA. </p>
      <p> This is an update to your application request, Unfortunately you did not pass the criteria to apply for membership for the following reason:
        <p> $denialReasons </p>

      <p> If you have more questions feel free to reply in this email. Thank you.
        </p>
   
      <p style='font-size:0.9em;'>Regards,<br />CAPEDA Org.</p>
      <hr style='border:none;border-top:1px solid #eee' />
      <div style='float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300'>
        <p>Camella II Pedicab Association</p>
        <pSample Address</p>
        <p> Sample Address,</p>
        <p>Bacoor city, Cavite Philippines</p>
        <p> +63 908 8125221 / +63915 7016270</p>
      </div>
    </div>
  </div>
  </body>
  </html>
";
                if ($mail->send()) { // If the email is sent successfully
                    $_SESSION['status'] = "Email sent to applicant";
                    $_SESSION['status_code'] = "success";

                    exit();
                } else {
                    $_SESSION['status'] = "Failed to resend OTP: " . $mail->ErrorInfo;
                    $_SESSION['status_code'] = "error";
                    exit();
                }
            } else {
                echo '<script>
                    alert("User not approved");
                    window.location.href = "userAccounts.php";
                </script>';
            }
        } else {
            // Handle the case where the application is already approved
            //for some reason ndi to gumagana hahahaha 
            echo '<script>
                alert("User ' . ucfirst($fname) . ' ' . ucfirst($lname) . ' is already approved.");
                window.location.href = "adminManageApplications.php";
            </script>';
        }
    }
}


?>

<!-- for approval or denial of applicants profile -->
<div class="modal-overlay" id="<?php echo 'approveOrDenyApplicantModal' . $id; ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Approve  " . ucfirst($fname) . " " . ucfirst($lname) . " Profile" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'approveOrDenyApplicantModal' . $id; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modal-content">
                <form method="POST">
                    <!-- i passed the id in my input field and hid it so that i can just select a profile based on id and delete -->
                    <input type="hidden" name="applicantIdToApprove" value="<?php echo $id; ?>" />
                    <h3 class="deleteMessage" id="deleteModalMessage">Do you want to <?php echo  "approve  " . ucfirst($fname) . " " . ucfirst($lname) . " profile creation request?" ?></h3>

                    <div class="form-group text-center">
                        <?php
                        if ($status !== "Account Accepted" && $status !== "Application Denied") {
                            // Check if the status is not "Account Accepted" or "Application Denied"
                            echo '<button type="submit" name="approve_user" class="btn btn-success">Approve</button>';
                            echo '<button type="submit" name="deny_user" class="btn btn-danger">Deny</button>';
                        } else {
                            // Application is already approved or denied, so disable both buttons
                            echo '<button type="button" class="btn btn-secondary" disabled>Approved</button>';
                            echo '<button type="button" class="btn btn-secondary" disabled>Denied</button>';
                        }
                        ?>
                    </div>

                    <div class="form-group denial-reasons">
                        <label for="denial_reasons">Reasons for Denial:</label>
                        <textarea name="denial_reasons" id="denial_reasons" rows="4" class="form-control" required></textarea>
                    </div>
                </form>
            </div>


            <!-- <div class="modal-footer">
                        <button type="submit" class="modalBtn" id="deleteModalBtn" name="deleteApplicant">Yes</button>
                        <button type="button" class="modalBtn cancel-button" data-modal-id="<?php echo 'approveOrDenyApplicantModal' . $id; ?>" id="closeDeleteModalButton">Cancel</button>
                    </div> -->
            </form>
        </div>
    </div>
</div>
</div>
<script>
    $(document).ready(function() {
        $('button[name="approve_user"]').click(function() {
            // Disable the textarea when "Approve" button is clicked
            $('#denial_reasons').prop('disabled', true);
        });

        $('button[name="deny_user"]').click(function() {
            // Enable the textarea when "Deny" button is clicked
            $('#denial_reasons').prop('disabled', false);
        });
    });
</script>

<script>
    $(document).ready(function() {
        // Function to check if the textarea has content
        function isDenialReasonsNotEmpty() {
            return $.trim($('#denial_reasons').val()) !== '';
        }

        $('button[name="approve_user"]').click(function() {
            if (isDenialReasonsNotEmpty()) {
                // If denial reasons are not empty, prevent approving
                alert("Please clear the 'Reasons for Denial' textarea before approving.");
                return false; // Prevent the form submission
            }
            // Continue with approval
        });

        $('button[name="deny_user"]').click(function() {
            // Enable the textarea when "Deny" button is clicked
            $('#denial_reasons').prop('disabled', false);
        });

        // Check if the textarea content has changed and disable the Approve button
        $('#denial_reasons').on('input', function() {
            var $approveButton = $('button[name="approve_user"]');
            var denialReasonsNotEmpty = isDenialReasonsNotEmpty();
            $approveButton.prop('disabled', denialReasonsNotEmpty);

            // Add or remove the "disabled-button" class based on the content
            if (denialReasonsNotEmpty) {
                $approveButton.addClass('disabled-button');
            } else {
                $approveButton.removeClass('disabled-button');
            }
        });
    });
</script>