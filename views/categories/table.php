<?php
/**
 * table.php renders a table showing categories
 * 
 * $this references categoriesController
 * $data references an array of categories models
 * 
 */
?>
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>Description</th>
      <th style="width:70px">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php if (count($data) == 0): //if no data is passed, notify the user ?>
      <tr>
        <td colspan="4">No results to display</td>
      </tr>
    <?php else: //otherwise iterate through models and display ?>
      <?php foreach ($data as $row):?>
        <tr>
          <td class="itemName"><?php echo $row->name?></td>
          <td><?php echo $row->description?></td>
          <td><a href="<?php echo HTMLROOT?>categories/view/<?php echo $row->id?>"><i class="icon-search"></i></a>
          &nbsp;
          <a href="<?php echo HTMLROOT?>categories/edit/<?php echo $row->id?>"><i class="icon-pencil"></i></a>
          &nbsp;
          <a href="<?php echo HTMLROOT?>categories/delete/<?php echo $row->id?>" class="delete"><i class="icon-trash"></i></a>
       	</tr>
      <?php endforeach;?>
    <?php endif;?>
  </tbody>
</table>