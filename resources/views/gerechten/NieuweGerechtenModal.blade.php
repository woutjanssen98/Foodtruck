<div class="modal fade" id="nieuwGerecht" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Nieuwe beheerder</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <div class="modal-body">
                <form  id="frmUser" name="frmUser" class="form-horizontal" novalidate="">
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
                        <label class="col-sm-3 control-label"> Allergenen: </label>
                        <div class="col-sm-9">
                            <label>hoi</label>
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btnOpslaan" value="add">Registreren</button>
                <input type="hidden" id="task_id" name="task_id" value="0">
            </div>
        </div>
    </div>
</div>
