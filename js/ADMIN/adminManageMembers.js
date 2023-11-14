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

  generatePasswordButton.addEventListener("click", function () {
    const newPassword = generateRandomPassword();
    passwordInput.value = newPassword;
  });
  //This is the generate password for the editModal
  generateEditPasswordButton.addEventListener("click", function () {
    const newPassword = generateRandomPassword();
    passwordInputEdit.value = newPassword;
  });

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

  // Function to close the edit modal
  $("#closeEditModalButton").on("click", function () {
    closeEditModal();
  });

  //bday validation
  document.getElementById("dob").addEventListener("change", calculateAge);

  function calculateAge() {
    const dob = document.getElementById("dob").value;
    if (dob) {
      const today = new Date();
      const birthDate = new Date(dob);
      let age = today.getFullYear() - birthDate.getFullYear();
      const monthDiff = today.getMonth() - birthDate.getMonth();
      if (
        monthDiff < 0 ||
        (monthDiff === 0 && today.getDate() < birthDate.getDate())
      ) {
        age--;
      }
      document.getElementById("age").value = age;
      validateAge(age); // Call function to validate age
    }
  }

  //birth date checker
  function validateBirthDate() {
    const dob = document.getElementById("dob").value;
    const dobError = document.getElementById("dobError");
    const today = new Date();
    const inputDate = new Date(dob);

    if (
      inputDate > today ||
      inputDate.getFullYear() < 1000 || // Restrict years less than 1000
      inputDate.getFullYear() > 9999 // Restrict years greater than 9999
    ) {
      dobError.classList.remove("hidden");
    } else {
      dobError.classList.add("hidden");
    }
  }

  //checker if under 18 yung age
  function validateAge(age) {
    const ageError = document.getElementById("ageError");
    if (age <= 0) {
      ageError.textContent = "Please check the date of birth.";
      ageError.classList.remove("hidden"); // Show error message
    } else if (age < 18) {
      ageError.textContent = "Applicants under 18 years old cannot apply.";
      ageError.classList.remove("hidden"); // Show error message
    } else {
      ageError.classList.add("hidden"); // Hide error message
    }
  }

  // function validate() {
  //   // Validation for Date of Birth
  //   const dob = document.getElementById("dob").value.trim();
  //   if (dob === "") {
  //     alert("Please enter your date of birth");
  //     return false;
  //   }

  //   return true;
  // }

  //function to validate phone number

  function validatePhoneNumber() {
    const phoneNumber = document.getElementById("cpNum").value;
    const cpNumError = document.getElementById("cpNumError");
    const regex = /^(\+?63|0?)9\d{9}$/; // Updated regular expression

    if (!regex.test(phoneNumber)) {
      cpNumError.textContent = "Please enter a Philippine mobile number.";
    } else {
      cpNumError.textContent = ""; // Clear the error message
    }
  }

  // Add an event listener to the input to trigger validation on user input
  document
    .getElementById("cpNum")
    .addEventListener("input", validatePhoneNumber);

  // Event listener to handle form submission when the submit button is clicked
  addApplicantForm.addEventListener("submit", submitForm);
  // Event listener to handle form submission when the submit button is clicked in the Edit modal
  editApplicantForm.addEventListener("submit", submitEditForm); // Add this line
});

//filter not yet working

$(document).ready(function () {
  $("#statusFilter").on("change", function () {
    const status = $(this).val();

    $(".applications-table tbody tr").hide(); // Hide all rows initially

    if (status === "all") {
      $(".applications-table tbody tr").show(); // Show all rows if 'All' is selected
    } else {
      $(`.applications-table tbody tr td:nth-child(4) .status-${status}`)
        .closest("tr")
        .show();
    }
  });
});
