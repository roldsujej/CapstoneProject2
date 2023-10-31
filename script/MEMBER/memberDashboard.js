const navigation = document.querySelector(".navigation");
const toggleButton = document.querySelector(".toggle");
const main = document.querySelector(".main");

document.addEventListener("DOMContentLoaded", function () {
  const userIcon = document.getElementById("userIcon");
  const dropdownContent = document.getElementById("dropdownContent");

  userIcon.addEventListener("click", function (event) {
    dropdownContent.classList.toggle("show");
    event.stopPropagation();
  });

  document.addEventListener("click", function (event) {
    const isClickInsideDropdown = dropdownContent.contains(event.target);
    const isClickUserIcon = event.target === userIcon;

    if (!isClickInsideDropdown && !isClickUserIcon) {
      dropdownContent.classList.remove("show");
    }
  });
});

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
