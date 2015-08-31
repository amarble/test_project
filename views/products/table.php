<?php
?>
<table id="ajaxtable" class="table table-hover table-striped">
  <thead>
    <tr>
      <th class="sortable <?php if ($pagination['sortAttribute'] == 'Name') print $pagination['sortDirection'];?>"><a href="#">Name</a></th>
      <th>Description</th>
      <th class="sortable <?php if ($pagination['sortAttribute'] == 'Price') print $pagination['sortDirection'];?>"><a href="#">Price</a></th>
      <th class="sortable <?php if ($pagination['sortAttribute'] == 'Category') print $pagination['sortDirection'];?>"><a href="#">Category</a></th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php if (count($data) == 0):?>
      <tr>
        <td colspan="5">No results to display</td>
      </tr>
    <?php else:?>
      <?php foreach ($data as $row):?>
        <tr>
          <td class="itemName"><?php echo $row->name?></td>
          <td><?php echo $row->description?></td>
          <?php setlocale(LC_MONETARY, 'en_US'); ?>
          <td><?php echo money_format('%n', $row->price)?></td>
          <td><?php echo $row->category->name?></td>
          <td><a href="<?php echo HTMLROOT?>products/view/<?php echo $row->id?>"><i class="icon-search"></i></a>
          &nbsp;
          <a href="<?php echo HTMLROOT?>products/edit/<?php echo $row->id?>"><i class="icon-pencil"></i></a>
          &nbsp;
          <a href="<?php echo HTMLROOT?>products/delete/<?php echo $row->id?>" class="delete"><i class="icon-trash"></i></a>
       	</tr>
      <?php endforeach;?>
      <tr>
        <td colspan="5">
          <div class="row-fluid">
            <div class="span6">
              <div class="btn-group navigator">
                <?php $totalPages = ceil($pagination['count'] / $pagination['limit'][1]);?>
                <?php $currentPage = 1 + $pagination['limit'][0];?>
                <?php if ($currentPage <= 4):?>
                <?php $startPage = 1;?>
                <?php elseif ($currentPage >= $totalPages - 3):?>
                <?php $startPage = $totalPages - 6;?>
                <?php else:?>
                <?php $startPage = $curentPage - 3;?>
                <?php endif;?>
                <?php $endPage = $startPage + 6;?>
                <?php if ($totalPages < 8) $endPage = $totalPages;?>
                <button class="btn"<?php if ($currentPage == 1) echo " disabled=\"true\"";?> page="1"><i class="icon-fast-backward"></i></button>
                <button class="btn"<?php if ($currentPage == 1) echo " disabled=\"true\"";?> page="<?php echo $currentPage - 1;?>"><i class="icon-backward"></i></button>
                <?php for ($pages = $startPage; $pages <= $endPage; $pages++):?>
                <button class="btn<?php if ($pages == $currentPage) echo " btn-warning";?>" page="<?php echo $pages?>"><?php echo $pages?></button>
                <?php endfor;?>
                <button class="btn"<?php if ($currentPage == $endPage) echo " disabled=\"true\"";?> page="<?php echo $currentPage + 1;?>"><i class="icon-forward"></i></button>
                <button class="btn"<?php if ($currentPage == $endPage) echo " disabled=\"true\"";?> page="<?php echo $totalPages?>"><i class="icon-fast-forward"></i></button>
              </div>
            </div>
            <div class="span3">
              Show <div class="btn-group paginationLimit"> 
              <button class="btn"><?php echo $pagination['limit'][1]?></button>
              <button class="btn dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">5</a></li>
                <li><a href="#">10</a></li>
                <li><a href="#">25</a></li>
              </ul> 
              </div> per page
            </div>
            <div class="span3">Display <div class="btn-group filter">
              <button class="btn"><?php echo $pagination['filter']?></button>
              <button class="btn dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
              </button>
              <ul class="dropdown-menu">
                <li><a href="#">All categories</a></li>
                <?php foreach ($categories as $category):?>
                <li><a href="#"><?php echo $category->name?></a></li>
                <?php endforeach;?>
              </ul>
            </div></div>
          </div>
        </td>
      </tr>
    <?php endif;?>
  </tbody>
</table>