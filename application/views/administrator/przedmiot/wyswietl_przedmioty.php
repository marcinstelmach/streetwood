        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Edycja przedmiotów</h1>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nazwa</th> 
                  <th>Kategoria</th>
                  <th>Cena</th>
                  <th>Stan</th>
                  <th>Edytuj</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($produkty as $key){ ?>
                  <tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo $key->nazwa; ?></td> 
                    <td><?php echo $key->nazwa_kategorii.' > '.$key->nazwa_pod_kategorii; ?></td>
                    <td><?php echo $key->cena; ?></td>
                    <td><?php echo $key->stan; ?></td>
                    <!--<td><a class="btn btn-default" href="<?php echo base_url().'administrator/modyfikacja-przedmiotu/'.$key->id_produktu;?>" role="button">Edytuj</a></td>-->
                    <td>
                      <div class="dropdown">
                        <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dLabel">
                          <li class="menu-kontekstowe"><a class="class="btn btn-link"" href="<?php echo base_url().'administrator/modyfikacja-przedmiotu/'.$key->id_produktu;?>">Edytuj</a></li>
                          <li class="menu-kontekstowe"><a class="class="btn btn-link"" href="<?php echo base_url().'administrator/dodaj-podobny/'.$key->id_produktu;?>">Dodaj podobny</a></li>
                        </ul>
                      </div>

                    </td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
