$(document).ready(function () {
  $(".notification-container").on("click", function () {
    // Make an AJAX call to get new uploaded documents
    $.ajax({
      type: "POST",
      url: "getNewUploads.php",
      success: function (response) {
        const newUploads = JSON.parse(response);
        if (newUploads.length > 0) {
          // Update the UI to show the number of new uploads
          $(".notification-count").text(newUploads.length);
          // Display or handle the new uploads
          // For example, show a dropdown list or navigate to the document section
        }
      },
      error: function (xhr, status, error) {
        console.error(error);
      },
    });
  });
});
