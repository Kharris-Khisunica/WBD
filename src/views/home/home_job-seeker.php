<section class="column-section-three">
    <article>Left
        <div class="profile-card">
            <div class="about-profile">
                <div class="header-wrapper">
                    <img src="/public/asset/header-bg.png" alt="header" class="header-photo">
                    <img src="/public/asset/default-profile.png" alt="profile" class="profile-pic">
                </div>
                <div class="body-wrapper">
                    <h3 class="text-black">Angelica Kierra Ninta Gurning</h3>
                    <p class="text-muted">Undergraduate Student at School of Electrical Engineering and Informatics</p>
                </div>
            </div>
            <div class="additional-wrapper">
                <h5 class="text-black">Skills</h5>
                <p class="text-muted">Design,Sport,KKKKK, Whatevs</p>
            </div>
            <div class="redirect">
                <button class="redirect-btn">
                    <img src="/public/asset/history.png" alt="history" class="btn-icon" />
                    History
                </button>
            </div>
        </div>
    </article>
    <article>middle
        <input type="text" placeholder="Enter text here...">
         <!-- Job Type Filter -->
         <div class="filter-section">
            <h3 class="filter-title" onclick="toggleFilter('jobType', this)">
                Job Type <span class="arrow">▼</span>
            </h3>
            <div id="jobType" class="filter-options">
                <label class="checkbox-container">
                    Full Time
                    <input type="checkbox" name="job-type" value="full-time">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                    Part Time
                    <input type="checkbox" name="job-type" value="part-time">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                    Internship
                    <input type="checkbox" name="job-type" value="internship">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>

        <!-- Location Type Filter -->
        <div class="filter-section">
            <h3 class="filter-title" onclick="toggleFilter('locationType', this)">
                Location Type <span class="arrow">▼</span>
            </h3>
            <div id="locationType" class="filter-options">
                <label class="checkbox-container">
                    On Site
                    <input type="checkbox" name="location-type" value="on-site">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                    Remote
                    <input type="checkbox" name="location-type" value="remote">
                    <span class="checkmark"></span>
                </label>
                <label class="checkbox-container">
                    Hybrid
                    <input type="checkbox" name="location-type" value="hybrid">
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>

        <!-- Sort Options -->
        <div class="filter-section">
            <h3 class="filter-title" onclick="toggleFilter('sortOptions', this)">
                Sort By <span class="arrow">▼</span>
            </h3>
            <div id="sortOptions" class="filter-options">
                <label class="radio-container">
                    Latest
                    <input type="radio" name="sort" value="latest" required>
                    <span class="checkmark"></span>
                </label>
                <label class="radio-container">
                    Oldest
                    <input type="radio" name="sort" value="oldest" required>
                    <span class="checkmark"></span>
                </label>
            </div>
        </div>
    </div>

        <a href="/hello" class="job-card">
            <div class="obj-wrapper">
                <div class="job-logo-container">
                    <img src="/public/asset/default-job.png" alt="job-logo" class="job-logo">
                </div>
                <div class="job-desc-container">
                    <h4 class="text-green">QA engineer (Intern)</h4>
                    <h5 class="text-black">Google Inc.</h5>
                    <h5 class="text-muted">Bandung,Jawa Barat (Remote)</h5>
                </div>
            </div>
            <button class="apply-btn orange-btn">
                <svg width="19" height="26" viewBox="0 0 19 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="3.66095" width="18.9655" height="18.9655" rx="2.78905" fill="white" />
                    <path d="M3.01962 18.5V9.64645H5.64355V18.5h4.01962ZM4.32266 8.34341C3.88236 8.34341 3.52537 8.21846 3.25167 7.96856C2.97797 7.71866 2.84112 7.38546 2.84112 6.96896C2.84112 6.55247 2.97797 6.21927 3.25167 5.96937C3.52537 5.71947 3.88236 5.59452 4.32266 5.59452C4.76296 5.59452 5.11996 5.71947 5.39366 5.96937C5.66735 6.21927 5.8042 6.55247 5.8042 6.96896C5.8042 7.38546 5.66735 7.71866 5.39366 7.96856C5.11996 8.21846 4.76296 8.34341 4.32266 8.34341ZM7.95274 18.5V9.64645H10.0947L10.2732 10.771H10.3446C10.7135 10.4021 11.13 10.0867 11.5941 9.82495C12.0582 9.56315 12.5878 9.43225 13.1828 9.43225C14.1586 9.43225 14.8607 9.75355 15.2891 10.3961C15.7175 11.0268 15.9317 11.8955 15.9317 13.0022V18.5H13.3077V13.3414C13.3077 12.6988 13.2185 12.2585 13.04 12.0205C12.8734 11.7825 12.5997 11.6635 12.2189 11.6635C11.8857 11.6635 11.6001 11.7408 11.3621 11.8955C11.1241 12.0383 10.8623 12.2466 10.5767 12.5203V18.5H7.95274Z" fill="#F88103" />
                </svg>
                Easy Apply
            </button>
        </a>
        <a href="/hello" class="job-card">
            <div class="obj-wrapper">
                <div class="job-logo-container">
                    <img src="/public/asset/default-job.png" alt="job-logo" class="job-logo">
                </div>
                <div class="job-desc-container">
                    <h4 class="text-green">QA engineer (Intern)</h4>
                    <h5 class="text-black">Google Inc.</h5>
                    <h5 class="text-muted">Bandung,Jawa Barat (Remote)</h5>
                </div>
            </div>
            <button class="apply-btn orange-btn">
                <svg width="19" height="26" viewBox="0 0 19 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="3.66095" width="18.9655" height="18.9655" rx="2.78905" fill="white" />
                    <path d="M3.01962 18.5V9.64645H5.64355V18.5h4.01962ZM4.32266 8.34341C3.88236 8.34341 3.52537 8.21846 3.25167 7.96856C2.97797 7.71866 2.84112 7.38546 2.84112 6.96896C2.84112 6.55247 2.97797 6.21927 3.25167 5.96937C3.52537 5.71947 3.88236 5.59452 4.32266 5.59452C4.76296 5.59452 5.11996 5.71947 5.39366 5.96937C5.66735 6.21927 5.8042 6.55247 5.8042 6.96896C5.8042 7.38546 5.66735 7.71866 5.39366 7.96856C5.11996 8.21846 4.76296 8.34341 4.32266 8.34341ZM7.95274 18.5V9.64645H10.0947L10.2732 10.771H10.3446C10.7135 10.4021 11.13 10.0867 11.5941 9.82495C12.0582 9.56315 12.5878 9.43225 13.1828 9.43225C14.1586 9.43225 14.8607 9.75355 15.2891 10.3961C15.7175 11.0268 15.9317 11.8955 15.9317 13.0022V18.5H13.3077V13.3414C13.3077 12.6988 13.2185 12.2585 13.04 12.0205C12.8734 11.7825 12.5997 11.6635 12.2189 11.6635C11.8857 11.6635 11.6001 11.7408 11.3621 11.8955C11.1241 12.0383 10.8623 12.2466 10.5767 12.5203V18.5H7.95274Z" fill="#F88103" />
                </svg>
                Easy Apply
            </button>
        </a>
        <a href="/hello" class="job-card">
            <div class="obj-wrapper">
                <div class="job-logo-container">
                    <img src="/public/asset/default-job.png" alt="job-logo" class="job-logo">
                </div>
                <div class="job-desc-container">
                    <h4 class="text-green">QA engineer (Intern)</h4>
                    <h5 class="text-black">Google Inc.</h5>
                    <h5 class="text-muted">Bandung,Jawa Barat (Remote)</h5>
                </div>
            </div>
            <button class="apply-btn orange-btn">
                <svg width="19" height="26" viewBox="0 0 19 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect y="3.66095" width="18.9655" height="18.9655" rx="2.78905" fill="white" />
                    <path d="M3.01962 18.5V9.64645H5.64355V18.5h4.01962ZM4.32266 8.34341C3.88236 8.34341 3.52537 8.21846 3.25167 7.96856C2.97797 7.71866 2.84112 7.38546 2.84112 6.96896C2.84112 6.55247 2.97797 6.21927 3.25167 5.96937C3.52537 5.71947 3.88236 5.59452 4.32266 5.59452C4.76296 5.59452 5.11996 5.71947 5.39366 5.96937C5.66735 6.21927 5.8042 6.55247 5.8042 6.96896C5.8042 7.38546 5.66735 7.71866 5.39366 7.96856C5.11996 8.21846 4.76296 8.34341 4.32266 8.34341ZM7.95274 18.5V9.64645H10.0947L10.2732 10.771H10.3446C10.7135 10.4021 11.13 10.0867 11.5941 9.82495C12.0582 9.56315 12.5878 9.43225 13.1828 9.43225C14.1586 9.43225 14.8607 9.75355 15.2891 10.3961C15.7175 11.0268 15.9317 11.8955 15.9317 13.0022V18.5H13.3077V13.3414C13.3077 12.6988 13.2185 12.2585 13.04 12.0205C12.8734 11.7825 12.5997 11.6635 12.2189 11.6635C11.8857 11.6635 11.6001 11.7408 11.3621 11.8955C11.1241 12.0383 10.8623 12.2466 10.5767 12.5203V18.5H7.95274Z" fill="#F88103" />
                </svg>
                Easy Apply
            </button>
        </a>
    </article>
    <article>
        right
        <div class="recommendation-container">
            <h3>Job Recommendations For You</h3>
            <a href="/hello" class="job-card">
                <div class="obj-wrapper">
                    <div class="job-logo-container">
                        <img src="/public/asset/default-job.png" alt="job-logo" class="job-logo">
                    </div>
                    <div class="job-desc-container">
                        <h4 class="text-green">QA engineer (Intern)</h4>
                        <h5 class="text-black">Google Inc.</h5>
                        <h5 class="text-muted">Bandung,Jawa Barat (Remote)</h5>
                    </div>
                </div>
                <button class="apply-btn orange-btn">
                    <svg width="19" height="26" viewBox="0 0 19 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="3.66095" width="18.9655" height="18.9655" rx="2.78905" fill="white" />
                        <path d="M3.01962 18.5V9.64645H5.64355V18.5h4.01962ZM4.32266 8.34341C3.88236 8.34341 3.52537 8.21846 3.25167 7.96856C2.97797 7.71866 2.84112 7.38546 2.84112 6.96896C2.84112 6.55247 2.97797 6.21927 3.25167 5.96937C3.52537 5.71947 3.88236 5.59452 4.32266 5.59452C4.76296 5.59452 5.11996 5.71947 5.39366 5.96937C5.66735 6.21927 5.8042 6.55247 5.8042 6.96896C5.8042 7.38546 5.66735 7.71866 5.39366 7.96856C5.11996 8.21846 4.76296 8.34341 4.32266 8.34341ZM7.95274 18.5V9.64645H10.0947L10.2732 10.771H10.3446C10.7135 10.4021 11.13 10.0867 11.5941 9.82495C12.0582 9.56315 12.5878 9.43225 13.1828 9.43225C14.1586 9.43225 14.8607 9.75355 15.2891 10.3961C15.7175 11.0268 15.9317 11.8955 15.9317 13.0022V18.5H13.3077V13.3414C13.3077 12.6988 13.2185 12.2585 13.04 12.0205C12.8734 11.7825 12.5997 11.6635 12.2189 11.6635C11.8857 11.6635 11.6001 11.7408 11.3621 11.8955C11.1241 12.0383 10.8623 12.2466 10.5767 12.5203V18.5H7.95274Z" fill="#F88103" />
                    </svg>
                    Easy Apply
                </button>
            </a>
            <a href="/hello" class="job-card">
                <div class="obj-wrapper">
                    <div class="job-logo-container">
                        <img src="/public/asset/default-job.png" alt="job-logo" class="job-logo">
                    </div>
                    <div class="job-desc-container">
                        <h4 class="text-green">QA engineer (Intern)</h4>
                        <h5 class="text-black">Google Inc.</h5>
                        <h5 class="text-muted">Bandung,Jawa Barat (Remote)</h5>
                    </div>
                </div>
                <button class="apply-btn orange-btn">
                    <svg width="19" height="26" viewBox="0 0 19 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect y="3.66095" width="18.9655" height="18.9655" rx="2.78905" fill="white" />
                        <path d="M3.01962 18.5V9.64645H5.64355V18.5h4.01962ZM4.32266 8.34341C3.88236 8.34341 3.52537 8.21846 3.25167 7.96856C2.97797 7.71866 2.84112 7.38546 2.84112 6.96896C2.84112 6.55247 2.97797 6.21927 3.25167 5.96937C3.52537 5.71947 3.88236 5.59452 4.32266 5.59452C4.76296 5.59452 5.11996 5.71947 5.39366 5.96937C5.66735 6.21927 5.8042 6.55247 5.8042 6.96896C5.8042 7.38546 5.66735 7.71866 5.39366 7.96856C5.11996 8.21846 4.76296 8.34341 4.32266 8.34341ZM7.95274 18.5V9.64645H10.0947L10.2732 10.771H10.3446C10.7135 10.4021 11.13 10.0867 11.5941 9.82495C12.0582 9.56315 12.5878 9.43225 13.1828 9.43225C14.1586 9.43225 14.8607 9.75355 15.2891 10.3961C15.7175 11.0268 15.9317 11.8955 15.9317 13.0022V18.5H13.3077V13.3414C13.3077 12.6988 13.2185 12.2585 13.04 12.0205C12.8734 11.7825 12.5997 11.6635 12.2189 11.6635C11.8857 11.6635 11.6001 11.7408 11.3621 11.8955C11.1241 12.0383 10.8623 12.2466 10.5767 12.5203V18.5H7.95274Z" fill="#F88103" />
                    </svg>
                    Easy Apply
                </button>
            </a>
        </div>
    </article>
</section>
<script defer src="/public/js/filter.js"></script>