$('#form-feedback').on('submit', function(event){
    event.preventDefault();
    var formData = new FormData(this);

    $.ajax({
        url: '{{ route('api.send.feedback') }}', 
        method: 'POST', 
        data: formData, 
        cache:false, 
        contentType: false, 
        processData: false, 

        beforeSend:function() {
            $('#submit').attr('disabled', 'disabled');
            $('#submit').html('SENDING...');
        },
        success:function(data) {
            $('#submit').attr('disabled', false);
            $('#submit').html('SEND FEEDBACK');
            $('#form-feedback')[0].reset();

            data = JSON.parse(data);

            if (data.message == "success") {

                Swal.fire({
                  type: 'success',
                  title: 'Success!',
                  text: 'Your FeedBack Has Been Sent!'
                });

            } else if (data.message == "failed") {
                
                Swal.fire({
                  type: 'error',
                  title: 'Opps...!',
                  text: 'Something Wrong Has Happened!'
                });

            } else {

                Swal.fire({
                  type: 'error',
                  title: 'Opps...!',
                  text: 'Something Wrong Has Happened!',
                  footer: 'Error: ' + data.message
                });

            }
        },
        error:function(xhr) {
            $('#submit').attr('disabled', false);
            $('#submit').html('SEND FEEDBACK');

            Swal.fire({
              type: 'error',
              title: 'Opps...!',
              text: 'Something Wrong Has Happened!',
              footer: 'Error: ' + xhr
            });

        }

    });
});