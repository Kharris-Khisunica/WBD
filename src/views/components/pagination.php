<?php

$currentPage = $data['currentPage'];
$result_per_page =(int)$data['pageSize'];
$data_ammount = $data['count'];
$number_of_page = ceil($data_ammount/$result_per_page);
$buttonToShow = 5;

$startPage = max(1, $currentPage - floor($buttonToShow/2))
$endPage = min($totalPages, $currentPage + floor($buttonToShow/2))


$button_str = '<div class="pagination-container">';

// Display Prev
if ($currentPage >= 2){
    $prevPage = $currentPage - 1;
    $button_str .= '<button class="pagination-button" onclick="handlePageChange('.$prevPage.')"> &larr; </button>';
}

// Generate page number dynamically
for ($i = $startPage; $i <= $endPage; $i++) {
    $buttonClass = $i == $currentPage ? 'pagination-button active' : 'pagination-button';
    $str .= '<button class="' . $buttonClass . '" onclick="handlePageChange(' . $i . ')">' . $i . '</button>';
}

// Display Next
if ($currentPage < $endPage){
    $nextPage = $currentPage+1;
    $button_str .= '<button class="pagination-button" onclick="handlePageChange('.$nextPage.')"> &rarr; </button>';
}


$button_str .= '</div>';

echo $button_str;
?>