<div class="row">
  <div class="col-md-offset-1 col-md-6">
  Wybierz zdjęcia
</div>
<div class="row">
  <div class="col-md-offset-1 col-md-5">
   <?php 
    $attributes = array('class' => 'form-horizontal');
    echo form_open_multipart('administrator/do_upload');?>
      <div class="form-group">
      
        <div class="col-sm-8">
          <input type="file" name="userfile" size="20" />
          <p class="help-block"><?php echo $error; ?></p>
          <br />
        </div>                 
        <div class="col-sm-5">
          <input type="submit" value="upload" class="btn btn-danger"/>
        </div>
      </div>
    </form>
    <?php echo "<div class='bladwalidacji'>".$error."</div>"; ?>
  </div>
</div>
<Br />