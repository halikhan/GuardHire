<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>


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
    style="height:100%;width:60%;margin-left:auto;margin-right: auto;background-repeat: no-repeat;background-size: cover; background-image: url({{$message->embed(asset('website/images/1x/bac.png'))}});">
       <tr>
           <th>
            <img src="{{$message->embed(asset('website/images/1x/logo.png'))}}" alt="" style="width: 25%;margin-top: 20px;height: 100%;object-fit: cover;">
           </th>
       </tr>
       <tr>
        <th ><h1 style=" font-family:Cinzel-Medium;color: #EC0169;padding-top: 40px;text-transform: capitalize;">New Contact!</h1></th>
    </tr>
        <tr >

            <th style="padding-top: 40px;"><img src="{{$message->embed(asset('website/images/1x/contact.png'))}}" alt="" style="width:25%;border-radius: 20%;height: 100%;object-fit: cover;"></th>
        </tr>
        <tr>
            <h1 style="text-align: center">Contact Details</h1>
            </tr>
            <tr>
            <h3 style="margin-left: 210px;">Name : {{$data['name']}}</h3>
            <h3 style="margin-left: 210px;">Email : {{$data['email']}}</h3>
            <h3 style="margin-left: 210px;">Phone Number : {{$data['phone_number']}}</h3>
            <h3 style="margin-left: 210px;">Message : {{Str::limit($data['message'],60)}}</h3>
            </tr>
        {{-- <tr>
            <th><p style=" font-family: Poppins-SemiBold;color: #000;padding-top: 40px;">We have received your request.
            <br>
            Thank you so much! We are planning on answering you soon.
        </p></th>

        </tr> --}}
        <tr>
            <th>
                <img src="{{$message->embed(asset('website/images/1x/logo.png'))}}" alt=""
                    style="width: 10%;margin-top: 20px;height: 100%;object-fit: cover;margin-bottom: 10px;">
            </th>
        </tr>

    </table>

</body>
</html>