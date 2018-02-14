<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div class="container">
      <div class="header">
        <div class="row">
          <div class="col-md-6">
            <a href="<?php echo url_for('@homepage'); ?>">
              <h2>Shop</h2>
            </a>
            <div id="custom-search-input">
              <div class="input-group col-md-12">
                <input type="text" class="form-control input-lg" placeholder="Name goods" />
                <span class="input-group-btn">
                  <button class="btn btn-info btn-lg" type="button">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="menu">
        <a href="<?php echo url_for('@item_new') ?>">Add new goods</a>
      </div>

      <div class="content">
        <h1 class="text-center"><?php echo get_slot('title'); ?></h1>
        <div class="row">
          <div class="col-md-3 categories">
            <h3>Category:</h3>
            <ul class="category">
              <?php foreach (get_slot('categories') as $category) : ?>
                <li><a href="<?php echo url_for('category/show?id='.$category->getId()) ?>"><?php echo $category->getName(); ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>  
          <div class="col-md-9 content-goods">
            <?php echo $sf_content ?>
          </div>         
        </div>
      </div>

  </div>
  </body>
</html>
