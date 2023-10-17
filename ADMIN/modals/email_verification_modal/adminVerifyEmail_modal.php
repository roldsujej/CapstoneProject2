<div class="modal-overlay <?php if ($isVerifyEmailModalActive) echo 'verifyEmail-active'; ?>" id="<?php echo 'verifyEmail' ?>">
    <div class="modal-container modal-form-size modal-l">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Verify " . ucfirst($fname) . " " . ucfirst($lname) . " 's Email" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'verifyEmail' ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">
                <form method="post" action="verify_otp.php">
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
                        <p>Didn't get the code? <a href="#" id="resend" disabled>Resend</a></p>
                        <p id="timer"></p>
                        <button disabled name="submit">Verify</button>
                    </div>
                </form>
            </div>
            <br />
            <div class="modal-footer">
                <button type="submit" name="update_user" class="btn btn-warning text-dark" onsubmit="return validate()">Update</button>
            </div>
        </div>
    </div>
</div>