  <!------------------DELETE MODAL---------------------------------------->
  <div class="modal-container hidden">
      <!-- Modal content -->
      <div class="modal" data-modal-id="<?php echo 'delete' . $id; ?>">
          <div class=" modal-header">
              <h2>Delete Applicant Profile</h2>
          </div>
          <div class="modal-body">
              <div class="card">
                  <form action="adminAddApplicant_process.php" method="POST">

                      <input type="hidden" name="applicantIdToDelete" id="applicantIdToDelete" />
                      <h3 id="deleteModalMessage">Are you sure you want to delete this profile?</h3>


                      <div class="modal-footer">
                          <button type="submit" class="modalBtn" id="deleteModalBtn" name="deleteApplicant">Yes</button>
                          <button type="button" class="modalBtn" id="closeDeleteModalButton">Cancel</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>