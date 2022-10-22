<!DOCTYPE html>
<html>

<head>
    <title>laravel webcam capture image and save from camera - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results {
            padding: 2px;
            border: 1px solid;
            /* background: #ccc; */
        }
    </style>
</head>

<body>

    <div class="container">
        <br />
        <h3 class="text-center">MEMBER REGISTRATION FORM</h3> <br /><br />


        <form method="POST" action="{{ route('webcam.capture') }}">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="test" class="form-control" id="name" name="name" placeholder="Name" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                    <input type="test" class="form-control" id="address" name="address" placeholder="Address" value="">
                </div>
            </div>
            <div class="form-group row">
                <label for="mobile" class="col-sm-2 col-form-label">Mobile</label>
                <div class="col-sm-10">
                    <input type="test" class="form-control" id="mobile" name="mobile" placeholder="Mobile">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group row">
                <label for="results" class="col-sm-2 col-form-label">Photo</label>
                <div class="col-sm-5">
                    <div id="results">Your captured image will appear here...</div>
                </div>
                <div class="col-sm-5">
                    <div id="my_camera"></div>
                    <br />

                </div>
            </div>
            <div class="form-group row" style="flex-flow: row-reverse;">
                <div style="padding-left: 15px; padding-right: 15px;">
                    <input type=button class="btn btn-primary" value="Open Camera" onClick="open_camera()" />
                    <input type=button class="btn btn-primary" value="Take Snapshot" onClick="take_snapshot()" />
                    <button type="submit" class="btn btn-success">Submit</button>
                    <input type="hidden" name="image" class="image-tag">
                </div>

            </div>
        </form>
    </div>

    <script language="JavaScript">
        // Webcam.set({
    //     width: 490,
    //     height: 350,
    //     image_format: 'jpeg',
    //     jpeg_quality: 90
    // });

    // Webcam.attach( '#my_camera' );

    function open_camera() {
        Webcam.set({
        width: 439,
        height: 330,
        // width: 490,
        // height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });

    Webcam.attach( '#my_camera' );
    }

    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
    </script>

</body>

</html>
