<?php include('header.php'); ?>
<div class="container">

  <fieldset>
    <legend>Add article</legend>
    
   <?php echo form_open("admin/updatarticle/{$article->id} ");?>
    <div class="row">
    	<div class="col-lg-6">
    <div class="form-group">
      <label for="title">article title</label>
       <?php echo form_input (['class'=>'form-control','name'=>'article_title','placeholder'=>'article title','value'=>set_value('article_title',$article->article_title)]); ?>
    </div>
     </div>
     <div class="col-lg-6" style="margin-top: 40px;">
     	<?php echo form_error('article_title'); ?>
     </div>
 </div>
 <div class="row">
     <div class="col-lg-6">
    <div class="form-group">
      <label for="body">article body</label>
       
      <?php echo form_textarea(['class'=>'form-control','name'=>'article_body','placeholder'=>'article body','value'=>set_value('article_body',$article->article_body)]);  ?>
    </div>
</div>
<div class="col-lg-6" style="margin-top: 40px;">
     	<?php echo form_error('article_body'); ?>
     </div>
</div>
    
    </fieldset>
    <?php echo form_submit(['type'=>'submit','class'=>'btn btn-primary','value'=>'submit']) ?>
     
   <?php echo form_reset(['type'=>'reset','class'=>'btn btn-secondary','value'=>'reset']) ?>
  </fieldset>
 </div>
<?php include('footer.php');?>