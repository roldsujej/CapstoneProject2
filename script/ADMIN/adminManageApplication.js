const navigation = document.querySelector(".navigation");
const toggleButton = document.querySelector(".toggle");
const main = document.querySelector(".main");

toggleButton.addEventListener("click", () => {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
});

// Close navigation on small screens by default
const screenWidth = window.innerWidth || document.documentElement.clientWidth;
if (screenWidth <= 768) {
  navigation.classList.remove("active");
  main.classList.remove("active");
}

// Adjust content positioning on resize
window.addEventListener("resize", () => {
  const screenWidth = window.innerWidth || document.documentElement.clientWidth;
  if (screenWidth <= 768) {
    navigation.classList.remove("active");
    main.classList.remove("active");
  } else {
    navigation.classList.add("active");
    main.classList.add("active");
  }
});

//modal on AdminManageApplications

document.addEventListener("DOMContentLoaded", function () {
  const openModalButton = document.getElementById("openModalButton");
  const closeModalButton = document.getElementById("closeModalButton");
  const modalContainer = document.getElementById("modalContainer");
  const firstNameInput = document.querySelector('input[name="firstName"]');
  const lastNameInput = document.querySelector('input[name="lastName"]');
  const firstNameValidation = document.querySelector(
    "span.validation-message:nth-child(1)"
  );
  const lastNameValidation = document.querySelector(
    "span.validation-message:nth-child(3)"
  );
  const generatePasswordButton = document.getElementById(
    "generatePasswordButton"
  );
  const generateEditPasswordButton = document.getElementById(
    "generateEditPasswordButton"
  );
  const passwordInput = document.querySelector('input[name="password"]');
  const passwordInputEdit = document.querySelector(
    'input[name="password"][id="passwordInputEdit"]'
  );
  const deleteButtons = document.querySelectorAll(".deleteBtn");

  // Update the delete modal message with the applicant's name
  function updateDeleteModalMessage(applicantName) {
    const deleteModalMessage = document.getElementById("deleteModalMessage");
    deleteModalMessage.textContent = `Are you sure you want to delete the profile of ${applicantName}?`;
  }

  // This line of codes are responsible for deleteModal
  deleteButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      // Get the applicant ID from the data attribute
      const applicantId = button.getAttribute("data-applicant-id");
      // Get the applicant name from the data-applicant-name attribute of the corresponding row
      const row = button.closest("tr");
      const applicantName = button.getAttribute("data-applicant-name");

      // Set the applicant ID in the deleteModal form (assuming you have an input field for it)
      document.getElementById("applicantIdToDelete").value = applicantId;

      // Show the deleteModal
      const deleteModalMessage = document.getElementById("deleteModalMessage");
      deleteModalMessage.textContent = `Are you sure you want to delete ${applicantName}'s profile?`;
      deleteModal.style.display = "flex";
    });
  });

  // Add a click event listener to the close button in the deleteModal
  const closeDeleteModalButton = document.getElementById(
    "closeDeleteModalButton"
  );
  closeDeleteModalButton.addEventListener("click", function () {
    // Hide the deleteModal
    const deleteModal = document.getElementById("deleteModal");
    deleteModal.style.display = "none";
  });

  generatePasswordButton.addEventListener("click", function () {
    const newPassword = generateRandomPassword();
    passwordInput.value = newPassword;
  });
  //This is the generate password for the editModal
  generateEditPasswordButton.addEventListener("click", function () {
    const newPassword = generateRandomPassword();
    passwordInputEdit.value = newPassword;
  });

  function openEditModal() {
    $("#editModal").removeClass("hidden");
  }

  function closeEditModal() {
    $("#editModal").addClass("hidden");
  }

  function openViewModal() {
    $("#viewModal").removeClass("hidden");
  }

  function closeViewModal() {
    $("#viewModal").addClass("hidden");
  }

  // Regular expression to allow only alphabetic characters and spaces
  const nameRegex = /^[a-zA-Z\s]*$/;

  // Function to validate the input and update the validation message
  function validateNameInput(input, validationElement) {
    const value = input.value;
    if (!nameRegex.test(value)) {
      validationElement.textContent =
        "Please avoid entering numeric characters.";
      validationElement.classList.add("error-message"); // Apply the error message class
      input.value = value.replace(/[^a-zA-Z\s]/g, ""); // Remove non-alphabetic characters
    } else {
      validationElement.textContent = ""; // Clear the validation message
      validationElement.classList.remove("error-message"); // Remove the error message class
    }
  }

  // Add event listeners to the input fields
  firstNameInput.addEventListener("input", function () {
    validateNameInput(firstNameInput, firstNameValidation);
  });

  lastNameInput.addEventListener("input", function () {
    validateNameInput(lastNameInput, lastNameValidation);
  });
  // Function to open the modal
  function openModal() {
    modalContainer.style.display = "flex"; // Show the modal
  }

  // Function to close the modal
  function closeModal() {
    modalContainer.style.display = "none"; // Hide the modal
  }

  // Function to generate a random password

  function generateRandomPassword() {
    const length = 10; // You can adjust the desired length of the password
    const charset =
      "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+";

    let password = "";
    for (let i = 0; i < length; i++) {
      const randomIndex = Math.floor(Math.random() * charset.length);
      password += charset.charAt(randomIndex);
    }

    return password;
  }

  function submitEditForm(event) {
    event.preventDefault(); // Prevent the default form submission

    // You can add validation here before submitting the form

    // Submit the form using an AJAX request
    const formData = new FormData(editApplicantForm);
    fetch(editApplicantForm.action, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        // Handle the response, e.g., show a success message or handle errors
        console.log(data);
        closeEditModal(); // Close the edit modal after successful submission
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }

  // Function to handle form submission
  function submitForm(event) {
    // Prevent the default form submission

    // You can add validation here before submitting the form

    // Submit the form using an AJAX request
    const formData = new FormData(addApplicantForm);
    fetch(addApplicantForm.action, {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        // Handle the response, e.g., show a success message or handle errors
        console.log(data);
        closeModal(); // Close the modal after successful submission
      })

      .catch((error) => {
        console.error("Error:", error);
      });
  }

  // This is the toggle function or the eye icon in the edit modal
  function togglePasswordVisibilityEdit() {
    const passwordInputEdit = document.getElementById("passwordInputEdit");
    const togglePasswordIconEdit =
      document.getElementById("togglePasswordEdit");

    if (passwordInputEdit.type === "password") {
      passwordInputEdit.type = "text";
      togglePasswordIconEdit.innerHTML = '<ion-icon name="eye-off"></ion-icon>';
      passwordInputEdit.placeholder = ""; // Clear the placeholder text
    } else {
      passwordInputEdit.type = "password";
      togglePasswordIconEdit.innerHTML = '<ion-icon name="eye"></ion-icon>';
      passwordInputEdit.placeholder = "Generate temporary password"; // Restore the placeholder text
    }
  }
  // Open the Verify Email modal

  // Function to open the edit modal

  // Function to open the edit modal
  // $(".editBtn").on("click", function () {
  //     const $tr = $(this).closest("tr");
  //     const data = $tr
  //         .find("td")
  //         .map(function () {
  //             return $(this).text();
  //         })
  //         .get();

  //     // console.log(data);
  //     // var applicantId = $(this).data("applicant-id");

  //     // // const applicantId = data[0]; // Replace with the correct index

  //     // // // Set the values in the edit modal
  //     // $("#applicant_id").val(applicantId);

  //     // Show the edit modal
  //     openEditModal();
  // });

  // Function to close the edit modal
  $("#closeEditModalButton").on("click", function () {
    closeEditModal();
  });

  // View Modal

  // // Function to open the view modal
  // $('.viewBtn').on('click', function() {
  //   const $tr = $(this).closest('tr');
  //   const data = $tr.find('td').map(function() {
  //     return $(this).text();
  //   }).get();

  //   console.log(data);
  //   const applicantId = data[0]; // Replace with the correct index

  //   $('#applicant_id_view').val(applicantId);
  //   const nameParts = data[1].split(' ');
  //   $('#firstName_view').val(nameParts[0]);
  //   $('#lastName_view').val(nameParts[1]);
  //   $('#cpNum_view').val(data[3]); // Index 3 corresponds to cpNumber
  //   $('#address_view').val(data[4]); // Index 4 corresponds to address
  //   $('#email_view').val(data[5]); // Index 5 corresponds to email
  //   $('#passwordInputView').val(data[6]); // Index 6 corresponds to temporary_password
  //   $('#status_view').val(data[7]); // Index 10 corresponds to status
  //   $('#membership_status_view').val(data[8]); // Index 11 corresponds to membership_status

  //   if (data[6] === 'Verified') {
  //     $('#status_view').removeClass('status-pending').addClass('status-verified');
  //   } else {
  //     $('#status_view').removeClass('status-verified').addClass('status-pending');
  //   }

  //   // Show the edit modal
  //   openViewModal();
  // });

  // JavaScript code to open the view modal
  // var viewBtns = document.querySelectorAll('.viewBtn');
  // var viewModal = document.getElementById('viewModal');
  // var closeViewModalButton = document.getElementById('closeViewModalButton');

  // viewBtns.forEach(function(btn) {
  //   btn.addEventListener('click', function() {
  //     // Retrieve the applicant ID from the button's data attribute
  //     var applicantId = btn.getAttribute('data-applicant-id');

  //     // Make an AJAX request to fetch additional data
  //     fetch('fetchAdditionalInfo.php?applicant_id=' + applicantId)
  //       .then(response => response.json())
  //       .then(data => {
  //         // Update the view modal fields with the fetched data
  //         document.getElementById('applicant_id_view').value = data.applicant_id;
  //         document.getElementById('firstName_view').value = data.first_name;
  //         document.getElementById('lastName_view').value = data.last_name;
  //         // Update other view modal fields here

  //         // Show the view modal
  //         viewModal.style.display = 'block';
  //       })
  //       .catch(error => {
  //         console.error('Error:', error);
  //       });
  //   });
  // });

  // closeViewModalButton.addEventListener('click', function() {
  //   viewModal.style.display = 'none';
  // });
  // // Close the modal if the user clicks outside the modal content
  // window.addEventListener('click', function(event) {
  //   if (event.target === viewModal) {
  //     viewModal.style.display = 'none';
  //   }
  // });

  // Event listener to open the modal when the "Add" button is clicked
  openModalButton.addEventListener("click", openModal);

  // Event listener to close the modal when the close button is clicked
  closeModalButton.addEventListener("click", closeModal);

  // Event listener to handle form submission when the submit button is clicked
  addApplicantForm.addEventListener("submit", submitForm);
  // Event listener to handle form submission when the submit button is clicked in the Edit modal
  editApplicantForm.addEventListener("submit", submitEditForm); // Add this line
});
