<div class="modal fade" id="nieuwGerecht" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nieuw gerecht</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form  id="frmGerecht" name="frmGerecht" class="form-horizontal" novalidate="">
                    @csrf
                    <div class="form-group error">
                        <label class="col-sm-3 control-label">Naam gerecht nederlands: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="NaamGerechtNL" name="NaamGerechtNL" placeholder="Naam gerecht" value="" required>
                        </div>
                    </div>
                    <div class="form-group error">
                        <label class="col-sm-3 control-label">Naam gerecht engels: </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="NaamGerechtENG" name="NaamGerechtEng" placeholder="Naam gerecht" value="" required>
                        </div>
                    </div>
                    <div class="form-group error">
                        <label class="col-sm-3 control-label"> Prijs: </label>
                        <div class="col-sm-9">
                            <input type="number" class="form-control has-error" id="Prijs" name="Prijs" placeholder="0.00" value="" required>
                        </div>
                    </div>
                    <div class="form-group error">
                        <label class="col-sm-3 control-label">Foto: </label>
                        <div class="col-sm-9">
                            <input type="file" class="form-control has-error" id="Foto" name="Foto">
                        </div>
                    </div>
                    <div class="form-group error">
                        <label class="col-sm-3 control-label"> Allergenen: </label>
                        <div class="col-sm-9">
                            <input type="checkbox" name="allergenen" value="1">Gluten/Gluten<br />
                            <input type="checkbox" name="allergenen" value="2">Ei/Eggs<br />
                            <input type="checkbox" name="allergenen" value="3">Vis/Fish<br />
                            <input type="checkbox" name="allergenen" value="4">Pinda/Peanuts<br />
                            <input type="checkbox" name="allergenen" value="5">Noten/Nuts<br />
                            <input type="checkbox" name="allergenen" value="6">Soja/Soy<br />
                            <input type="checkbox" name="allergenen" value="7">Lactose/Lactose<br />
                            <input type="checkbox" name="allergenen" value="8">Schaaldieren/Crustaceans<br />
                            <input type="checkbox" name="allergenen" value="9">Weekdieren/Molluscs<br />
                            <input type="checkbox" name="allergenen" value="10">Selderij/Celery<br />
                            <input type="checkbox" name="allergenen" value="11">Mosterd/Mustard<br />
                            <input type="checkbox" name="allergenen" value="12">Sesamzaad/Sesame seed<br />
                            <input type="checkbox" name="allergenen" value="13">Sulfiet/Sulfite<br />
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <!--<button type="button" class="btn btn-primary" id="btnToevoegen" value="add">Toevoegen</button>-->
                <button type="submit" class="btn btn-primary" id="btnToevoegen" value="add">Toevoegen</button>
            </div>
        </div>
    </div>
</div>
