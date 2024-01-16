<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Preview QR CODE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <img id="qr_image" src="" alt="">
                <div id="qr_info" style="font-size: 16px;color: cornflowerblue;text-align: center;font-weight: 900;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
    <div class="modal-dialog">
      <form id="viewForm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal2Label">Please Provide Your Password</h5>
                <button type="button" class="btn-close closeModal" data-bs-dismiss="modal" aria-label="Close"><i
                        class="fa fa-close"></i></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label">Password</label>
                    <div class="input-group mb-4">
                        <div class="input-group" id="Password-toggle">
                            <a href="" class="input-group-text">
                                <i class="fe fe-eye-off" aria-hidden="true"></i>
                            </a>
                            <input class="form-control" id="password" type="password" name="password" placeholder="Password" required>
                            <input type="hidden" name="qr_id" id="qr_id">   
                        </div>
                        <div class="error text-danger"></div>
                    </div>
                </div>
                <div class="form-group append-grp">
                  
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success token_view">Submit</button>
                <button type="button" class="btn btn-secondary closeModal" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
      </form>
    </div>
</div>
