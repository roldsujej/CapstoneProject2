document.addEventListener("DOMContentLoaded", function () {
  const recordsPerPage = 10; // Set the number of records per page

  // Fetch elements for pagination
  const table = document.querySelector(".applications-table");
  const tableRows = table.getElementsByTagName("tr");
  const totalRecords = tableRows.length - 1; // Excluding the table header row
  const totalPages = Math.ceil(totalRecords / recordsPerPage);

  // Function to show/hide table rows based on the page
  function showPage(page) {
    const start = (page - 1) * recordsPerPage;
    const end = start + recordsPerPage;

    for (let i = 1; i < tableRows.length; i++) {
      if (i > start && i <= end) {
        tableRows[i].style.display = "";
      } else {
        tableRows[i].style.display = "none";
      }
    }
  }

  // Display the first page by default
  showPage(1);

  // Render pagination links
  const paginationContainer = document.querySelector(".pagination");
  for (let i = 1; i <= totalPages; i++) {
    const pageLink = document.createElement("a");
    pageLink.href = `?page=${i}`;
    pageLink.textContent = i;
    pageLink.addEventListener("click", function (event) {
      event.preventDefault();
      showPage(i);
    });
    paginationContainer.appendChild(pageLink);
  }
});
