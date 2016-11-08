        <div class="col-md-6">
          <h3>Podaj tylko te dane, które chcesz zmienic</h3>
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
                <label for="telefon" class="col-sm-3 control-label">Telefon</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" id="telefon" placeholder="Telefon" name="telefon" max="999999999" min="111111111">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('telefon')."</div>"; ?>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-default">Modyfikuj</button>
                </div>
              </div>
            </form>
        </div>
      </div>
      
    </div>