        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dodaj nowy przedmiot</h1>
          <script src="<?php echo base_url();?>assetss/js/upload.js"></script>
    <?php 
    if (isset($_SESSION['nazwa_przedmiotu']))
    {
      echo '<div class="col-md-8 col-md-offset-2">
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <p class="text-center">Dodano '.$this->session->userdata('nazwa_przedmiotu').'</p>
        </div>
      </div>';
      $this->session->unset_userdata('nazwa_przedmiotu');
    }
    ?>
      <div class="row">
        <div class="col-md-6">
        <?php
        $attributes = array('class' => 'form-horizontal');
          echo form_open_multipart('administrator/do_upload', $attributes);
        ?>
              <div class="form-group">
                <div class="col-sm-8 upload">
                  <input type="file" name="my_file[]" id="plik" multiple="" />
                 </div>  
              </div> 
              <div class="form-group">
                <label for="nazwa" class="col-sm-3 control-label">Nazwa</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="nazwa" placeholder="Nazwa" name="nazwa" value="<?=$this->session->userdata('nazwa')?>">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('nazwa')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="cena" class="col-sm-3 control-label">Cena za sztuke</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" id="cena" placeholder="Cena" name="cena" value="<?=$this->session->userdata('cena')?>">
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('cena')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="kategoria" class="col-sm-3 control-label">Kategoria</label>
                <div class="col-sm-5">
                  <select name="id_kategorii" class="form-control" id="kategoria">
                    <?php foreach ($kategorie as $key) {
                        if($this->session->userdata('id_kategorii')==$key->id_kategorii)
                            echo '<option value="'.$key->id_kategorii.'|'.$key->id_kategorii_1.'" selected>'.$key->lev1.' > '.$key->lev2.'</option>';
                        else
                            echo '<option value="'.$key->id_kategorii.'|'.$key->id_kategorii_1.'">'.$key->lev1.' > '.$key->lev2.'</option>';
                    } ?>
                  </select>
                </div>
              </div>
            <fieldset id="kat" disabled>
            <div class="form-group" id="kategoria-zawieszek">
                <label for="kategoria_zawieszek" class="col-sm-3 control-label">Kategoria Zawieszek</label>
                <div class="col-sm-5">
                    <select name="id_kategorii_zawieszek" class="form-control" id="id_kategorii_zawieszek">
                        <?php foreach ($kategorie_zawieszek as $key) {
                            if($this->session->userdata('id_kategorii_zawieszek')==$key->id_kategorii_zawieszek)
                            {
                                echo '<option value="' . $key->id_kategorii_zawieszek . '" selected>' . $key->nazwa_kategorii_zawieszek . '</option>';
                            }
                            else
                            {
                                echo '<option value="' . $key->id_kategorii_zawieszek . '">' . $key->nazwa_kategorii_zawieszek . '</option>';
                            }
                        } ?>
                    </select>
                </div>
            </div>
            </fieldset>

              <div class="form-group">
                <label for="ilosc" class="col-sm-3 control-label">Stan</label>
                <div class="col-sm-5">
                  <select name="stan" id="stan"  class="form-control">
                      <?php
                        if($this->session->userdata('stan')==1)
                        {
                            echo '<option value="1">Dostępne</option>
                    <option value="0">Niedostępny</option>';
                        }
                        else if($this->session->userdata('stan')==2)
                        {
                            echo '<option value="0">Niedostepny</option>
                    <option value="1">Dostepny</option>';
                        }
                      ?>
                    <option value="1">Dostępne</option>
                    <option value="0">Niedostępny</option>
                  </select>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('stan')."</div>"; ?>
              </div>
              <div class="form-group">
                <label for="opis" class="col-sm-3 control-label">Opis</label>
                <div class="col-sm-5">
                  <textarea class="form-control" rows="3" id="opis" placeholder="opis" name="opis"><?=$this->session->userdata('opis')?></textarea>
                </div>
                <?php echo "<div class='bladwalidacji'>".form_error('opis')."</div>"; ?>
              </div>
            <div class="form-group">
                <div class="checkbox">
                <label>
                    <?php
                        if($this->session->userdata('zapamietaj')=="tak")
                            echo '<input type="checkbox" value="tak" name="zapamietaj" checked>';
                        else
                            echo '<input type="checkbox" value="tak" name="zapamietaj">';
                    ?>
                    Zapamiętaj ten produkt zeby dodac taki sam
                </label>
                 </div>
            </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-danger" value="Dodaj przedmiot" />
                </div>
              </div>
            </form>
        </div>
          </div>
        </div>
      </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script type="text/javascript">
            $( "#kategoria" ).change(function () {
                    var str = "";
                    $( "#kategoria option:selected" ).each(function() {
                        str = $( this ).text();
                        console.log(str);
                    });
                    if(str=='Bransoletki > Zawieszki')
                    {
                        $("fieldset").prop('disabled', false);
                    }
                    else
                    {
                        $("fieldset").prop('disabled', true);
                    }

                    /*if(str=='Bransoletki > Guzik')
                    {
                        $(function(){
                            $("input[type='submit']").click(function(){
                                var $fileUpload = $("input[type='file']");
                                if (parseInt($fileUpload.get(0).files.length)>2){
                                    alert("You can only upload a maximum of 2 files");
                                }
                            });
                        });
                    }
                })*/
                .change();
        </script>