// Wait for the webpage to fully load before running the code
document.addEventListener("DOMContentLoaded", function () {
    // Find all elements with the class 'modal-trigger'
    var modalTriggers = document.querySelectorAll(".modal-trigger");

    // Add a click event listener to each 'modal-trigger' element
    modalTriggers.forEach(function (trigger) {
        trigger.addEventListener("click", function (e) {
            // Prevent the default action (e.g., following a link)
            e.preventDefault();

            // Get the unique js identifier of the popup from the clicked element
            var modalId = this.getAttribute("data-modal-id");

            // Get the corresponding popup element by id
            var modal = document.getElementById(modalId);

            // Find the file input and output elements within the popup
            var fileInput = modal.querySelector(".file-input");
            var output = modal.querySelector(".output");
            const imageContainer = document.getElementById("imageContainer");

            // Show or hide the popup by toggling the 'active' class
            modal.classList.toggle("active");
            //prevent body scrolling when popup is active
            document.body.style.overflow = "hidden";

            // Listen for changes in the file input (when a file is selected)
            fileInput.addEventListener("change", function () {
                // Calculate the size of the selected file in megabytes (MB)
                var size = (this.files[0].size / 1024 / 1024).toFixed(2);

                // Check if the file size exceeds 5MB
                if (size > 5) {
                    // Display a warning message in red
                    output.innerHTML =
                        '<b style="color:red">' +
                        "Image size is higher than 5MB" +
                        "</b><br>Image size: " +
                        size +
                        " MB";
                    // Clear the file input to prevent submission
                    this.value = "";
                } else {
                    // Display the file size without a warning
                    output.innerHTML =
                        "<b>" + "Image size: " + size + " MB" + "</b>";

                    // Now, display the selected image
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        imageContainer.innerHTML = `<label>Selected Image <label> <div class="border pt-2 px-2"><img src="${event.target.result}" alt="Selected Image"></div>`;
                    };
                    reader.readAsDataURL(this.files[0]); // Read the selected image
                }
            });
        });
    });

    // Find all elements with the class 'modal-exit'
    var modalExits = document.querySelectorAll(".modal-exit");

    // Add a click event listener to each 'modal-exit' element
    modalExits.forEach(function (exit) {
        exit.addEventListener("click", function () {
            // Get the unique identifier of the popup from the clicked element
            var modalId = this.getAttribute("data-modal-id");

            // Find the corresponding popup element
            var modal = document.getElementById(modalId);

            // Hide the popup by removing the 'active' class
            modal.classList.remove("active");
            //allow the body scrolling when popup is closed
            document.body.style.overflow = "auto";

            // Clear the input values within the popup
            var fileInput = modal.querySelector(".file-input");
            var output = modal.querySelector(".output");
            var imageContainer = document.getElementById("imageContainer");
            fileInput.value = "";
            output.innerHTML = "";
            imageContainer.innerHTML = "";
        });
    });
});

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
