        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Utwórz kategorie</h1>
          <div class="row">
            <div class="col-md-6">
                <h2>Kategorie główna</h2>
              <?php
                $attributes = array('class' => 'form');
                echo form_open('administrator/dodaj-kategorie', $attributes);
                ?>
                    <div class="form-group">
                      <label for="nazwa" class="col-sm-3 control-label">Nazwa</label>
                        <input type="text" class="form-control" id="nazwa" placeholder="Nazwa" name="nazwa">
                      <?php echo "<div class='bladwalidacji'>".form_error('nazwa')."</div>"; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Dodaj kategorie</button>
                    </div>
                </form>
            </div>
                <div class="col-md-6">
                    <h2>Podkategorie</h2>
                    <?php
                    $attributes = array('class' => 'form');
                    echo form_open('administrator/dodaj-pod-kategorie', $attributes);
                    ?>
                    <div class="form-group">
                        <label for="kategoria" class="col-sm-12 control-label">Kategoria główna</label>
                        <select class="form-control" id="kategoria" name="glowna">
                            <?php
                                foreach ($glowna as $key)
                                {
                                    echo '<option value="'.$key->id_kategorii.'">'.$key->nazwa_kategorii.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nazwa" class="col-sm-3 control-label">Nazwa</label>
                        <input type="text" class="form-control" id="nazwa" placeholder="Nazwa" name="nazwa">
                        <?php echo "<div class='bladwalidacji'>".form_error('nazwa')."</div>"; ?>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-danger">Dodaj kategorie</button>
                    </div>
                    </form>
                </div>
              <div class="col-md-6" >
                  <h2>Kategoria zawieszek</h2>
                  <?php
                  $attributes = array('class' => 'form');
                  echo form_open('administrator/dodaj-kategorie-zawieszek', $attributes);
                  ?>
                  <div class="form-group">
                      <label for="nazwa_kategorii_zawieszek" class="col-sm-3 control-label">Nazwa</label>
                      <input type="text" class="form-control" id="nazwa_kategorii_zawieszek" placeholder="Nazwa" name="nazwa_kategorii_zawieszek">
                      <?php echo "<div class='bladwalidacji'>".form_error('nazwa_zategorii_zawieszek')."</div>"; ?>
                  </div>
                  <div class="form-group">
                      <button type="submit" class="btn btn-danger">Dodaj kategorie</button>
                  </div>
                  </form>
              </div>
            </div>
      </div>
    </div>
        
