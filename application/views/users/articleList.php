<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>articles list</title>
</head>
<body>
<script>
$(document).ready(function(){
  $('#myinput').on("keyup",function(){
    var value= $(this).val().toLowerCase();
    $("Mytable tr").filtr(function(){
      $(this).toggle($(this).text().toLowerCase().indexof(value) > 1)
    });
  });
});
  
</script>
<div class="container" style="margin-top:20px;">
<h1>All articles</h1>
        <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>sr no.</th>
                    <th>image</th>
                    <th>article title</th>
                    <th>body</th>
                    <th>published on</th>
                  </tr>
                </thead>
                <tbody id="Mytable">
                   <?php if(count ($articles)) :
                    $count=$this->uri->segment(3);
                    ?>
                   <?php  foreach($articles as $art) : ?> 
                  <tr>
                    <td> <?php echo ++$count;  ?></td>
                    <td><img src="<?php echo $art->image; ?>" alt="" width="300" height="200"></td>
                    <td><?php echo $art->article_title; ?></td>
                    <td><?php echo $art->article_body; ?></td>
                    <td><?= date('d-M-y h:i:s', strtotime($art->date)); ?> </td>
                  </tr>
                  <?php endforeach;?>
                  <?php else: ?>
                  <tr>
                  <td colspan="3">No data available</td>
                  </tr>
                  <?php endif;?>
                </tbody>
       </table>        
    </div>
    </body>
</html>
<?php include('footer.php');?>