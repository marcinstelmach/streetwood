        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Wybierz kategorie do edycji</h1>
          <h1 class="page-header" style="color:red;">Nie sprawne w pełni - tylko usuwanie !</h1>

          <div class="col-md-5">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th> 
                  <th>Nazwa</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $i=1;
                foreach($kategorie as $key){ ?>
                  <tr>
                    <td><?php echo $i++ ?></td> 
                    <td><?php echo $key->nazwa_kategorii; ?></td>
                    <td><a class="btn btn-default" href="<?php echo base_url().'administrator/modyfikacja-kategorii/'.$key->id_kategorii;?>" role="button">Edytuj</a></td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
          </div>
        </div>
      </div>
    </div>
