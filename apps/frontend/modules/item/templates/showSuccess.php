<?php slot('title', $item->getTitle()) ?>

<div class="row">
  <div class="col-md-8 item-detail">
    <h4><?php echo $item->getDescription() ?></h4>
    <strong>
      Price: <?php echo $item->getPrice() ?> $<br>
      Email: <?php echo $item->getEmail() ?>
    </strong>
  </div>
  <div class="col-md-4">
    <img class="item_image_detail" src="/<?php echo sfConfig::get('sf_upload_dir_name').$item->getImages() ?> " alt="">
  </div>

</div>



<hr />

<a href="<?php echo url_for('item/edit?id='.$item->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('item/index') ?>">List</a>
