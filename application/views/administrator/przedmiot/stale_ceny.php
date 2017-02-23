<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h1 class="page-header">Ustal stałe ceny</h1>
    <?php
        if($this->session->flashdata())
        {
            echo 'dodano';
        }
    ?>
    <div class="row">
        <div class="col-md-5">
            <h2>Sznureczek</h2>
            <?php
            $attributes = array('class' => 'form');
            echo form_open('administrator/stale-ceny', $attributes);
            foreach ($sznureczek as $key)
            {
                ?>
                <div class="form-group">
                    <label for="z1" class="col-sm-5 control-label">Z 1 zawieszka</label>
                    <input type="text" class="form-control" id="z1" name="z1" value="<?= $key->zawieszka1 ?>">
                </div>
                <div class="form-group">
                    <label for="z1" class="col-sm-5 control-label">Z 2 zawieszkami</label>
                    <input type="text" class="form-control" id="z2" name="z2" value="<?= $key->zawieszka2 ?>">
                </div>
                <div class="form-group">
                    <label for="z1" class="col-sm-5 control-label">Z 3 zawieszkami</label>
                    <input type="text" class="form-control" id="z3" name="z3" value="<?= $key->zawieszka3 ?>">
                </div>
                <div class="form-group">
                    <label for="opis" class="col-sm-5 control-label">Opis</label>
                    <textarea class="form-control" rows="3" id="opis" name="opis"><?= $key->opis ?></textarea>
                </div>
                <input type="hidden" name="rodzajBransoletki" value="sznureczek">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Zapisz</button>
                </div>
                <?php
            }
            ?>
            </form>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <h2>Guzik</h2>
            <?php
            $attributes = array('class' => 'form');
            echo form_open('administrator/stale-ceny', $attributes);
            foreach ($guzik as $key)
            {
                ?>
                <div class="form-group">
                    <label for="z1" class="col-sm-5 control-label">Z 1 zawieszka</label>
                    <input type="text" class="form-control" id="z1" name="z1" value="<?= $key->zawieszka1 ?>">
                </div>
                <div class="form-group">
                    <label for="z2" class="col-sm-5 control-label">Z 2 zawieszkami</label>
                    <input type="text" class="form-control" id="z2" name="z2" value="<?= $key->zawieszka2 ?>">
                </div>
                <div class="form-group">
                    <label for="z3" class="col-sm-5 control-label">Z 3 zawieszkami</label>
                    <input type="text" class="form-control" id="z3" name="z3" value="<?= $key->zawieszka3 ?>">
                </div>
                <div class="form-group">
                    <label for="z4" class="col-sm-5 control-label">Z 4 zawieszkami</label>
                    <input type="text" class="form-control" id="z4" name="z4" value="<?= $key->zawieszka4 ?>">
                </div>
                <div class="form-group">
                    <label for="z5" class="col-sm-5 control-label">Z 5 zawieszkami</label>
                    <input type="text" class="form-control" id="z5" name="z5" value="<?= $key->zawieszka5?>">
                </div>
                <div class="form-group">
                    <label for="opis" class="col-sm-5 control-label">Opis</label>
                    <textarea class="form-control" rows="3" id="opis" name="opis"><?= $key->opis ?></textarea>
                </div>
                <input type="hidden" name="rodzajBransoletki" value="guzik">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Zapisz</button>
                </div>
                <?php
            }
            ?>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-5">
            <h2>Kotwica</h2>
            <?php
            $attributes = array('class' => 'form');
            echo form_open('administrator/stale-ceny', $attributes);
            foreach ($kotwica as $key)
            {
                ?>
                <div class="form-group">
                    <label for="z1" class="col-sm-5 control-label">Z 1 zawieszka</label>
                    <input type="text" class="form-control" id="z1" name="z1" value="<?= $key->zawieszka1 ?>">
                </div>
                <div class="form-group">
                    <label for="z1" class="col-sm-5 control-label">Z 2 zawieszkami</label>
                    <input type="text" class="form-control" id="z2" name="z2" value="<?= $key->zawieszka2 ?>">
                </div>
                <div class="form-group">
                    <label for="z1" class="col-sm-5 control-label">Z 3 zawieszkami</label>
                    <input type="text" class="form-control" id="z3" name="z3" value="<?= $key->zawieszka3 ?>">
                </div>
                <div class="form-group">
                    <label for="z4" class="col-sm-5 control-label">Z 4 zawieszkami</label>
                    <input type="text" class="form-control" id="z4" name="z4" value="<?= $key->zawieszka4 ?>">
                </div>
                <div class="form-group">
                    <label for="z5" class="col-sm-5 control-label">Z 5 zawieszkami</label>
                    <input type="text" class="form-control" id="z5" name="z5" value="<?= $key->zawieszka5 ?>">
                </div>
                <div class="form-group">
                    <label for="opis" class="col-sm-5 control-label">Opis</label>
                    <textarea class="form-control" rows="3" id="opis" name="opis"><?= $key->opis ?></textarea>
                </div>
                <input type="hidden" name="rodzajBransoletki" value="kotwica">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Zapisz</button>
                </div>
                <?php
            }
            ?>
            </form>
        </div>

        <div class="col-md-5 col-md-offset-1">
            <h2>Koraliki</h2>
            <?php
            $attributes = array('class' => 'form');
            echo form_open('administrator/stale-ceny', $attributes);
            foreach ($koralik as $key)
            {
                ?>
                <div class="form-group">
                    <label for="z1" class="col-sm-5 control-label">Z 1 zawieszka</label>
                    <input type="text" class="form-control" id="z1" name="z1" value="<?= $key->zawieszka1 ?>">
                </div>
                <div class="form-group">
                    <label for="z2" class="col-sm-5 control-label">Z 2 zawieszkami</label>
                    <input type="text" class="form-control" id="z2" name="z2" value="<?= $key->zawieszka2 ?>">
                </div>
                <div class="form-group">
                    <label for="z3" class="col-sm-5 control-label">Z 3 zawieszkami</label>
                    <input type="text" class="form-control" id="z3" name="z3" value="<?= $key->zawieszka3 ?>">
                </div>
                <div class="form-group">
                    <label for="z4" class="col-sm-5 control-label">Z 4 zawieszkami</label>
                    <input type="text" class="form-control" id="z4" name="z4" value="<?= $key->zawieszka4 ?>">
                </div>
                <div class="form-group">
                    <label for="z5" class="col-sm-5 control-label">Z 5 zawieszkami</label>
                    <input type="text" class="form-control" id="z5" name="z5" value="<?= $key->zawieszka5 ?>">
                </div>
                <div class="form-group">
                    <label for="opis" class="col-sm-5 control-label">Opis</label>
                    <textarea class="form-control" rows="3" id="opis" name="opis"><?= $key->opis ?></textarea>
                </div>
                <input type="hidden" name="rodzajBransoletki" value="koraliki">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">Zapisz</button>
                </div>
                <?php
            }
            ?>
            </form>
        </div>

    </div>
</div>
</div>

