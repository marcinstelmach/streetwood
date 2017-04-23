       <div class="row">
      <div class="col-md-6">
          <h1>Podaj adres dostawy</h1>
            <?php
            $attributes = array('class' => 'form-horizontal');
            echo form_open('', $attributes);
            ?>
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
          </form>
        </div>
          
      </div>
      
    </div>
       </div>