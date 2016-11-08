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
                  <th>Długość</th>
                  <th>Szerokość</th>
                  <th>Stan</th>
                  <th>Edytuj</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; foreach($produkty as $key){ ?>
                  <tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo $key->nazwa; ?></td> 
                    <td><?php echo $key->nazwa_kategorii; ?></td>
                    <td><?php echo $key->cena; ?></td>
                    <td><?php echo $key->dlugosc; ?></td>
                    <td><?php echo $key->szerokosc; ?></td>
                    <td><?php echo $key->stan; ?></td>
                    <td><a class="btn btn-default" href="<?php echo base_url().'administrator/modyfikacja-przedmiotu/'.$key->id_produktu;?>" role="button">Edytuj</a></td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
