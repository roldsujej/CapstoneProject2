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
