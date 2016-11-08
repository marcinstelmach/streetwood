        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Modyfikuj kategorie</h1>
        <div class="col-md-4">
        <?php 
          echo form_open();
         ?>
            <?php foreach($kategorie as $key){ ?>
                <div class="form-group">
                  <label for="nazwa">Nazwa</label>
                  <input type="text" class="form-control" id="nazwa_kategorii" name="nazwa_kategorii" value="<?php echo $key->nazwa_kategorii; ?>">
                </div>
            <?php } ?>
          <div class="form-group">
              <button type="submit" class="btn btn-danger">Edytuj</button>
          </div>
       </form>  
        </div>
      <div class="col-md-6">
        <p>Chcesz usunąć całkowicie kategorie?</p>
          <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target=".bs-example-modal-sm">Usuń</button>
          <div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="mySmallModalLabel">Potwierdzenie</h4>
                </div>
                <div class="modal-body">
                  Czy na pewno chcesz usunąć przedmiot ?
                </div>
                <div class="modal-footer">
                <?php echo form_open('administrator/usun-kategorie'); ?>
                <input type="hidden" name="id_kategorii" value="<?php echo $key->id_kategorii; ?>" />
                  <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>

                  <input type="submit" name="usun" class="btn btn-danger" value="Usuń" />
                </form>
                </div>
              </div>
            </div>
          </div>

        
      </div>
      </div>
      
    </div>