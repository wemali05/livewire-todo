<div>
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('success') }}
        </div>
    @endif

    @if(session()->has('error'))
        <div class="alert alert-error alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('error') }}
        </div>
    @endif 
</div>