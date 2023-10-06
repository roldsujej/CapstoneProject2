<!-- Create the modal container -->
<div class="modal-overlay" id="<?php echo 'addRequirementModal' ?>">
    <div class="modal-container modal-form-size modal-sm">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Add New Requirement" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'addRequirementModal' ?>">
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