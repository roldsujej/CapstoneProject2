<?php
require "../database/config.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['verify'])) {
    // Get the entered OTP
    $enteredOTP = $_POST['otp1'] . $_POST['otp2'] . $_POST['otp3'] . $_POST['otp4'] . $_POST['otp5'] . $_POST['otp6'];

    // Fetch the stored OTP from the database
    $email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT id, otp FROM account_profiles WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows != 1) {
        // Handle the case where the email is not found in the database
        $_SESSION['status'] = "Failed to verify email: Email not found.";
        $_SESSION['status_code'] = "error";
        header("Location: verification.php");
        exit();
    } else {
        $row = $result->fetch_assoc();
        $storedOTP = $row['otp'];
        $id = $row['id'];
        // Compare the entered OTP with the stored OTP
        if ($enteredOTP === $storedOTP) {
            // Update the status to 1
            $updateQuery = "UPDATE account_profiles SET status = 1, user_role = 0 WHERE email = ?";
            $updateStmt = $conn->prepare($updateQuery);
            $updateStmt->bind_param("s", $email);

            if ($updateStmt->execute()) {
                // Send the email notification
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
                $mail->Subject = 'Email Verification';
                $mail->Body = "Email verified";

                if ($mail->send()) {
                    echo "Email sent successfully";
                } else {
                    echo "Email error: " . $mail->ErrorInfo;
                }
            } else {
                $_SESSION['status'] = "Failed to update status: " . $conn->error;
                $_SESSION['status_code'] = "error";
                header("Location: verification.php");
                exit();
            }
        } else {
            // Incorrect OTP
            echo '<script>
            alert("OTP Wrong.");
            window.location.href = "adminManageApplications.php";
        </script>';
        }
    }
    // } elseif (isset($_POST['resend'])) {
    //     // Generate a new OTP
    //     $newOTP = rand(100000, 999999);
    //     $email = $_SESSION['email'];
    //     $fullname = $_SESSION['fullname'];
    //     $otp_expiration = date('Y-m-d H:i:s', strtotime('+5 minutes'));

    //     // Update the OTP in the database
    //     $updateQuery = "UPDATE account_profiles SET otp = ?, otp_exp = ?, user_role = 0 WHERE email = ?";
    //     $updateStmt = $conn->prepare($updateQuery);
    //     $updateStmt->bind_param("iss", $newOTP, $otp_expiration, $email);

    //     if ($updateStmt->execute()) {
    //         // Send OTP via email using PHPMailer
    //         $mail = new PHPMailer;
    //         $mail->isHTML(true);
    //         $mail->isSMTP();
    //         $mail->SMTPDebug = 2; // Enable verbose debugging
    //         $mail->Debugoutput = 'html'; // Display debugging output in HTML format
    //         $mail->SMTPKeepAlive = true;
    //         $mail->Host = 'smtp.gmail.com';
    //         $mail->Port = 587;
    //         $mail->SMTPAuth = true;
    //         $mail->Username = 'yeojsoriano721@gmail.com'; // Replace with your email
    //         $mail->Password = 'vweswchyhxelzyhz'; // Replace with your email password
    //         $mail->SMTPSecure = 'tls';
    //         $mail->setFrom('CAPEDAInc@gmail.com', 'CAPEDA'); // Replace with your info
    //         $mail->addAddress($email, $fullname);
    //         $mail->Subject = 'Email OTP Verification (Resend)';
    //         $mail->Body = "Your new OTP for registration is: $newOTP. This OTP is valid for 30 minutes.";

    //         if ($mail->send()) { // If the email is sent successfully
    //             $_SESSION['status'] = "New OTP sent successfully! Check your email.";
    //             $_SESSION['status_code'] = "success";
    //             exit();
    //         } else {
    //             $_SESSION['status'] = "Failed to resend OTP: " . $mail->ErrorInfo;
    //             $_SESSION['status_code'] = "error";
    //             exit();
    //         }
    //     } else {
    //         $_SESSION['status'] = "Failed to resend OTP: " . $conn->error;
    //         $_SESSION['status_code'] = "error";
    //         header("Location: verification.php"); // Redirect back to verification.php
    //         exit();
    //     }
} else {
    //   echo "Failed";
}

?>

<div class="modal-overlay" id="<?php echo 'verifyEmail' . $id; ?>">
    <div class="modal-container modal-form-size modal-l">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Verify " . ucfirst($fname) . " " . ucfirst($lname) . " 's Email" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'verifyEmail' . $id; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="post">
                    <div class="otp-modal-card">
                        <h1> <?php echo "Verify" . " " . ucfirst($fname) . " " . ucfirst($lname) . "'s Email"   ?></h1>
                        <p>Code has been sent to <?php echo $email ?></p>
                        <div class="otp-modal-card-inputs">
                            <input type="text" maxlength="1" autofocus required name="otp1" />
                            <input type="text" maxlength="1" required name="otp2" />
                            <input type="text" maxlength="1" required name="otp3" />
                            <input type="text" maxlength="1" required name="otp4" />
                            <input type="text" maxlength="1" required name="otp5" />
                            <input type="text" maxlength="1" required name="otp6" />
                        </div>
                        <p>Don't have a code yet? <a href="#" name="resend" id="resend">Click here to resend</a></p>
                        <p id="timer"></p>
                        <button disabled name="verify">Verify</button>

                    </div>
                </form>
            </div>
            <br />

        </div>
    </div>
</div>

<script>
    const inputs = document.querySelectorAll(".otp-modal-card-inputs input");
    const button = document.querySelector(".otp-modal-card button");

    inputs.forEach((input, index) => {
        input.addEventListener("input", function(e) {
            const currentInput = e.target;
            const nextInput = inputs[index + 1];
            const prevInput = inputs[index - 1];

            // Automatically move to the next input if the current one has a value
            if (currentInput.value && nextInput) {
                nextInput.focus();
            }

            // Return to the previous input if the current input is empty
            if (!currentInput.value && prevInput) {
                prevInput.focus();
            }

            // Check if all inputs have values to enable the "Verify" button
            const allInputsFilled = [...inputs].every((input) => input.value);
            button.disabled = !allInputsFilled;
        });

        // Allow only numbers in the input fields
        input.addEventListener("input", function(e) {
            const currentInput = e.target;
            const sanitizedValue = currentInput.value.replace(/\D/g, "");
            currentInput.value = sanitizedValue;
        });
    });

    document.addEventListener("DOMContentLoaded", function() {
        // Variables to manage the timer
        let timer;
        let countdown = 60; // Set the initial countdown time in seconds (adjust as needed)

        // Function to start the timer
        function startTimer() {
            timer = setInterval(function() {
                if (countdown > 0) {
                    countdown--;
                    document.getElementById(
                        "timer"
                    ).textContent = `Resend in ${countdown} seconds`;
                } else {
                    clearInterval(timer);
                    document.getElementById("timer").textContent = "";
                    document.getElementById("resend").classList.remove("disabled");
                }
            }, 1000); // Update the timer every 1000ms (1 second)
        }

        // Function to resend OTP
        function resendOTP() {
            // Disable the "Resend" link and start the timer
            document.getElementById("resend").classList.add("disabled");
            startTimer();

            // Make an AJAX request to your server to resend OTP
            // You need to implement this part in your code
            // Example:
            // Send an AJAX request to your server to resend OTP
            fetch("email_verify_otp.php", {
                    method: "POST",
                    body: new URLSearchParams({
                        resend: 1
                    }), // Send a parameter to indicate the resend action
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded",
                    },
                })
                .then((response) => {
                    if (response.status === 200) {
                        // OTP resent successfully
                    } else {
                        // Handle the error
                    }
                })
                .catch((error) => {
                    // Handle the error
                });
        }

        // Attach click event listener to the "Resend" link
        document.getElementById("resend").addEventListener("click", function(e) {
            e.preventDefault();
            if (!document.getElementById("resend").classList.contains("disabled")) {
                resendOTP();
            }
        });

        // ... Other code ...
    });
</script>