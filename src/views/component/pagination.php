<?php
$totalPages ??= 1;
$currentPage = isset($_GET['page']) ? (int) $_GET['page'] <= $totalPages ? (int) $_GET['page'] : 1 : 1;

$startPage = max(1, $currentPage - 1);
$endPage = min($totalPages, $currentPage + 1);
?>

<div class="pagination-container">
    <ul class="pagination">
        <?php if ($currentPage > 1): ?>
            <li>
                <button type="button" name="page" value="1" class="first-button" id="first">
                    << </button>
            </li>
        <?php else: ?>
        <?php endif; ?>
        <?php for ($page = $startPage; $page <= $endPage; $page++): ?>
            <?php if ($page == $currentPage): ?>
                <button type="button" name="page" value="<?php echo $page; ?>" class="page-number active">
                    <?php echo $page; ?></button>

            <?php else: ?>
                <li>
                    <button type="button" name="page" value="<?php echo $page; ?>"
                        class="page-number"><?php echo $page; ?></button>
                </li>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if ($currentPage < $totalPages): ?>
            <li>
                <button type="button" name="page" value="<?php echo $totalPages; ?>" class="last-button"
                    id="last">>></button>
            </li>
        <?php endif; ?>
    </ul>

</div>