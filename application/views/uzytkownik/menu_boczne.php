<div class="row">
  <div class="col-md-3">
    <h1>Panel klienta</h1>
      <ul class="nav nav-pills nav-stacked">
        <li role="presentation" <?php if($this->uri->segment(1)=='uzytkownik' && $this->uri->segment(2)=='') echo 'class="active"' ?> ><?php echo anchor('uzytkownik/', 'Twoje dane'); ?></li>
        <li role="presentation" <?php if($this->uri->segment(2)=='modyfikacja') echo 'class="active"' ?> ><?php echo anchor('uzytkownik/modyfikacja', 'Edycja danych'); ?></li>
        <li role="presentation" <?php if($this->uri->segment(2)=='zamowienia' || $this->uri->segment(2)=='szczegoly-zamowienia') echo 'class="active"' ?> ><?php echo anchor('uzytkownik/zamowienia', 'Twoje zamówienia'); ?></li>
      </ul>
  </div>