<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    $('#id').change(function (){

        let id = $('#id').val();

        $.ajax({

            type: "POST",
            url: '{{ route('statuses.getAboutStatus') }}',
            data:{
                "_token": "{{csrf_token()}}",
                'id': id
            },
            success: function (response) {
                $('#about').val(response[0].about);
                $('#name').val(response[0].name);
            },
            error: function (xhr, textStatus) {
                alert([xhr.status, textStatus]);
            }
        });
    })
</script>
<script>
    $('#form').on('submit',function () {

        let id = $('#id').val();
        let name = $('#name').val();
        let about = $('#about').val();

        $.ajax({
            type: 'POST',
            url: {{route('statuses.update')}},
            data: {
                "_token": "{{csrf_token()}}",
                'id': id,
                'name': name,
                'about': about,
            },
            success: function (response){
                alert(response[0].success)
            },
            error: function (xhr, textStatus){
                alert([xhr.status, textStatus]);
            }
        });
    })
</script>
