       <div class="row">

         <?php
          $attributes = array('class' => 'form-horizontal');
          echo form_open('', $attributes);
        ?>
        <div class="col-md-6">
          <h1>Podaj adres dostawy</h1>
              <div class="form-group">
                <label for="ulica" class="col-sm-3 control-label">Ulica</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="ulica" placeholder="Ulica" name="ulica">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('ulica')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="nr_domu" class="col-sm-3 control-label">Nr domu</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nr_domu" placeholder="Nr_domu" name="nr_domu">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('nr_domu')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="miasto" class="col-sm-3 control-label">Miasto</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="miasto" placeholder="Miasto" name="miasto">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('miasto')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="kod_pocztowy" class="col-sm-3 control-label">Kod pocztowy</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="kod_pocztowy" placeholder="Kod pocztowy" name="kod_pocztowy">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('kod_pocztowy')."</div>"; ?>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-danger">Zamawiam !</button>
                </div>
              </div>
        </div>



        <!--
        <div class="col-md-6">
            <h1>Podaj swoje dane</h1>
            <?php 
              foreach ($dane as $key):
             ?>
          <div class="form-group">
                <label for="imie" class="col-sm-3 control-label">Imie</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="imie"  name="imie" value="<?php echo $key->imie; ?>" />
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('imie')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="nazwisko" class="col-sm-3 control-label">Nazwisko</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nazwisko" value="<?php echo $key->nazwisko; ?>" name="nazwisko" />
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('nazwisko')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="email" name="email" value="<?php echo $key->email; ?>" />
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('email')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="telefon" class="col-sm-3 control-label">Telefon</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="telefon" name="telefon" value="<?php echo $key->telefon; ?>" />
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('telefon')."</div>"; ?>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-6 col-sm-10">
                  <button type="submit" class="btn btn-danger">Zamawiam !</button>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            -->
          </form>
      </div>
      
    </div>