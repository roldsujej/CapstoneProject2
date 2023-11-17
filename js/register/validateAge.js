function validateAge() {
  // Get the selected birthday
  var birthday = new Date(document.getElementById("birthday").value);

  // Calculate the age
  var today = new Date();
  var age = today.getFullYear() - birthday.getFullYear();

  // Check if the birthday for this year has occurred or not
  if (
    today.getMonth() < birthday.getMonth() ||
    (today.getMonth() === birthday.getMonth() &&
      today.getDate() < birthday.getDate())
  ) {
    age--;
  }

  // Display the age and show an error if the applicant is underaged
  document.getElementById("ageError").textContent = "";
  if (age < 18) {
    document.getElementById("ageError").textContent =
      "Applicants must be 18 years old or older.";
  }
}
