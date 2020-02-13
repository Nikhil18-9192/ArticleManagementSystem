<?php include("header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin dashboard</title>
</head>
<body>
  <div class="container" style="margin-top:20px;">
    <div class="row">
    
        <a href="adduser" class="btn btn-lg btn-primary" >add article</a>

    </div>
  </div>
  <div class="container" style="margin-top:20px;">
  <?php if($alert=$this->session->flashdata('msg')):
    $msg_class=$this->session->flashdata('msg_class');
    ?>
   
    <div class="row">
    <div class="col-lg-6">
      <div class="alert <?= $msg_class ?>">
        <?php echo $alert ?>
      </div>
    </div>
    </div>
    <?php endif; ?>
</div>
<div class="container" style="margin-top:20px;">
        <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>sr no.</th>
                    <th>Article title</th>
                    <th>Body</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                   <?php if(count ((array)$articles)) :
                    $count=$this->uri->segment(3); ?>
                   <?php foreach($articles as $art) : 
                    
                    ?> 
                  <tr>
                    <td><?php echo ++$count; ?></td>
                    <td><?php echo $art->article_title; ?></td>
                    <td><?php echo $art->article_body; ?></td>
                    <td> <?=
                      form_open('admin/editarticle'),
                      form_hidden('id',$art->id),
                      form_submit(['name'=>'submit','value'=>'Edit','class'=>'btn btn-primary']),
                      form_close();

                    ?></td>
                    <td> 
                    <?=
                      form_open('admin/delarticle'),
                      form_hidden('id',$art->id),
                      form_submit(['name'=>'submit','value'=>'Delete','class'=>'btn btn-danger']),
                      form_close();

                    ?>
                      </td> 
                  </tr>
                  <?php endforeach;?>
                  <?php else: ?>
                  <tr>
                  <td colspan="5">No data available</td>
                  </tr>
                  <?php endif;?>
                  <?= $this->pagination->create_links(); ?>
                </tbody>
                </table>
    </div>
</body>
</html>
<?php include("footer.php");?>