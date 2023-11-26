<div class="modal-overlay" id="<?php echo 'registrationModal'  ?>">
    <div class="modal-container modal-form-size modal-l">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Register" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'registrationModal'  ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">
            <div class="modalContent">

                <form action="" method="post">
                    <h2>Registration</h2>
                    <div class="content">
                        <!-- Personal Information Card -->

                        <h3>Personal Information</h3>

                        <div class="input-box">
                            <label for=" first name">First name <span class="guide">*required</span></label>
                            <input type="text" placeholder="e.g., Juan" name="firstName" required />
                        </div>
                        <div class="input-box">
                            <label for=" last name">Last name <span class="guide">*required</span></label>
                            <input type="text" placeholder="e.g., Dela Cruz" name="lastName" required />

                        </div>


                        <div class="input-box">
                            <label for="phone number">Mobile Number<span class="guide">*make sure that your sim is registered</span></label>
                            <input type="text" placeholder="+63 XXXXXXXXX" name="cpNumber" id="phoneNumber" maxlength="13" required pattern="\+?[0-9]+" oninput="validatePhoneNumber()" />
                            <span id="phoneNumberError" class="error-message"></span>
                        </div>
                        <div class="input-box">
                            <label for="birthday">Birthday<span class="guide">*ages under 18 years are not elligible to apply</span></label>
                            <input type="date" name="birthday" id="birthday" required oninput="validateAge()" />
                            <span id="ageError" class="error-message"></span>

                        </div>
                        <!-- <div class="input-box">
            <label for=" age">Age</label>
            <input type="text" placeholder="age" name="age" required />
          </div> -->
                        <div class="input-box address-box">
                            <label for="blk">Block</label>
                            <input type="text" placeholder="Block" name="blk" />

                            <label for="lot">Lot</label>
                            <input type="text" placeholder="Lot" name="lot" />

                            <label for="st">Street</label>
                            <input type="text" placeholder="Street" name="st" />

                            <label for="brgy">Barangay</label>
                            <input type="text" placeholder="Barangay" name="brgy" />

                            <label for="city">City</label>
                            <input type="text" placeholder="City" name="city" />

                            <label for="province">Province</label>
                            <input type="text" placeholder="Province" name="province" />
                        </div>

                        <span class="gender-title">Gender <span class="guide">*required</span></span>
                        <div class="gender-category">
                            <input type="radio" name="gender" id="male" value="male" />
                            <label for="gender">Male</label>
                            <input type="radio" name="gender" id="female" value="female" />
                            <label for="gender">Female</label>
                            <input type="radio" name="gender" id="other" value="other" />
                            <label for="gender">Other</label>
                        </div>

                        <!-- Account Information Card -->

                        <h3>Account Information</h3>

                        <div class="input-box">
                            <label for="email">Email<span class="guide">*make sure you have active gmail account</span></label>
                            <input type="email" placeholder="Enter your active email" name="email" required />
                        </div>
                        <div class="input-box password-box">
                            <label for="password">Password</label>
                            <input type="password" placeholder="Enter Password" name="password" required />

                            <label for="Confirm password">Confirm Password</label>
                            <input type="password" placeholder="Re-enter Password" name="cpassword" required />
                        </div>


                        <!-- Button Container -->
                        <div class="button-container">
                            <button type="submit" name="submit">Register</button>
                        </div>

                        <!-- Login Link -->
                        <div class="login-link">
                            <span class="login">Already have an account? <a href="../Login/login.php">Click here to log in</a></span>
                        </div>
                    </div>
                </form>











            </div>
        </div>

    </div>
</div>