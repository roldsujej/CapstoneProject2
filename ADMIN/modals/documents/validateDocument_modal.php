<div class="modal-overlay" id="<?php echo 'validateDocumentModal' . $apID; ?>">
    <div class="modal-container modal-form-size modal-l">
        <div class="modal-header text-light">
            <h4 class="modal-h4-header"><?php echo "Validate" ?></h4>
            <span class="modal-exit" data-modal-id="<?php echo 'validateDocumentModal' . $apID; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z" />
                </svg>
            </span>
        </div>
        <div class="modal-body">

            <br />
            <div class="modal-footer">
                <button type="submit" name="submit_document" class="modalBtn " onsubmit="return validate()">
                    Add
                </button>
            </div>


            </form>
        </div>


    </div>
</div>