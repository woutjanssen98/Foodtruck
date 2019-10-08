<div class="modal fade" id="registreer" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="email" name="email" placeholder="Email" value="" required>
                        </div>
                    </div>

                    <div class="form-group error">
                        <label class="col-sm-3 control-label">Wachtwoord</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord" value="" required>
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
