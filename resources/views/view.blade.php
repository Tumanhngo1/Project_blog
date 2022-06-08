<!DOCTYPE html>
<html>
<head>
    <title>Laravel 8 View Render Example - web-tuts.com</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<style type="text/css">
    body{
        background:#fd56c2 !important;
    }
    .box{
        margin-top:200px;
        background:#fff;
        padding:100px 50px;
        text-align: center;
    }
</style>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2 box">
                <div class="viewRender">
        
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
         $_token = "{{ csrf_token() }}";
         $.ajax({
             headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
            url: "{{ route('view.render') }}",
            type: 'POST',
            cache: false,
            data: {'_token': $_token },
            datatype: 'html',
            beforeSend: function() {
                //something before send
            },
            success: function(data) {
                console.log(data);
                $('.viewRender').html(data.html);
            }
        });
    });
</script>
</html>