      <script src="<?php echo base_url();?>assetss/js/upload.js"></script>
      <div class="row">
        <div class="col-md-offset-2 col-md-5">
          <h1>Edytuj produkt:</h1>
        </div>

        <div class="col-md-offset-2 col-md-4">
        <?php 
          echo form_open();
         ?>
            <?php foreach($produkty as $key){ ?>
                <div class="form-group">
                  <label for="nazwa">Nazwa</label>
                  <input type="text" class="form-control" id="nazwa" name="nazwa" value="<?php echo $key->nazwa; ?>">
                </div>
                <div class="form-group">
                <label for="kategoria">Kategoria</label>
                  <select name="id_kategorii" id="kategoria" class="form-control">
                    <option value="<?=$key->id_kategorii?>" selected="selected"><?=$key->nazwa_kategorii?></option>
                    <?php foreach ($kategorie as $keyy) {
                    echo '<option value="'.$keyy->id_kategorii.'">'.$keyy->nazwa_kategorii.'</option>';
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="cena">Cena</label>
                    <input type="text" class="form-control" id="cena" name="cena" value="<?php echo $key->cena; ?>">
                </div>
                <div class="form-group">
                <label for="ilosc" class="col-sm-3 control-label">Stan</label>
                  <select name="stan" id="stan" class="form-control">
                    <option value="1">Dostępne</option>
                    <option value="0">Niedostępny</option>
                  </select>
                </div>
          <div class="form-group">
              <button type="submit" class="btn btn-danger">Edytuj</button>
          </div>
       </form>  
        </div>
      <div class="col-md-6">
      <h3>Chcesz zmienic zdjęcie?</h3>
      <?php 
          foreach ($zdjecia as $zdj)
          {
              $zdjecie=$zdj->nazwa_zdjecia;
              $thumb= substr($zdjecie, 0, -4);
              $thumb=$thumb.'_thumb.jpg';
              echo '<img src="'.base_url().'assetss/img/products/'.$key->nazwa_kategorii.'/thumbs/'.$thumb.'">';
          }
       ?>
        <?php
        $attributes = array('class' => 'form-horizontal');
          echo form_open_multipart('administrator/zmien-zdjecie/'.$key->id_produktu.'/'.str_replace(' ','_', strtolower($key->nazwa_kategorii)), $attributes);
        ?>
              <div class="form-group">
                <div class="col-sm-8">
                    <input type="file" name="my_file[]" id="plik" multiple="" />
                   <p class="help-block"><?php echo $error; ?></p>
                   <br />
                   <section>
                        <output id="status"></output>
                        <progress value="0" max="100" id="postep"></progress>
                    </section>
                 </div>  
              </div>
              <div class="form-group">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-danger" onclick="wyslijPlik()">Zmień zdjęcie</button>
                </div>
              </div> 
        </form>

        <h3>Chcesz usunąć całkowicie produkt?</h3>
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
                  <button type="button" class="btn btn-default" data-dismiss="modal">Anuluj</button>
                  <a class="btn btn-danger" href="<?php echo base_url().'administrator/usun-produkt/'.$key->id_produktu.'/'.str_replace(' ', '_', strtolower($key->nazwa_kategorii)); ?>" role="button">Usuń</a>
                </div>
              </div>
            </div>
          </div>

     <?php } ?>   
      </div>
      </div>
      
    </div>