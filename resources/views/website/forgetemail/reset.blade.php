<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgotpassword</title>

    <style>
        @font-face {
            font-family: Poppins-SemiBold;
            src: url({{ asset('template_assets/font/Poppins-SemiBold.ttf') }});
        }
        @font-face {
            font-family:Cinzel-Medium;
            src: url({{ asset('template_assets/font/Cinzel-Medium.ttf') }});
        }
        .for-blur-background tbody {
            backdrop-filter: blur(4px);
        }
    </style>

</head>
<body>
    <table class="for-blur-background"
    style="height:100%;width:60%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: cover; background-image: url(https://project.designprosusa.com/guard_hire_dev/public/storage/uploads/cms/howItWorkImage.png);">
    {{-- <table class="for-blur-background"
    style="height:100%;width:60%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: cover; background-image: url(https://project.designprosusa.com/South_Dakota_Bride/public/storage/uploads/cms/2022-06-15__1655306047__vendors-banner.png);"> --}}
       <tr>
           <th>
            <img src="{{$message->embed(asset('frontend/assets/logo/logo.png'))}}" alt="" style="width: 25%;margin-top: 20px;height: 100%;object-fit: cover;">
           </th>
       </tr>
       <tr>
        <th ><h1 style=" font-family:Cinzel-Medium;color: #00264de6;padding-top: 40px;text-transform: capitalize;">Reset Password</h1></th>
    </tr>
        {{-- <tr >
            <th style="padding-top: 40px;"><img src="{{$message->embed(asset('frontend/assets/logo/bg.png'))}}" alt="" style="width:25%;border-radius: 20%;height: 100%;object-fit: cover;"></th>
        </tr> --}}

        {{-- <tr>
            <th><p style=" font-family: Poppins-SemiBold;color: #000;padding-top: 40px;">Not to worry, we got you! Let's get you a new password</p></th>
        </tr> --}}
        <tr>
            <h1 style="text-align: center">User Account Details</h1>
            </tr>
            <tr>
            <h3 style="margin-left: 210px;">Name : {{$data['name']}}</h3>
            <h3 style="margin-left: 210px;">Email : {{$data['email']}}</h3>
            <h3 style="margin-left: 210px;">Please Click Following Button to Reset Your Password </h3>
        </tr>
        <tr>
            <th style="padding-top: 40px;padding-bottom: 40px;">
                <a href="{{ url('reset-password/'.$token)}}"><button type="submit" style="background-color:#00264de6;text-decoration: none;cursor: pointer;color: #fff;padding:15px 15px ;border-top-width: 0px;padding: 10px 35px 10px 35px;margin-left: 10px;font-family: sans-serif;font-weight: 900;font-size: 13px;text-decoration: none;border: none;">RESET PASSWORD</a></button>
            </th>
        </tr>
        <tr>
            <th>
                <img src="{{$message->embed(asset('frontend/assets/logo/logo.png'))}}" alt=""
                    style="width: 10%;margin-top: 20px;height: 100%;object-fit: cover;margin-bottom: 10px;">
            </th>
        </tr>

    </table>

</body>
</html>
