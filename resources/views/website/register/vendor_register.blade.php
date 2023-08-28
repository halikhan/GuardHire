<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        @font-face {
            font-family: Poppins-SemiBold;
            /* src: url(./assets/font/Poppins-SemiBold.ttf); */
            src: url({{ asset('template_assets/font/Poppins-SemiBold.ttf') }});
        }

        @font-face {
            font-family: Cinzel-Medium;
            /* src: url(./assets/font/Cinzel-Medium.ttf); */
            src: url({{ asset('template_assets/font/Cinzel-Medium.ttf') }});
        }

        @font-face {
            font-family: Poppins-Light;
            /* src: url(./assets/font/Poppins-Light.ttf); */
            src: url({{ asset('template_assets/font/Poppins-Light.ttf') }});
        }

        /* .for-blur-background tbody {
            backdrop-filter: blur(4px) !important;
        } */
    </style>

</head>

<body>


    <table
        style="height:100%;width:60%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: cover; background-image: url({{$message->embed(asset('website/images/1x/bac.png'))}});">
        <tr>
            <th>
                <img src="{{$message->embed(asset('website/images/1x/logo.png'))}}"
                    alt="" style="width: 25%;margin-top: 20px;height: 100%;object-fit: cover;">
            </th>
        </tr>
        <tr>
            <th style="font-family:Cinzel-Medium;color: #EC0169;padding-top: 10px;text-transform: capitalize;">
                <h1>Welcome!{{$data['name']}}</h1>
            </th>
        </tr>
        <tr>

            <th style="padding-top: 40px;"><img src="{{$message->embed(asset('website/images/1x/hand_shake.png'))}}" alt=""
                    style="width:25%;border-radius: 20%;height: 100%;object-fit: cover;"></th>
        </tr>

        <tr>
            <th>
                <p style="font-family: Poppins-SemiBold;color: #000;padding-top: 40px;">Your
                    registration is
                    pending from admin side, We'll get back to you.<br>After review your
                    registration.
                </p>
            </th>
        </tr>
        <tr>
            <th>
                <img src="{{$message->embed(asset('website/images/1x/logo.png'))}}"
                    alt=""
                    style="width: 10%;margin-top: 20px;height: 100%;object-fit: cover;margin-bottom: 10px;">
            </th>
        </tr>
        </tbody>

    </table>
</body>

</html>
