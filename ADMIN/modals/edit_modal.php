  <!-- Edit Modal -->
  <div class="modal-container hidden" id="editModal">
      <!-- Modal content -->
      <div class="modal" id="<?php echo $id; ?>">
          <div class="modal-header">
              <h2>Update Applicant Details</h2>
          </div>
          <div class="modal-body">
              <div class="card">
                  <form action="adminAddApplicant_process.php" method="POST">
                      <div class="form-body">
                          <div class="form-group">
                              <label class="label" for="">ID:</label>
                              <input type="text" name="applicant_id" id="applicant_id" value="<?php echo "$id"; ?>" class=" form-control">

                          </div>
                          <div class="form-group">
                              <label class="label" for="">First Name</label>
                              <input type="text" class="form-control" name="firstName" id="firstName" placeholder="<?php echo ucfirst($fname); ?>">
                              <span class="validation-message"></span>
                          </div>
                          <div class="form-group">
                              <label class="label" for="">Last Name</label>
                              <input type="text" class="form-control" name="lastName" id="lastName" placeholder="<?php echo ucfirst($lname); ?>" required>
                              <span class="error-message hidden"></span>
                          </div>
                          <div class="form-group">
                              <label class="label" for="">Contact Number</label>
                              <div class="phone-input">
                                  <input type="text" class="form-control" name="cpNum" id="cpNum" value="<?php echo ($cpNumber); ?>" required>
                              </div>
                              <div id="phoneNumberError" class="error-message hidden">Avoid entering numeric characters.</div>
                          </div>
                          <div class="form-group">
                              <label class="label" for="">Address</label>
                              <input type="text" class="form-control" name="address" id="address" placeholder="<?php echo ($address); ?>" required>
                          </div>
                          <div class="form-group">
                              <label class="label" for="">Email</label>
                              <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo ($email); ?>" required>
                          </div>
                          <div class="form-group">
                              <label class="label" for="">Status</label>
                              <input type="text" class="form-control" name="status" id="status" value="<?php echo ($status); ?>" required>
                          </div>
                          <!-- Add this inside your edit modal's form -->
                          <div class=" form-group">
                              <label class="label" for="">Temporary Password</label>
                              <div class="password-input-container">
                                  <input type="text" class="form-control" id="passwordInputEdit" name="password" placeholder="Generate temporary password" required>
                                  <span id="togglePasswordEdit" class="toggle-password" onclick="togglePasswordVisibilityEdit()">
                                      <ion-icon name="eye"></ion-icon>
                                  </span>
                              </div>
                              <button type="button" class="generate-password-button" id="generateEditPasswordButton">Generate Password</button>

                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" class="modalBtn" id="submitButtonUpdate" name="updateApplicant">Update</button>
                          <button type="button" class="modalBtn" id="closeEditModalButton">Close</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>