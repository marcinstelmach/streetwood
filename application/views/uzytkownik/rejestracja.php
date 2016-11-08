<div class="row">
  </div>
      <div class="row">
        <div class="col-md-offset-1 col-md-6">
          <h1>Rejestracja</h1>
        </div>
        <div class="col-md-6">
        <?php
          $attributes = array('class' => 'form-horizontal');
          echo form_open('', $attributes);
        ?>
              <div class="form-group">
                <label for="imie" class="col-sm-3 control-label">Imie</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="imie" placeholder="Imie" name="imie">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('imie')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="nazwisko" class="col-sm-3 control-label">Nazwisko</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nazwisko" placeholder="Nazwisko" name="nazwisko">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('nazwisko')."</div>"; ?>
              </div>
              <div class="form-group">
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
                <label for="haslo2" class="col-sm-3 control-label">Powtórz hasło</label>
                <div class="col-sm-5">
                  <input type="password" class="form-control" id="haslo2" placeholder="Powtórz hasło" name="haslo2">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('haslo2')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('email')."</div>"; ?>
              </div>

              <div class="form-group">
                <label for="telefon" class="col-sm-3 control-label">Telefon</label>
                <div class="col-sm-5">
                  <input type="tel" class="form-control" id="telefon" placeholder="Telefon" name="telefon" max="9">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('telefon')."</div>"; ?>
              </div>
              
              <div class="form-group">
                <div class="col-sm-offset-3 col-sm-5">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="regulamin"> Akcjeptuje regulamin
                    </label>
                  </div>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('regulamin')."</div>"; ?>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-danger">Załóż konto</button>
                </div>
              </div>
            </form>
        </div>
        <div class="col-md-5 col-md-offset-1">
          <img src="<?php echo base_url(); ?>assets/img/1.jpg" class="img-responsive center-block" alt="Logo">
        </div>
      </div>
      
    </div>