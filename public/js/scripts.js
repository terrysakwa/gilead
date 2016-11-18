$('.deleteRecord').on('click', function(){

    var form = $(this).parents('form:first');


    swal({
            title: "Are you sure?",
            text: "You will not be able to recover this record!",         type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        },
        function(){

            form.submit();
        });
})