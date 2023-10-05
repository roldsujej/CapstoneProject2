  <!-- View Modal -->
  <div class="modal-container hidden" id="viewModal">
      <!-- Modal content -->
      <div class="modal">
          <div class="modal-header">
              <h2>Applicant's Information</h2>
          </div>
          <div class="modal-body">
              <div class="card">
                  <form action="fetchAdditionalInfo.php" method="POST">
                      <div class="form-body">
                          <div class="form-group">
                              <label class="label" for="applicant_id_view">Applicant ID:</label>
                              <input type="text" name="applicant_id" id="applicant_id_view" readonly class="form-control">

                          </div>
                          <div class="form-group">
                              <label class="label" for="">First Name</label>
                              <input type="text" class="form-control" name="firstName" id="firstName_view" placeholder="<?php echo ucfirst($fname) ?>" disabled>
                              <span class="validation-message"></span>
                          </div>
                          <div class="form-group">
                              <label class="label" for="">Last Name</label>
                              <input type="text" class="form-control" name="lastName" id="lastName_view" placeholder="Enter last name" disabled>
                              <span class="error-message hidden"></span>
                          </div>
                          <div class="form-group">
                              <label class="label" for="">Contact Number</label>
                              <div class="phone-input">
                                  <input type="text" class="form-control" name="cpNum" id="cpNum_view" value="+63" disabled>
                              </div>

                          </div>
                          <div class="form-group">
                              <label class="label" for="">Address</label>
                              <input type="text" class="form-control" name="address" id="address_view" placeholder=" Blk, Lot, St, Brgy, Municipality, Province" disabled>
                          </div>
                          <div class="form-group">
                              <label class="label" for="">Email</label>
                              <input type="email" class="form-control" name="email" id="email_view" placeholder="Enter email" disabled>
                          </div>
                          <div class="form-group">
                              <label class="label" for="">Status</label>
                              <input type="text" class="form-control" name="status" id="status_view" readonly disabled>
                          </div>

                          <div class="form-group">
                              <label class="label" for="">Membership Status</label>
                              <input type="text" class="form-control" name="membership_status" id="membership_status_view" readonly disabled>
                          </div>
                          <!-- Add this inside your edit modal's form -->
                          <div class="form-group">
                              <label class="label" for="">Temporary Password</label>
                              <div class="password-input-container">
                                  <input type="text" class="form-control" id="passwordInputView" name="password" placeholder="Applicant's temporary password" disabled>


                              </div>
                              <!-- <button type="button" class="generate-password-button" id="generateEditPasswordButton">Generate Password</button> -->

                          </div>
                      </div>
                      <div class="modal-footer">
                          <!-- <button type="submit" class="modalBtn" id="submitButtonUpdate" name="updateApplicant">Update</button> -->
                          <button type="button" class="modalBtn" id="closeViewModalButton">Close</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>