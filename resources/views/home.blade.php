@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Search Box</div>

                <div class="card-body" style="text-align: center;">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <label>Start Page : </label>
                    <input type="number" id="start_page" name="start_page" min="0" style="width: 40px;border: solid 1px;" value="0">
                    <label>End Page : </label>
                    <input type="number" id="end_page" name="end_page" min="0" style="width: 40px;border: solid 1px;" value="0">
                    <br>
                    <input type="input" id="keyword" style="border: solid 1px;" placeholder="Please input keyword..." name="keyword">
                    <button id="google_search">Search</button>
                    <br>
                    <input type="input" id="domain_keyword" name="domain_keyword" placeholder="Domain keyword ..." style="border: solid 1px;">
                    <button id="domain_search">Search</button>
                    <br>
                    <input type="input" id="email_keyword" name="email_keyword" placeholder="Search Email ..." style="border: solid 1px;">
                    <button id="email_search">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    
    $(document).ready(function(){

        var noteOption = {
            clickToHide : true,
            autoHide : false,
            globalPosition : 'top center',
            style : 'bootstrap',
            className : 'error',
            showAnimation : 'slideDown',
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
        $('input').change(function(){
            $('.notifyjs-corner').empty();
            if($('#start_page').val()>$('#end_page').val()) {
                $.notify("Input correct pages!",{style:'happyblue',className:'superblue'});
                if($(this).attr('id') == 'start_page')
                    $(this).val($('#end_page').val());
                else
                    $(this).val($('#start_page').val());
            }
        });
        $('#domain_search').click(function(){
            let domain = $('#domain_keyword').val();
            $.ajax({
                url: "{{url('home/get')}}",
                data: {
                    domain: domain
                },
                type: 'post',
                success: function(result) {
                    console.log(result);
                },
                error: function(error) {

                }
            });
        });
    });
</script>

@endsection
