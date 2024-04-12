<?php
//PAGINATION options
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
//Keyingi bet ikonka
$next_page = $page + 1;
//Oldingi bet ikonka
$previous_page = $page - 1;

//Sorting by title
if (isset($_GET['sort']) && !empty($_GET['sort'])){
    $sort = $_GET['sort'];
    $s_elements = explode(',', $sort);
    $s_title = $s_elements[0];
    $s_type = $s_elements[1];
    $order = $s_title ." ". $s_type;

}
?>

<!--PAGINATION-->
<div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to <?=LIMIT." ";?> of <?php echo getCount("invoice") ?> entries</div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">

            <ul class="pagination">
                <?php if ($previous_page > 0): ?>
                    <li class="paginate_button page-item previous" id="example2_previous">
                        <a href="list-invoice.php?page=<?=$previous_page; ?>" aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span></a>

                    </li>
                <?php endif;?>
                <?php for ($i = 1; $i <= getPageCount("invoice"); $i++): $val_sort = $i; ?>
                    <?php if(!is_null($order)){
                        $val_sort = $i."&"."sort=".$sort;
                    } ?>
                    <li class="paginate_button page-item <?php echo (isset($_GET["page"]) && $_GET["page"] == $i) ? 'active' : ''?>">
                        <a href="list-invoice.php?page=<?=$val_sort;?>" aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link"><?=$i;?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($next_page <= getPageCount("invoice")):?>
                    <li class="paginate_button page-item next" id="example2_next">
                        <a href="list-invoice.php?page=<?=$next_page; ?>" aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span></a>

                    </li>
                <?php endif;?>
            </ul>

        </div>
    </div>
</div>

<!--PAGINATION-->
