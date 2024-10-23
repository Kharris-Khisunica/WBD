<?php if (!empty($jobs)): ?>
    <?php foreach ($jobs as $key => $job): ?>

        <?php require __DIR__ . '/job-card.php'; ?>

        <div class="separator"></div>

    <?php endforeach; ?>
<?php else: ?>
    <li class="not-found">No jobs found.</li>
<?php endif; ?>
<?php require __DIR__ . '/pagination.php'; ?>