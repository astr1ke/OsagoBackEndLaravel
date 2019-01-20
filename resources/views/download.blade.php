<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }
    </style>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">





                <form enctype="multipart/form-data" method="post" action="/post">
                    {{csrf_field()}}
                    <div class="row">

                        <input type="hidden" name="myHiddenField">
                        <input type="file" name="filesToUpload[]" id="filesToUpload" multiple="multiple" />
                        <input type="submit" value="Upload" />

                    </div>
                </form>



                <script>
                    if (window.File && window.FileReader && window.FileList && window.Blob) {
                        document.getElementById('filesToUpload').onchange = function(){
                            var files = document.getElementById('filesToUpload').files;
                            for(var i = 0; i < files.length; i++) {
                                resizeAndUpload(files[i]);
                            }
                        };
                    } else {
                        alert('The File APIs are not fully supported in this browser.');
                    }
                </script>


                <script>
                    function resizeAndUpload(file) {
                        var reader = new FileReader();
                        reader.onloadend = function() {

                            var tempImg = new Image();
                            tempImg.src = reader.result;
                            tempImg.onload = function() {

                                var MAX_WIDTH = 1920;
                                var MAX_HEIGHT = 1080;
                                var tempW = tempImg.width;
                                var tempH = tempImg.height;
                                if (tempW > tempH) {
                                    if (tempW > MAX_WIDTH) {
                                        tempH *= MAX_WIDTH / tempW;
                                        tempW = MAX_WIDTH;
                                    }
                                } else {
                                    if (tempH > MAX_HEIGHT) {
                                        tempW *= MAX_HEIGHT / tempH;
                                        tempH = MAX_HEIGHT;
                                    }
                                }

                                var canvas = document.createElement('canvas');
                                canvas.width = tempW;
                                canvas.height = tempH;
                                var ctx = canvas.getContext("2d");
                                ctx.drawImage(this, 0, 0, tempW, tempH);

                                var imageData = canvas.toDataURL('image/jpeg', 0.3);

                                document.getElementsByName("myHiddenField")[0].setAttribute("value", imageData);
                            }
                        }
                        reader.readAsDataURL(file);
                    }
                </script>


            </div>
        </div>
    </div>
</body>
</html>




