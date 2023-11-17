function validatePhoneNumber() {
  const phoneNumberInput = document.getElementById("phoneNumber");
  const phoneNumberError = document.getElementById("phoneNumberError");

  phoneNumberInput.value = phoneNumberInput.value.replace(/[^+\d]/g, "");

  // Regular expression to match a valid Philippine mobile number
  const regex = /^(\+63|0)9\d{9}$/;

  if (phoneNumberInput.value.trim() === "") {
    // If the input is empty, clear the error message
    phoneNumberError.textContent = "";
  } else if (!regex.test(phoneNumberInput.value)) {
    // If the input is not a valid mobile number, display an error message
    phoneNumberError.textContent =
      "Please enter a valid mobile number from the Philippines.";
  } else {
    // If the input is a valid mobile number, clear the error message
    phoneNumberError.textContent = "";
  }
}
