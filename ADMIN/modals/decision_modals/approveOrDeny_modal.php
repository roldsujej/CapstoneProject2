<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;







if (isset($_POST['approve_user'])) {
	$applicantIdToApprove = $_POST['applicantIdToApprove'];
    $emailStatus = getEmailStatus($applicantIdToApprove);
    $textStatus = getStatusText($emailStatus);

    if ($emailStatus == 0) {
        echo '<script>
            alert("Cannot approve the application because the email is still pending for verification.");
            window.location.href = "adminManageApplications.php";
        </script>';
    } elseif ($emailStatus == 1) {
        if ($textStatus != "Account Accepted") {
            // Check if the status is not already "Account Accepted"
			$status = 2;
            $updateQuery = $conn->prepare("UPDATE account_profiles SET status = ? WHERE id = ?");
            $updateQuery->bind_param("ii", $status, $applicantIdToApprove);

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
                $mail->Body = "Hello, Good day. I am glad to tell you that you're account creation was approved. 
                You can now login to upload your required documents. 
                Please make sure to read instructions before submitting your documents. Thank you";


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
	$applicantIdToApprove = $_POST['applicantIdToApprove'];
    $emailStatus = getEmailStatus($applicantIdToApprove);
    $textStatus = getStatusText($emailStatus);

    if ($emailStatus == 0) {
        echo '<script>
            alert("Cannot deny the application because the email is still pending for verification.");
            window.location.href = "adminManageApplications.php";
        </script>';
    } elseif ($emailStatus == 1) {
        if ($textStatus != "Application Denied") {
            // Check if the status is not already "Application Denied"
			$status = -1;
            $updateQuery = $conn->prepare("UPDATE account_profiles SET status = ? WHERE id = ?");
            $updateQuery->bind_param("ii", $status, $applicantIdToApprove);

            if ($updateQuery->execute()) {
                echo '<script>
                    alert("User ' . ucfirst($fname) . ' ' . ucfirst($lname) . ' has been denied.");
                    window.location.href = "adminManageApplications.php";
                </script>';
            } else {
                echo '<script>
                    alert("User not approved");
                    window.location.href = "userAccounts.php";
                </script>';
            }
        } else {
            // Handle the case where the application is already approved
            echo '<script>
                alert("User ' . ucfirst($fname) . ' ' . ucfirst($lname) . ' is already denied.");
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


                    <!-- <div class="modal-footer">
                        <button type="submit" class="modalBtn" id="deleteModalBtn" name="deleteApplicant">Yes</button>
                        <button type="button" class="modalBtn cancel-button" data-modal-id="<?php echo 'approveOrDenyApplicantModal' . $id; ?>" id="closeDeleteModalButton">Cancel</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>