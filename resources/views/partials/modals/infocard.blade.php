<div class="modal fade" tabindex="-1" role="dialog" id="info{{ $id }}">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">User Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <br>
        <div class="modal-body">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                    @if($user->avatar)
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('dist/img/' . $user->avatar) }}" alt="User profile picture">
                    @else
                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('dist/img/avatar.png') }}" alt="User profile picture">
                    @endif
                    </div>

                    <h3 class="profile-username text-center">{{ ucwords($user->name) }}</h3>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email </b> <a class="float-right">{{ $user->email }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Username </b> <a class="float-right">{{ strtolower($user->username) }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone No</b> <a class="float-right">{{ $user->phone }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Account No</b> <a class="float-right">{{ $user->bank_account_no }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Account Name</b> <a class="float-right">{{ $user->bank_account_name }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Bank name </b> <a class="float-right">{{ $user->bank_name }}</a>
                        </li>
                    </ul>
                </div>
            <!-- /.card-body -->
            </div> 
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>