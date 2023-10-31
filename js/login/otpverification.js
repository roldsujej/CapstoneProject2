const inputs = document.querySelectorAll(".otp-card-inputs input");
const button = document.querySelector(".otp-card button");

inputs.forEach((input) => {
  let lastInputStatus = 0;
  input.onkeyup = (e) => {
    const currentElement = e.target;
    const nextElement = input.nextElementSibling;
    const prevElement = input.previousElementSibling;

    if (prevElement && e.keyCode === 8) {
      if (lastInputStatus === 1) {
        prevElement.value = "";
        prevElement.focus();
      }
      button.setAttribute("disabled", true);
      lastInputStatus = 1;
    } else {
      const reg = /^[0-9]+$/;
      if (!reg.test(currentElement.value)) {
        currentElement.value = currentElement.value.replace(/\D/g, "");
      } else if (currentElement.value) {
        if (nextElement) {
          nextElement.focus();
        } else {
          button.removeAttribute("disabled");
          lastInputStatus = 0;
        }
      }
    }
  };
});

document.addEventListener("DOMContentLoaded", function () {
  // Variables to manage the timer
  let timer;
  let countdown = 60; // Set the initial countdown time in seconds (adjust as needed)

  // Function to start the timer
  function startTimer() {
    timer = setInterval(function () {
      if (countdown > 0) {
        countdown--;
        document.getElementById(
          "timer"
        ).textContent = `Resend in ${countdown} seconds`;
      } else {
        clearInterval(timer);
        document.getElementById("timer").textContent = "";
        document.getElementById("resend").classList.remove("disabled");
      }
    }, 1000); // Update the timer every 1000ms (1 second)
  }

  // Function to resend OTP
  function resendOTP() {
    // Disable the "Resend" link and start the timer
    document.getElementById("resend").classList.add("disabled");
    startTimer();

    // Make an AJAX request to your server to resend OTP
    // You need to implement this part in your code
    // Example:
    // Send an AJAX request to your server to resend OTP
    fetch("verify_otp.php", {
      method: "POST",
      body: new URLSearchParams({ resend: 1 }), // Send a parameter to indicate the resend action
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
    })
      .then((response) => {
        if (response.status === 200) {
          // OTP resent successfully
        } else {
          // Handle the error
        }
      })
      .catch((error) => {
        // Handle the error
      });
  }

  // Attach click event listener to the "Resend" link
  document.getElementById("resend").addEventListener("click", function (e) {
    e.preventDefault();
    if (!document.getElementById("resend").classList.contains("disabled")) {
      resendOTP();
    }
  });

  // ... Other code ...
});
