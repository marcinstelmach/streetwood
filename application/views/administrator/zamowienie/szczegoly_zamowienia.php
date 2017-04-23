        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

          <h2 class="sub-header">Szczegóły zamówienia nr <?php echo $id_zamowienia; ?> </h2>
          <div class="btn-group" role="group">
          <?php
          foreach ($zamowienie as $key) {
      
            if($key->czy_zaplacono==0)
            {
                echo '<a class="btn btn-success" href="'.base_url().'administrator/oplac/'.$id_zamowienia.'" role="button">Zmień na opłacone</a>';
            }
            else
            {
                echo '<a class="btn btn-success" href="'.base_url().'/administrator/nieoplac/'.$id_zamowienia.'" role="button">Zmień na nie opłacone</a>';
            }
            if($key->czy_wyslano==0)
            {
                echo '<a class="btn btn-success" href="'.base_url().'administrator/wyslij/'.$id_zamowienia.'" role="button">Zmień na wyslane</a>';
            }
            else
            {
                echo '<a class="btn btn-success" href="'.base_url().'/administrator/niewyslij/'.$id_zamowienia.'" role="button">Zmień na nie wyslane</a>';
            }
        }
          ?>
          </div>
          <div class="col-md-9">
      <div class="table-responsive">
        <table class="table table-striped">
        <thead>
                <tr>
                  <th>Data</th>
                  <th>Zapłacone</th>
                  <th>Wysłane</th>
                  <th>Cena</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                foreach ($zamowienie as $key) {
               ?><a href="#" >

                <tr>
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
                </tr>
                </a>
                <?php }?>
              </tbody>
        </table>  
        </div>

    </div>
          <div class="col-md-12">
      <h2>Produkty</h2>
      <div class="table-responsive">
        <table class="table table-striped">
        <thead>
          <td>#</td>
          <td>Nazwa</td>
          <td>Cena za sztukę</td>
          <td>Ilość</td>
          <td>Komentarz</td>
        </thead>
        <tbody>
        <?php
            $i=1;
            foreach ($produkt as $key):?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $key->nazwa ?></td>
              <td><?php echo number_format($key->cena, 2, ',', ' ').' zł'; ?></td>
              <td><?php echo $key->ilosc ?></td>
                <td><?=$key->komentarz?></td>
            </tr>
            <?php 
              $i++;
            endforeach; ?>
          </tbody>
        </table>  
        </div>

    </div>
      <div class="col-md-4">
      <h2>Adres</h2>
      <div class="table-responsive">
        <table class="table table-striped">
        <?php
            foreach ($adres as $key):?>
            <tr>
              <td>Ulica</td>
              <td><?php echo $key->ulica ?></td>
            </tr>
            <tr>
              <td>Nr domu</td>
              <td><?php echo $key->nr_domu ?></td>
            </tr>
            <tr>
              <td>Miasto</td>
              <td><?php echo $key->miasto ?></td>
            </tr>
            <tr>
              <td>Kod pocztowy</td>
              <td><?php echo $key->kod_pocztowy ?></td>
            </tr>
            <?php endforeach; ?>
        </table>  
        </div>

    </div>
    <div class="row">
      <div class="col-md-4">
        <h2>Dane kupującego</h2>
        <div class="table-responsive">
          <table class="table table-striped">
          <?php
              foreach ($uzytkownik as $key):?>
              <tr>
                <td>Imie</td>
                <td><?php echo $key->imie ?></td>
              </tr>
              <tr>
                <td>Nazwisko</td>
                <td><?php echo $key->nazwisko ?></td>
              </tr>
              <tr>
                <td>E - mail</td>
                <td><?php echo $key->email ?></td>
              </tr>
              <tr>
                <td>Telefon</td>
                <td><?php echo $key->telefon ?></td>
              </tr>
              <?php endforeach; ?>
          </table>  
          </div>

      </div>
      </div> 
        </div>
      </div>
    </div>
