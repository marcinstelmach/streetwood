    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">Dzisiaj</div>
            <div class="panel-body">
              <?php
                foreach($dzisiaj as $key)
                {
                  echo 'Ilość zamówień: '.$key->ilosc.'<br />';
                  echo 'Przychód: '.number_format($key->dochod, 2, ',', ' ').' zł';
                }
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">W tym tygodniu</div>
            <div class="panel-body">
              <?php
                foreach($tydzien as $key)
                {
                  echo 'Ilość zamówień: '.$key->ilosc.'<br />';
                  echo 'Przychód: '.number_format($key->dochod, 2, ',', ' ').' zł';
                }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">W tym miesiącu</div>
            <div class="panel-body">
              <?php
                foreach($miesiac as $key)
                {
                  echo 'Ilość zamówień: '.$key->ilosc.'<br />';
                  echo 'Przychód: '.number_format($key->dochod, 2, ',', ' ').' zł';
                }
              ?>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-default">
            <div class="panel-heading">W tym roku</div>
            <div class="panel-body">
              <?php
                foreach($rok as $key)
                {
                  echo 'Ilość zamówień: '.$key->ilosc.'<br />';
                  echo 'Przychód: '.number_format($key->dochod, 2, ',', ' ').' zł';
                }
              ?>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <h3>Wybierz miesiąc z którego chcesz zobaczyć statystyki:</h3>
            <form type="GET" action="" class="form-inline">
              <select class="form-control" name="miesiac">
                <option value="1">Styczeń</option>
                <option value="2">Luty</option>
                <option value="3">Marzec</option>
                <option value="4">Kwiecień</option>
                <option value="5">Maj</option>
                <option value="6">Czerwiec</option>
                <option value="7">Lipiec</option>
                <option value="8">Sierpień</option>
                <option value="9">Wrzesień</option>
                <option value="10">Październik</option>
                <option value="11">Listopad</option>
                <option value="12">Grudzień</option>
              </select>
              <input type="submit" class="btn btn-success" value="Pokaż" />
            </form>
             <?php 
            if(isset($month_query))
            {
           ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                  <?php 
                  switch($month_number)
                    {
                      case 1 :
                       echo 'Styczeń';
                        break;
                      case 2 :
                        echo 'Luty';
                        break;
                      case 3 :
                        echo 'Marzec';
                        break;
                      case 4 :
                        echo 'Kwiecień';
                        break;
                      case 5 :
                        echo 'Maj';
                        break;
                      case 6 :
                        echo 'Czerwiec';
                        break;
                      case 7 :
                        echo 'Lipiec';
                        break;
                      case 8 :
                        echo 'Sierpień';
                        break;
                      case 9 :
                        echo 'Wrzesień';
                        break;
                      case 10 :
                        echo 'Październik';
                        break;
                      case 11 :
                        echo 'Listopad';
                        break;
                      case 12 :
                        echo 'Grudzień';
                        break;

                    } ?>
                </div>
                <div class="panel-body">
                  <?php
                    foreach($month_query as $key)
                    {
                      echo 'Ilość zamówień: '.$key->ilosc.'<br />';
                      echo 'Dochód: '.number_format($key->dochod, 2, ',', ' ').' zł';
                    }
                  ?>
                </div>
              </div>
              <?php 
              } ?>
            
        </div>

        
        <div class="col-md-6">
          <form class="form-inline">
            <h3>Wybierz dokładna datę</h3>
          <div class="form-group">
            <label for="data">Data</label>
            <input type="date" class="form-control" id="data" name="data">
          </div>
          <input type="submit" class="btn btn-default" value="Pokaz" />
        </form>
        <?php 
            if(isset($date_query))
            {
           ?>
          <div class="panel panel-default" style="margin-top:15px;">
            <div class="panel-heading"><?php echo $this->input->get('data'); ?></div>
            <div class="panel-body">
              <?php
                foreach($date_query as $key)
                {
                  echo 'Ilość zamówień: '.$key->ilosc.'<br />';
                  echo 'Dochód: '.number_format($key->dochod, 2, ',', ' ').' zł';
                }
              ?>
            </div>
          </div>
        </div>
      <?php } ?> 

        
      </div>

        


  </div>

