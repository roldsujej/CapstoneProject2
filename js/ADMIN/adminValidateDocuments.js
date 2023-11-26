// validationScript.js

let documents = <?php echo json_encode($uploadedDocsResult->fetch_all(MYSQLI_ASSOC)); ?>;
let currentIndex = 0;

function validateAction(action) {
  // Perform action based on the button clicked
  if (action === 'check') {
    alert('Document Validated');
  } else if (action === 'x') {
    alert('Document needs to be resubmitted');
  }

  // Move to the next document
  currentIndex++;

  // Check if there are more documents to validate
  if (currentIndex < documents.length) {
    displayDocumentModal();
  } else {
    alert('All documents have been validated.');
  
  }
}

function closeModal(modalId) {
  // Close the modal using JavaScript
  document.getElementById(modalId).style.display = 'none';
}

function displayDocumentModal() {
  const currentDocument = documents[currentIndex];

  // Update the modal content with the current document details
  document.getElementById('docId').innerText = currentDocument.doc_id;
  document.getElementById('uploader').innerText = currentDocument.firstName + ' ' + currentDocument.lastName;
  document.getElementById('documentName').innerText = currentDocument.document_name;

  // Update the embed tag source with the new document
  document.querySelector('#' + 'validateDocumentModal' + apID + ' embed').src = '../APPLICANT/uploads/' + currentDocument.file_name;

  // Show the validation modal
  document.getElementById('validateDocumentModal' + apID).style.display = 'block';
}