<div class="modal fade" id="logout" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel">Ready to Leave?</h4>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>

        <div class="modal-body">Select <span class="text-primary">"Logout"</span> below if you are ready to leave and end your current session.</div>

        <div class="modal-footer">
          <button class="btn btn-secondary" type="submit" data-dismiss="modal">Cancel</button>
           <form method="POST" action="{{ route('logout') }}">{{ csrf_field() }}
            <button class="btn btn-primary" href="login.html">Logout</button>
          </form>
        </div>
      </div>
    </div>
  </div>