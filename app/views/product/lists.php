<?php
/**
 *@var $list controllers\ProductsController
 *@var $getId controllers\ProductsController
 *@var $sortAttr controllers\ProductsController
 *@var $offset controllers\ProductsController
 *@var $pagination controllers\ProductsController
 * @var $columnName controllers\ProductsController
 */

$s_type = $sortAttr;
?>
<div class="card-header-tabs">
    <div class="btn btn-group">
        <p> <a href="/products/add" class="left btn btn-success">ADD product</a></p>
    </div>
</div>
<div class="dataTables_info" id="example2_info" role="status" aria-live="polite"><p>Showing <?=($offset == 0) ? 1 : $offset;?> to <b><?=count($list);?></b> of <b><?=$total;?></b> entries</p></div>
            <div class="card">
<pre>
    <?php print_r($columnName) ?>
</pre>
                <div class="card-header">

                    <h3 class="card-title">Products list</h3>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table">
                                <thead class="table-light">
                                <tr>
                                    <th scope="col">ID
                                        <?php if (!empty($s_type) &&  $s_type == 'asc'): ?>
                                            <a href="/products/lists?sort=productCode,desc">
                                                <i class="bi bi-sort-alpha-down-alt"></i>
                                            </a>
                                        <?php elseif (!empty($s_type) &&  $s_type == 'desc'): ?>
                                            <a href="/products/lists?sort=productCode,asc">
                                                <i class="bi bi-sort-alpha-up-alt"></i>
                                            </a>
                                        <?php else:?>
                                            <a href="/products/lists?sort=productCode,asc">
                                                <i class="bi bi-sort-alpha-down-alt"></i>
                                            </a>
                                        <?php endif; ?>
                                    </th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">QTY</th>
                                    <th >Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($list as $item):?>
                                    <tr>
                                        <td><?=$item->productCode?></td>
                                        <td><?=$item->productName?></td>
                                        <td><?=$item->productLine?></td>
                                        <td><?=$item->quantityInStock?></td>
                                        <td>
                                            <a href="/products/update?id=<?=$item->productCode;?>">
                                                <i class="bi bi-pencil-square"></i></a>
                                            <a class="delete" name="del_item" href="/products/delete?id=<?=$item->productCode;?>&del=del-item">
                                                <i class="bi bi-trash-fill"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <!--PAGINATION-->
                    <div class="row">
                        <div class="col-sm-12 col-md-5">

                        </div>
                        <div class="col-sm-12 col-md-7">
                            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                <div class="text-center">
                                    <?php if ($pagination->countPages >1): ?>
                                        <?=$pagination;?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--PAGINATION-->
                </div>
            </div>
