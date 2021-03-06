<?php slot('title', $category) ?>
<div class="row">
  <?php foreach ($category->getItemFromCategory() as $key => $item): ?>
    <div class='col-xs-4'>
      <div class='item text-center'>
        <h3 class='item_name'><?php echo $item->getTitle() ?></h3>
        <img class='item_image' src="/<?php echo sfConfig::get('sf_upload_dir_name').'/items/1.jpg' ?>" alt='item'>
        <p class='price'>Price: <?php echo $item->getPrice() ?> $</p>
        <input type='hidden' name='id' value="'". <?php echo $item->getId() ?> ."'">
        <a class='btn btn-primary buttonInfo' href="<?php echo url_for('show_item', $item); ?>">More info</a>          
      </div>
    </div>
  <?php endforeach; ?>
</div>