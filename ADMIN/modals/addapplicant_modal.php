<!-- Add a class "hidden" to hide the modal initially -->

<!-- Create the modal container -->
<div class="modal-container hidden" id="modalContainer">
    <!-- Modal content -->
    <div class="modal" id="<?php echo 'add' . $id; ?>">
        <div class="modal-header">
            <h2>Add New Applicant</h2>
        </div>
        <div class="modal-body">
            <div class="card">

                <form id="addApplicantForm" action="adminAddApplicant_process.php" method="POST">

                    <div class="form-body">
                        <div class="form-group">
                            <label class="label" for="">First Name</label>
                            <input type="text" class="form-control" name="firstName" placeholder="Enter first name" required>
                            <span class="validation-message"></span>
                        </div>

                        <div class="form-group">
                            <label class="label" for="">Last Name</label>
                            <input type="text" class="form-control" name="lastName" placeholder="Enter last name" required>
                            <span class="error-message hidden"></span>
                        </div>

                        <div class="form-group">
                            <label class="label" for="">Contact Number</label>
                            <div class="phone-input">
                                <input type="text" class="form-control" name="cpNum" value="+63" required>
                            </div>
                            <div id="phoneNumberError" class="error-message hidden">Avoid entering numeric characters.</div>
                        </div>

                        <div class="form-group">
                            <label class="label" for="">Address</label>
                            <input type="text" class="form-control" name="address" placeholder=" Blk, Lot, St, Brgy, Municipality, Province" required>
                        </div>

                        <div class="form-group">
                            <label class="label" for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                        </div>

                        <div class="form-group">
                            <label class="label" for=""> Temporary Password</label>
                            <div class="password-input-container">
                                <input type="password" class="form-control" id="passwordInput" name="password" placeholder="Generate temporary password" readonly required>
                                <span id="togglePassword" class="toggle-password" onclick="togglePasswordVisibility()">
                                    <ion-icon name="eye"></ion-icon>
                                </span>
                            </div>
                            <button type="button" class="generate-password-button" id="generatePasswordButton">Generate Password</button>
                        </div>



                        <!-- <div class="form-group">
                  <label class="label" for="">Re-enter Temporary Password</label>
                  <input type="password" class="form-control" name="confirmPassword" placeholder="Re-type password" required>
                </div> -->

                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="modalBtn" id="submitButton" name="addApplicant">Submit</button>

                <button type="button" class="modalBtn" id="closeModalButton">Close</button>

            </div>



            </form>
        </div>







    </div>
</div>