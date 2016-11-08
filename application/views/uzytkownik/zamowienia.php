<div class="col-md-offset-1 col-md-6">
<div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>id</th>
                  <th>Data zamówienia</th>
                  <th>Zapłacone</th>
                  <th>Wysłane</th>
                  <th>Cena</th>
                  <th>Szczegóły</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $i=1;
                foreach ($zamowienia as $key) {
               ?><a href="#" >

                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $key->id_uzytkownika; ?></td>
                  <td><?php echo $key->data_zamowienia; ?></td>
                  <td>
                  <?php 
                    if ($key->czy_zaplacono == 1)
                      echo 'Tak';
                    else
                      echo 'Nie'; 
                  ?>
                  </td>
                  <td>
                  <?php 
                    if($key->czy_wyslano == 1)
                      echo 'Tak';
                    else
                      echo 'Nie';
                  ?>
                    
                  </td>
                  <td><?php echo number_format($key->cena, 2, ',', ' ').' zł'; ?></td>
                  <td><a class="btn btn-default" href="<?php echo base_url().'uzytkownik/szczegoly-zamowienia/'.$key->id_zamowienia; ?>" role="button">Szczegóły</a></td>
                </tr>
                </a>
                <?php 
                  $i++;
                 }?>
              </tbody>
            </table>
          </div>
          </div>
          </div>
          </div>