        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Zamówienia</h1>
          <?php 
            if($this->uri->segment(2)=='nie-wyslane')
            {
              echo '<h2 class="sub-header">Nie wysłane</h2>
              <a class="btn btn-success" href="'.base_url().'administrator/nie-wyslane/dzisiaj">Dzisiaj</a>
             <a class="btn btn-success" href="'.base_url().'administrator/nie-wyslane/tydzien">Tydzień</a>
             <a class="btn btn-success" href="'.base_url().'administrator/nie-wyslane/miesiac">Miesiąc</a>
             <a class="btn btn-success" href="'.base_url().'administrator/nie-wyslane">Wszystko</a>
              ';
              goto end;
            }
            else if($this->uri->segment(2)=='zakonczone')
            {
              echo '<h2 class="sub-header">Zakończone</h2>
              <a class="btn btn-success" href="'.base_url().'administrator/zakonczone/dzisiaj">Dzisiaj</a>
             <a class="btn btn-success" href="'.base_url().'administrator/zakonczone/tydzien">Tydzień</a>
             <a class="btn btn-success" href="'.base_url().'administrator/zakonczone/miesiac">Miesiąc</a>
             <a class="btn btn-success" href="'.base_url().'administrator/zakonczone">Wszystko</a>
              ';
              goto end;
            }
             else if($this->uri->segment(2)=='nowe-zamowienia')
            {
              echo '<h2 class="sub-header">Nowe zamówienia</h2>
              <a class="btn btn-success" href="'.base_url().'administrator/nowe-zamowienia/dzisiaj">Dzisiaj</a>
             <a class="btn btn-success" href="'.base_url().'administrator/nowe-zamowienia/tydzien">Tydzień</a>
             <a class="btn btn-success" href="'.base_url().'administrator/nowe-zamowienia/miesiac">Miesiąc</a>
             <a class="btn btn-success" href="'.base_url().'administrator/nowe-zamowienia">Wszystko</a>
              ';
              goto end;
            }
             else if($this->uri->segment(2)=='oczekujace-na-zaplate')
            {
              echo '<h2 class="sub-header">Oczekujace na zapłatę</h2>
              <a class="btn btn-success" href="'.base_url().'administrator/oczekujace-na-zaplate/dzisiaj">Dzisiaj</a>
             <a class="btn btn-success" href="'.base_url().'administrator/oczekujace-na-zaplate/tydzien">Tydzień</a>
             <a class="btn btn-success" href="'.base_url().'administrator/oczekujace-na-zaplate/miesiac">Miesiąc</a>
             <a class="btn btn-success" href="'.base_url().'administrator/oczekujace-na-zaplate">Wszystko</a>
              ';
              goto end;
            }
            end:
           ?>
            <a href="?rodzaj=przelew" class="btn btn-default" id="btnPrzelew" style="margin-left: 30px;">Przelew</a>
            <a href="?rodzaj=pobranie" class="btn btn-default" id="btnPobranie">Pobranie</a>
            <a href="<?=$url=strtok($_SERVER["REQUEST_URI"],'?');?>" class="btn btn-default" id="btnWszystko">Wszystko</a>
          <?php
            if(empty($zamowienia))
            {
              echo '<h2 class="text-center">Brak zamówień </h2>';
            }
            else
            {
           ?>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Data</th>
                  <th>Imie</th>
                  <th>Nazwisko</th>
                  <th>Zapłacone</th>
                  <th>Wysłane</th>
                  <th>Cena</th>
                  <th>Rodzaj dostawy</th>
                  <th>Szczegóły zamówienia</th>
                </tr>
              </thead>
              <tbody>
              <?php 
                $i=1;
                foreach ($zamowienia as $key) {
               ?><a href="#" >

                <tr>
                  <td><?php echo $i; ?></td>
                  <td><?php echo $key->data_zamowienia; ?></td>
                  <td><?php echo $key->imie; ?></td>
                  <td><?php echo $key->nazwisko; ?></td>
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
                  <td>
                      <?php
                        if($key->rodzaj_dostawy)
                            echo 'Przelew';
                        else
                            echo 'Pobranie';
                      ?>
                  </td>  
                  <td><a class="btn btn-default" href="<?php echo base_url().'administrator/szczegoly-zamowienia/'.$key->id_zamowienia; ?>" role="button">Szczegóły zamowienia</a></td>
                </tr>
                </a>
                <?php 
                  $i++;
                } }?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script>
            function getParameterByName(name, url) {
                if (!url) {
                    url = window.location.href;
                }
                name = name.replace(/[\[\]]/g, "\\$&");
                var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, " "));
            }
            var str = getParameterByName('rodzaj');

            if(str=='przelew')
            {
                $('#btnPrzelew').addClass('btn btn-warning');
                $('#btnWszystko').addClass('btn btn-default');
            }
            else if(str=='pobranie')
            {
                $('#btnPobranie').addClass('btn btn-warning');
                $('#btnWszystko').addClass('btn btn-default');
            }
            else
            {
                $('#btnPrzelew').addClass('btn btn-default');
                $('#btnPobranie').addClass('btn btn-default');
                $('#btnWszystko').addClass('btn btn-warning');
            }
        </script>
