<script>

    $(document).ready(function () {


        $('#multi-page-add-btn').click(function () {

            $.ajax({
                url: '{{ route('admin.menus.get-page-row') }}',
                method: 'GET',
                success: function (response) {
                    var data = $.parseJSON(response);
                    $('#mult-page-row-wrapper').append(data.html);
                }
            });

        });

        $( "body" ).on( "click", ".remove-btn", function() {
            $(this).closest('tr').remove();
        });


    });

</script>