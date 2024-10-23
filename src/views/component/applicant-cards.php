<?php if (!empty($applicants)): ?>
    <?php foreach ($applicants as $key => $applicant): ?>

        <?php require __DIR__ . '/applicant-card.php'; ?>
    <?php endforeach; ?>
<?php else: ?>
    <li class="not-found">No jobs found.</li>
<?php endif; ?>