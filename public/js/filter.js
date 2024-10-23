function debounce(func, delay) {
  let timeout;
  return function (...args) {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
      func.apply(this, args);
    }, delay);
  };
}

function updateUrl(params) {
  history.pushState(null, "", `?${params.toString()}`);
}

function toggleFilter(filterId) {
  const filterOptions = document.getElementById(filterId);
  filterOptions.classList.toggle("hidden");
}

const debouncedSendOptions = debounce(sendOptions, 500);
function sendOptions(page = 1) {
  const jobTypes = Array.from(
    document.querySelectorAll('input[name="job-type"]:checked')
  ).map((el) => el.value);
  const locationTypes = Array.from(
    document.querySelectorAll('input[name="location-type"]:checked')
  ).map((el) => el.value);
  const sort = document.querySelector('input[name="sort"]:checked')
    ? document.querySelector('input[name="sort"]:checked').value
    : null;

  const search = document.getElementById("searchInput").value;

  const params = new URLSearchParams({
    jobTypes: jobTypes.join(","),
    locationTypes: locationTypes.join(","),
    sort,
    search,
    page: typeof page == "number" ? page : 1,
  });

  updateUrl(params);
  sendRequest(`/home/data?${params.toString()}`, updateJobListings);
}

function sendRequest(url, callback) {
  const xhr = new XMLHttpRequest();
  xhr.open("GET", url, true);
  xhr.setRequestHeader("Accept", "application/json");

  xhr.onload = function () {
    if (xhr.status >= 200 && xhr.status < 300) {
      const response = JSON.parse(xhr.responseText);
      // Call the callback function with the response data
      callback(response);
    } else {
      console.error("Error:", xhr.statusText);
    }
  };

  xhr.send();
}

function updateJobListings(data) {
  const jobList = document.querySelector(".pagination-cards");
  jobList.innerHTML = data.jobs
    ? data.jobs
    : '<li class="not-found">No jobs found.</li>';

  initializePaginationButtons();
}

function handlePagination(button) {
  const currentPage = document.querySelector(".page-number.active");
  if (currentPage) {
    currentPage.classList.remove("active");
  }
  button.classList.add("active");

  const page = Number(button.value); 
  sendOptions(page); 
}


function sortSendRequest() {
  sendOptions(Number(document.querySelector(".page-number.active").value));
}


function initializePaginationButtons() {
  const paginationButtons = document.getElementsByName("page");
  paginationButtons.forEach((button) =>
    button.addEventListener("click", function () {
      handlePagination(button);
    })
  );
}

function toggleCheckbox(checkbox) {
  const checkboxes = document.querySelectorAll('input[name="sort"]');

  if (checkbox.checked) {
    checkboxes.forEach((cb) => {
      if (cb !== checkbox) {
        cb.checked = false;
      }
    });
  }

  sortSendRequest();
}


document.addEventListener("DOMContentLoaded", function () {
  initializePaginationButtons();

  const sortCheckboxes = document.querySelectorAll('input[name="sort"]');
  sortCheckboxes.forEach((checkbox) =>
    checkbox.addEventListener("change", () => toggleCheckbox(checkbox))
  );

  const debouncedSearch = debounce(sendOptions, 500);
  document
    .getElementById("searchInput")
    .addEventListener("input", debouncedSearch);
});
