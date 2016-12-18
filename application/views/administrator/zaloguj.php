        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Zaloguj</h1>
        <?php
          $attributes = array('class' => 'form-horizontal');
          echo form_open('', $attributes);
        ?>
              <div class="form-group">
                <?php 
                 if(isset ($komunikat))  
                  echo $komunikat; 
      ?>
                <label for="login" class="col-sm-3 control-label">Login</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="login" placeholder="Login" name="login">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('login')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="haslo" class="col-sm-3 control-label">Haslo</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" id="haslo" placeholder="Hasło" name="haslo">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('haslo')."</div>"; ?>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Zaloguj</button>
                </div>
              </div>
            </form>
          </div>
          </div>
      </div>
    </div>
