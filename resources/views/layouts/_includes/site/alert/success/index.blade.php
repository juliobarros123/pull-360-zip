@if (session('feedback'))
    <div id="foo">
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert">
                <i class="fa fa-times"></i>
            </button>
            <strong>{{ session('feedback')['sms'] }}</strong>
        </div>
    </div>
@endif
