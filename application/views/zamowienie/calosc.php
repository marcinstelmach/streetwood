<div class="container">
    <div class="row">
    <div class="col-md-5 col-md-offset-1 container-zamowienie">
        <h1>Podaj adres dostawy</h1>
        <?php
        $attributes = array('class' => 'form-horizontal');
        echo form_open('', $attributes);
        ?>
        <div class="form-group">
            <label for="ulica" class="col-sm-10">Ulica</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="ulica" placeholder="Ulica" name="ulica">
            </div>
            <?php echo "<div class='bladwalidacji'>".form_error('ulica')."</div>"; ?>
        </div>
        <div class="form-group">
            <label for="nr_domu" class="col-sm-10">Nr domu</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nr_domu" placeholder="Nr_domu" name="nr_domu">
            </div>
            <?php echo "<div class='bladwalidacji'>".form_error('nr_domu')."</div>"; ?>
        </div>
        <div class="form-group">
            <label for="miasto" class="col-sm-10">Miasto</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="miasto" placeholder="Miasto" name="miasto">
            </div>
            <?php echo "<div class='bladwalidacji'>".form_error('miasto')."</div>"; ?>
        </div>
        <div class="form-group">
            <label for="kod_pocztowy" class="col-sm-10">Kod pocztowy</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kod_pocztowy" placeholder="Kod pocztowy" name="kod_pocztowy">
            </div>
            <?php echo "<div class='bladwalidacji'>".form_error('kod_pocztowy')."</div>"; ?>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <button type="submit" class="btn btn-danger">Zamawiam !</button>
            </div>
        </div>
        </form>

        <h1>Wybierz rodzaj dostawy</h1>
        <section id="first" class="section">
        <?php
        $i=1;
        foreach ($dostawy as $dostawa)
        {
            echo '<div class="container-radio">
                <input type="radio" name="dostawa" id="radio'.$i.'">
                <label for="radio'.$i.'"><span class="radio">'.$dostawa->nazwa_dostawy.'</span></label>
            </div>';
            $i++;
        }
        ?>
        </section>
    </div>
    <div class="col-md-4 col-md-offset-1">
        <h1>Zakupy:</h1>
            <table class="table table-order" style="border: 0;">
                <tr>
                    <th>#</th>
                    <th>Ilość</th>
                    <th>Nazwa</th>
                    <th>Cena produktu</th>
                    <th>Suma</th>
                </tr>
                <?php
                $i = 1;
                foreach ($this->cart->contents() as $items){?>
                    <tr>
                        <td><?=$i?></td>
                        <td><?=$items['qty']; ?></td>
                        <td><?=$items['name']; ?></td>
                        <td><?=$this->cart->format_number($items['price']).' zł'; ?></td>
                        <td><?=$this->cart->format_number($items['subtotal']).' zł'; ?></td>
                    </tr>
                    <?php $i++;
                } ?>

                <tr>
                    <td colspan="3"></td>
                    <td><strong>Do zapłaty</strong></td>
                    <td><strong><?php echo $this->cart->format_number($this->cart->total()).' zł'; ?></strong></td>
                    <td colspan="1"></td>
                </tr>

            </table>

    </div>
</div>
</div>
</div>
<script>
    var h = window.innerHeight;
    h=h-200;
    $('.container-zamowienie').css('height', h);
</script>