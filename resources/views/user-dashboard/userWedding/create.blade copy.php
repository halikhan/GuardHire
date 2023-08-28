<!doctype html>
<html lang="en">
  <head>
    <title> Laravel 9 Multiple Image Upload Using Ajax - Programming Fields</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <style>
        .error {
            color: red;
        }
    </style>
</head>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-xl-7 col-md-7 col-sm-12 m-auto">
                <div id="result"></div>
                    <form id="uploadForm" method="POST" enctype="multipart/form-data">
                        <div class="card shadow">
                            <div class="card-header">
                                <h4 class="card-title fw-bold"> Laravel 9 Multiple Images Upload Using Ajax </h4>
                            </div>

                            <div class="card-body">
                                <label for="file"> Image(s) <span class="text-danger">*</span> </label>
                                <input type="file" name="images[]" id="images" multiple class="form-control">
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success"> Upload </button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js" integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $("#uploadForm").validate({
                rules: {
                    'images[]': {
                        required: true,
                    }
                },
                messages: {
                    'images[]': {
                        required: "Please upload the image(s)",
                    }
                },
                submitHandler: function(form, event) {
                    event.preventDefault();
                    let formData = new FormData(form);

                    const totalImages = $("#images")[0].files.length;
                    let images = $("#images")[0];

                    for (let i = 0; i < totalImages; i++) {
                        formData.append('images' + i, images.files[i]);
                    }
                    formData.append('totalImages', totalImages);

                    console.log(formData);

                    $.ajax({
                        url: "{{ route('image') }}",
                        type: 'POST',
                        data: formData,
                        processData: false,
                        cache: false,
                        contentType: false,
                        success: function(response) {
                            form.reset();
                            if (response && response.status === 'success') {
                                $("#result").append(`<div class='alert alert-success alert-dismissible fade show' role='alert'>${response.message}<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>`);

                                setTimeout(() => {
                                    $(".alert").remove();
                                }, 5000);
                            }

                            else if(response.status === 'failed') {
                                $("#result").append(`<div class='alert alert-success alert-dismisisble fade show' role='alert'>${response.message}<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>`);

                                setTimeout(() => {
                                    $(".alert").remove();
                                }, 5000);
                            }
                        }
                    });
                }
            });
        });

    </script>
</body>
</html>
