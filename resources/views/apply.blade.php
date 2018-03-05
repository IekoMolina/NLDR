<form method="POST" action="apply" class="form-horizontal custm-form" role="form" enctype="multipart/form-data">
{!! csrf_field() !!}
    <div class="modal-header">
    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>-->
        <h4 class="modal-title"></h4>
    </div>
    <div class="modal-body"> 
        <div class="form-group">
            <label class="col-md-3 control-label" name="resume">Attach File:</label>
            <div class="col-md-8">
                <input  type="file" id="resume" placeholder="Resume" name="resume" class=""/>
                <span class="required" id='spnFileError'></span>
            </div>
        </div>                                
    </div>
    <div class="modal-footer">
        <div class="col-xs-5">
            <p style="margin:0;text-align:left;color: green;display:none;" id="successMsg">Submitted Successfully!</p>
        </div>
        <button type="submit" id="btnUpload" class="custm-btn btn-primary" onclick="uploadFile();">Submit</button>
        <button type="button" class="custm-btn btn-default" data-dismiss="modal">Close</button>
    </div>
</form>