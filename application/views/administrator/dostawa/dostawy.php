<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="col-md-5">
            <?php
            if ($this->session->flashdata('dodano')==TRUE)
            {
                echo '<div class="alert alert-success text-center alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Dodano</div>';
            }
            ?>
            <h1>Dodaj rodzaj dostawy</h1>
            <?php
            $attributes = array('class' => 'form-horizontal');
            echo form_open('administrator/dostawa-dodaj', $attributes);
            ?>

            <div class="form-group">
                <label for="nazwa">Nazwa</label>
                <input type="text" class="form-control" id="nazwa" placeholder="Nazwa" name="nazwa">
            </div>
            <?php echo '<div class="bladwalidacji">'.form_error("nazwa").'</div>'; ?>
            <div class="form-group">
                <label for="cena">Cena</label>
                <input type="text" class="form-control" id="cena" placeholder="Cena" name="cena">
            </div>
            <?php echo '<div class="bladwalidacji">'.form_error("cena").'</div>'; ?>
            <div class="radio">
                <label>
                    <input type="radio" name="rodzaj_dostawy" value="1" checked>
                    Przedpłata na konto
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="rodzaj_dostawy" value="0">
                    Za pobraniem
                </label>
            </div>
            <?php echo '<div class="bladwalidacji">'.form_error("rodzaj_dostawy").'</div>'; ?>
            <button type="submit" class="btn btn-success">Dodaj</button>
            </form>
        </div>
        <div class="col-md-6">
            <h1>Edytuj przesyłki</h1>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Nazwa</th>
                        <th>Cena</th>
                        <th>Rodzaj</th>
                        <th>Usuń</th>
                    </tr>
                    <?php
                    $i=1;
                    foreach($dostawy as $key)
                    {
                        echo '<tr>
                                <td>'.$i.'</td>
                                <td>'.$key->nazwa_dostawy.'</td>
                                <td>'.$key->cena.' zł</td>';
                        if($key->rodzaj_dostawy)
                        {
                                echo '<td>Przelew</td>';
                        }
                        else
                        {
                            echo '<td>Pobranie</td>';
                        }

                        echo '<td><a class="btn btn-danger" href="'.base_url().'administrator/dostawa-usun/'.$key->id_dostawy.'" role="button">Usun</a></td>
                              </tr>';
                        $i++;
                    }
                    ?>

                </table>
            </div>
        </div>
    </div>
</div>

