<style>
     .success {
    color: #3c763d; 
    background: #dff0d8; 
    border: 1px solid #3c763d;
    margin-bottom: 20px;
  }
</style>


<?php  if (count($success) > 0) : ?>
    <div class="success">
        <?php foreach ($success as $success) : ?>
          <p><?php echo $success ?></p>
        <?php endforeach ?>
    </div>
  <?php  endif ?>