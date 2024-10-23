document.addEventListener("DOMContentLoaded", function () {
  const tabButtons = document.querySelectorAll(".navigation-btn");
  const tabContents = document.querySelectorAll(".tab-content");

  // Function to hide all tab content
  function hideAllTabs() {
    tabContents.forEach((content) => {
      content.classList.remove("active-tab");
      content.style.display = "none"; // Set display to none
    });
    tabButtons.forEach((button) => button.classList.remove("active-link")); // Remove active-link class from all buttons
  }

  // Function to show selected tab content
  function showTab(tabName) {
    const activeContent = document.getElementById(tabName);
    if (activeContent) {
      activeContent.classList.add("active-tab");
      activeContent.style.display = "block"; // Set display to block
    }
  }

  // Add event listeners to each button
  tabButtons.forEach((button) => {
    button.addEventListener("click", function () {
      hideAllTabs(); // Hide all tabs
      this.classList.add("active-link"); // Add active-link class to the clicked button
      const tabName = this.getAttribute("data-tab"); // Get the tab name
      showTab(tabName); // Show the corresponding content
    });
  });

  // Activate the default tab (Description)
  hideAllTabs(); // Hide all tabs initially
  const defaultTabButton = document.getElementById("defaultOpen");
  if (defaultTabButton) {
    defaultTabButton.click(); // Simulate a click to activate the default tab
  }
});
