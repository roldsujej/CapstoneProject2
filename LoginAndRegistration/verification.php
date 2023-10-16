<?php
require "../database/config.php";
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>OTP Verification</title>
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" href="../images/capedalogo.png" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/otpverification.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
  <!-- Form Section -->
  <form method="post" action="verify_otp.php">
    <div class="otp-card">
      <h1>OTP Verification</h1>
      <p>Code has been sent to <?php echo $_SESSION['email']; ?></p>
      <div class="otp-card-inputs">
        <input type="text" maxlength="1" autofocus required name="otp1" />
        <input type="text" maxlength="1" required name="otp2" />
        <input type="text" maxlength="1" required name="otp3" />
        <input type="text" maxlength="1" required name="otp4" />
        <input type="text" maxlength="1" required name="otp5" />
        <input type="text" maxlength="1" required name="otp6" />
      </div>
      <p>Didn't get the code? <a href="#" id="resend" disabled>Resend</a></p>
      <p id="timer"></p>
      <button disabled name="submit">Verify</button>
    </div>
  </form>


  <!-- SweetAlert Script -->
  <?php
  if (isset($_SESSION['status']) && $_SESSION['status_code'] != '') {
  ?>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
          title: "<?php echo $_SESSION['status']; ?>",
          icon: "<?php echo $_SESSION['status_code']; ?>",
          showConfirmButton: true,
        });

      });
    </script>
  <?php
    unset($_SESSION['status']);
  }
  ?>


  <!-- SweetAlert Script -->
  <?php
  if (isset($_SESSION['resend_success']) && $_SESSION['status_code'] === "success") {
  ?>
    <script>
      document.addEventListener("DOMContentLoaded", function() {
        Swal.fire({
          title: "<?php echo $_SESSION['resend_success']; ?>",
          icon: "<?php echo $_SESSION['status_code']; ?>",
          showConfirmButton: true,
        });
      });
    </script>
  <?php
    unset($_SESSION['resend_success']);
  }
  ?>


  <!-- Your other scripts and styles -->
  <script src="../assets/loginAndRegistration/script/otpverification.js"></script>
  
  <script>
  // resend if logged in
  document.addEventListener("DOMContentLoaded", function () {
    // Check if you want to auto-send the 'resend' data
    <?php if (isset($_SESSION['id'])) { ?>
      fetch('verify_otp.php', {
        method: 'POST',
        body: new URLSearchParams({ 'resend': '1' }),
        headers: {
          'Content-Type': 'application/x-www-form-urlencoded',
        },
      })
        .then(response => {
          if (response.ok) {
            // Request was successful, you can handle the response here
          } else {
            // Request failed, handle the error
            console.error('Failed to auto-send the "resend" data.');
          }
        })
        .catch(error => {
          console.error('An error occurred:', error);
        });
    <?php } ?>
  });
</script>
  
</body>

</html>