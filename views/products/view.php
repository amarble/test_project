<?php

$this->title="Test Project | Product | Details"

?>
<h3>Product Details</h3>
<div class="row">
  <div class="span3">
    <p class="text-right">
      <strong>Name</strong>
    </p>
  </div>
  <div class="span9">
    <p class="text-left">
      <?php echo $model->name?>
    </p>
  </div>
</div>
<div class="row">
  <div class="span3">
    <p class="text-right">
      <strong>Description</strong>
    </p>
  </div>
  <div class="span9">
    <p class="text-left">
      <?php echo $model->description?>
    </p>
  </div>
</div>
<div class="row">
  <div class="span3">
    <p class="text-right">
      <strong>Category</strong>
    </p>
  </div>
  <div class="span9">
    <p class="text-left">
      <?php echo $model->category->name?>
    </p>
  </div>
</div>
<div class="row">
  <div class="span3">
    <p class="text-right">
      <strong>Price</strong>
    </p>
  </div>
  <div class="span9">
    <p class="text-left">
      <?php setlocale(LC_MONETARY, 'en_US');?>
      <?php echo money_format('%n', $model->price);?>
    </p>
  </div>
</div>
<div class="row">
  <div class="span3">
    <p class="text-right">
      <strong>Created</strong>
    </p>
  </div>
  <div class="span9">
    <p class="text-left">
      <?php echo date('D, d M Y H:i:s', strtotime($model->created));?>
    </p>
  </div>
</div>
<div class="row">
  <div class="span3">
    <p class="text-right">
      <strong>Last modified</strong>
    </p>
  </div>
  <div class="span9">
    <p class="text-left">
      <?php echo date('D, d M Y H:i:s', strtotime($model->modified));?>
    </p>
  </div>
</div>
<div class="row">
  <a href="<?php echo HTMLROOT?>products/edit/<?php echo $model->id?>" class="btn btn-info pull-right span2">Edit</a>
  <a href="#" class="btn btn-danger pull-right span2" data-toggle="modal" data-target="#deleteBox">Delete</a>
</div>
<div id="deleteBox" class="modal hide fade" tabindex="-1" role="dialog">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h3 id="deleteBoxLabel">Confirm deletion</h3>
  </div>
  <div class="modal-body">
    <p>Are you sure you want to delete this item?</p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal">Cancel</button>
    <a class="btn btn-danger btnConfirmDelete" href="<?php echo HTMLROOT?>products/delete/<?php echo $model->id?>">Delete</a>
  </div>
</div>