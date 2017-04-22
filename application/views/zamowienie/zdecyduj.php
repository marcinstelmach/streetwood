<div style="margin-top: 20px;">
        <div class="col-md-4 zdecyduj-cont">
        <h1 style="font-weight: bold;">Zaloguj się</h1>
        <?php 

      if(isset ($komunikat))  
        echo $komunikat; 

          $attributes = array('class' => 'form-horizontal');
          echo form_open('uzytkownik/zaloguj', $attributes);
        ?>
              <div class="form-group">
                <label for="login" class="col-sm-3">Login</label>
                <div class="col-sm-11">
                  <input type="text" class="form-control" id="login" placeholder="Login" name="login" required>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('login')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="haslo" class="col-sm-3">Haslo</label>
                <div class="col-sm-11">
                  <input type="password" class="form-control" id="haslo" placeholder="Hasło" name="haslo" required>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('haslo')."</div>"; ?>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-zdecyduj">Zaloguj</button>
                </div>
              </div>
            </form>
        </div>
        <div class="col-md-4 col-md-offset-1">
            <h1 style="font-weight: bold;">Lub kupuj bez rejestracji</h1>
            <?php
          $attributes = array('class' => 'form-horizontal');
          echo form_open('zamowienie/bez-rejestracji', $attributes);
        ?>
              <div class="form-group">
                <label for="imie" class="col-sm-3">Imie</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="imie" placeholder="Imie" name="imie" required>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('imie')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="nazwisko" class="col-sm-3">Nazwisko</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="nazwisko" placeholder="Nazwisko" name="nazwisko" required>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('nazwisko')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('email')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="telefon" class="col-sm-3">Telefon</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="telefon" placeholder="Telefon" name="telefon" max="9" required>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('telefon')."</div>"; ?>
              </div>
              
              <div class="form-group">
                <div class="col-sm-10">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="regulamin" required> Akcjeptuje regulamin
                    </label>
                  </div>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('regulamin')."</div>"; ?>
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-zdecyduj" >Przejdź dalej</button>
                </div>
              </div>
            </form>

        </div>
        


</div>
</div>
</div>