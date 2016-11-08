        <div class="col-sm-9 col-sm-offset-3 col-md-5 col-md-offset-2 main">
          <h1 class="page-header">Utwórz kategorie</h1>
          <div class="row">
            <div class="col-md-6">
              <?php
                $attributes = array('class' => 'form');
                echo form_open('', $attributes);
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
          </div>
      </div>
    </div>
