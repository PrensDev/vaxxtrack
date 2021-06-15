<!-- Verify Account Modal -->
<div 
    class           = "modal" 
    id              = "verifyAccountModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
    aria-labelledby = "exampleModalLabel" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-user-lock"></h5>
                <h5 class="modal-title">Verify</h5>
                <button 
                    class           ="btn btn-sm btn-muted" 
                    type            ="button" 
                    class           ="close" 
                    data-dismiss    ="modal" 
                    aria-label      ="Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <div class="mb-2">
                        <label for="position">Enter the code we send to this account:</label>
                        <div class="font-weight-bold">09123456789</div>
                    </div>
                    <input 
                        class       = "form-control" 
                        type        = "number" 
                        id          = "code" 
                        name        = "code"
                    >
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-blue" disabled>Verify</button>
            </div>
        </div>
    </div>
</div>

<!-- Make as Primary Modal -->
<div 
    class           = "modal" 
    id              = "makeAsPrimaryModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
    aria-labelledby = "exampleModalLabel" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-user-lock"></h5>
                <h5 class="modal-title">Make as Primary</h5>
                <button 
                    class           ="btn btn-sm btn-muted" 
                    type            ="button" 
                    class           ="close" 
                    data-dismiss    ="modal" 
                    aria-label      ="Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to make this account as primary?</p>
                <b>09123456789</b>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-blue">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- Remove Account Modal -->
<div 
    class           = "modal" 
    id              = "removeAccountModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
    aria-labelledby = "exampleModalLabel" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-trash-alt"></h5>
                <h5 class="modal-title">Remove Account</h5>
                <button 
                    class        = "btn btn-sm btn-muted" 
                    type         = "button" 
                    class        = "close" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div>Are you sure you want to remove this account?</div>
                <p class="font-weight-bold">09123456789</p>
                <p>If you want to continue, please type "<b>CONFIRM</b>".</p>

                <div class="form-group">
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger" disabled>Remove</button>
            </div>
        </div>
    </div>
</div>


<!-- Recover Password -->
<div 
    class           = "modal" 
    id              = "recoverModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
    aria-labelledby = "recoverModal" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-sync"></h5>
                <h5 class="modal-title">Recover</h5>
                <button 
                    class        = "btn btn-sm btn-muted" 
                    type         = "button" 
                    class        = "close" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <p>Where do you want to send the request for password recovery?</p>
                <div class="list-group">
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="mr-1">
                            <span class="font-weight-semibold">juandelacruz@gmail.com</span>
                        </div>
                        <div>
                            <button class="btn btn-blue btn-sm">Send</button>
                        </div>
                    </div>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div class="mr-1">
                            <span class="font-weight-semibold">09123456789</span>
                        </div>
                        <div>
                            <button class="btn btn-blue btn-sm">Send</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Add Another Account Modal -->
<div 
    class           = "modal" 
    id              = "addAccountModal" 
    tabindex        = "-1" 
    data-backdrop   = "static"
    aria-labelledby = "exampleModalLabel" 
    aria-hidden     = "true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title-icon fas fa-user-plus"></h5>
                <h5 class="modal-title">Add another account</h5>
                <button 
                    class        = "btn btn-sm btn-muted" 
                    type         = "button" 
                    class        = "close" 
                    data-dismiss = "modal" 
                    aria-label   = "Close"
                >
                    <span aria-hidden="true">
                        <i class="fas fa-times"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" id="email" class="form-control">
                </div>
                <div class="form-group text-center">
                    <button class="btn btn-sm btn-white-muted">Use my contact number instead</button>
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-muted" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-blue" disabled>Save</button>
            </div>
        </div>
    </div>
</div>
