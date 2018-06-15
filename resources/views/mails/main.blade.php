@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$template_name}} Template</div>

                <div class="card-body mail-template" style="text-align: center;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <input type="hidden" id="template_id" value="{{$template_id}}">
                    <div class="row" id="email_template_div">
                        <input type="input" id="email_title" value="{{$template_name}}">
                        <textarea id="email_area" style="width: 100%;">{{$template_text}}</textarea>
                        <button class="btn btn-primary email-btn">Save Template</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var noteOption = {
            clickToHide : true,
            autoHide : true,
            globalPosition : 'top center',
            style : 'bootstrap',
            className : 'error',
            showAnimation : 'slideDown',
            showDuration : 400,
            hideAnimation: 'slideUp',
            hideDuration: 200,
            gap : 20,
        }
        $.notify.defaults(noteOption);
        $.notify.addStyle('happyblue', {
          html: "<div><span data-notify-text/></div>",
          classes: {
            base: {
              "white-space": "nowrap",
              "background-color": "#333399",
              "padding": "10px",
              "margin-top" : "45px",
              "border-radius" : "5px"
            },
            superblue: {
              "color": "white",
            }
          }
        });
        $('.email-btn').click( function() {
            $('.notifyjs-corner').empty();
            var text = $('#email_area').val();
            var title = $('#email_title').val();
            var id = $('#template_id').val();
            $.ajax({
                url: "{{url('mail/save')}}",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    template_name: title,
                    template_text: text,
                    template_id: id
                },
                type: 'post',
                success: function(result) {
                    if(result == '1')
                        $.notify("Successfully saved!",{style:'happyblue',className:'superblue'});
                    else
                        $.notify("Error occured!",{style:'happyblue',className:'superblue'});
                    console.log(result);
                },
                error: function(error) {
                    alert("Error");
                }
            });
        });
    });
</script>
@endsection
