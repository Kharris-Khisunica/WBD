<div class="form-container">
    <h2>Add Job Listing</h2>
    <form action="#" method="post">
        <div class="input-container">

            <label for="name">Name</label>
            <input type="text" id="name" name="name" required><br><br>
        </div>

        <div class="row-container" id="select-options">
            <div class="input-container">
                <label for="job-type">Job Type</label>
                <select id="job-type" name="job-type" required>
                    <option value="" class="text-muted" disabled selected hidden>Select job type</option>
                    <option value="fulltime">Full Time</option>
                    <option value="parttime">Part Time</option>
                    <option value="internship">Internship</option>
                </select><br><br>
            </div>
            <div class="input-container">
                <label for="job-location">Location</label>
                <select id="job-location" name="job-location" required>
                    <option value="" class="text-muted" selected hidden>Select job location</option>
                    <option value="onsite">Onsite</option>
                    <option value="hybid">Hybrid</option>
                    <option value="remote">Remote</option>
                </select><br><br>
            </div>
        </div>

        <div class="input-container">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" required><br><br>
        </div>

        <div class="row-container" id="buttons">
            <button class="green-btn" type="submit">Submit</button>
            <button class="green-outline-btn" type="button">Cancel</button>
        </div>
    </form>
    </form>
</div>