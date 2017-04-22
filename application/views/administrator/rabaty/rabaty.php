<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

    <div class="row">
        <div class="col-md-3">
            <?php
            if ($this->session->flashdata('dodano') == TRUE) {
                echo '<div class="alert alert-success text-center alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Dodano</div>';
            }
            ?>
            <h1>Dodaj rabat</h1>
            <?php
            $attributes = array('class' => 'form-horizontal');
            echo form_open('administrator/rabat-dodaj', $attributes);
            ?>

            <div class="form-group">
                <label for="nazwa">Nazwa rabatu</label>
                <input type="text" class="form-control" id="nazwa" placeholder="Nazwa" name="nazwa">
            </div>
            <?php echo '<div class="bladwalidacji">' . form_error("nazwa") . '</div>'; ?>
            <div class="form-group">
                <label for="wartosc">Wartość w %</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="wartosc" placeholder="Wartość" name="wartosc">
                    <div class="input-group-addon">%</div>
                </div>
            </div>
            <?php echo '<div class="bladwalidacji">' . form_error("wartosc") . '</div>'; ?>
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="na_wszystko" value="1" id="na_wszystko"> Na wszystko
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="kod">KOD</label>
                <input type="text" class="form-control" id="kod" placeholder="Kod" name="kod">
            </div>
            <?php echo '<div class="bladwalidacji">' . form_error("kod") . '</div>'; ?>
            <div class="form-group">
                <select class="form-control" name="kategoria" id="kategoria">
                    <?php
                    foreach ($kategorie as $kat) {
                        echo '<option value="' . $kat->id_kategorii . '">' . $kat->nazwa_kategorii . '</option>';
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Dodaj</button>
            </form>
        </div>
        <div class="col-md-7 col-md-offset-1">
            <h1>Edytuj rabaty</h1>
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>Nazwa rabatu</th>
                        <th>Wartość</th>
                        <th>Kategoria</th>
                        <th>Kod</th>
                        <th>ON/OFF</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($rabaty as $key) {
                        echo '<tr>
                                <td>' . $i . '</td>
                                <td>' . $key->nazwa_rabatu . '</td>
                                <td>' . $key->wartosc . ' %</td>';
                        if ($key->na_wszystko == 1) {
                            echo '<td>Na wszystko</td>';
                        }
                        else {
                            foreach ($kategorie as $_kategoria) {
                                if ($key->id_kategorii == $_kategoria->id_kategorii) {
                                    echo '<td>' . $_kategoria->nazwa_kategorii . '</td>';
                                    break;
                                }
                            }
                        }

                        if($key->kod!='')
                            echo '<td>'.$key->kod.'</td>';
                        else
                            echo '<td></td>';

                        if ($key->aktywny) {
                            echo '<td><a class="btn btn-danger" href="' . base_url() . 'administrator/rabat-wylacz/' . $key->id_rabatu . '" role="button">OFF</a></td>';
                        } else {
                            echo '<td><a class="btn btn-success" href="' . base_url() . 'administrator/rabat-wlacz/' . $key->id_rabatu . '" role="button">ON</a></td>';
                        }

                        $i++;
                    }
                    ?>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("#na_wszystko").change(function () {
            var result = (this.checked);
            if (result) {
                $("#kategoria").prop('disabled', true);
                $("#kod").prop('disabled', false);
            }
            else if (!result) {
                $("#kategoria").prop('disabled', false);
                $("#kod").prop('disabled', true);
            }

        });
    </script>