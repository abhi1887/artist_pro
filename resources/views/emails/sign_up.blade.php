@include('emails.layout.header')
<body id="email" class="mt-5">
    <table style="padding: 0; margin: 0; background-color: rgb(40,40,40); text-align: center; width: 100%; height: 100%; bottom: 0; text-align: center; align-items: center; ">
        <tr></tr>
    </table>
    <div style="text-align: center;">
        <h2 class="text-center bg-dark" style="color: #fff">Artist</h2>
    </div>
    
    <div style="font-size: 18px;">
        <p>Hello! {{ $name }}</p>
        <p>
            Name : {{ $name }}
        </p>
        <p>
            Email : {{ $email }}
        </p>
        <p>
            Password : {{ $password }}
        </p>
    </div>
    <div style="border: none;">
        <p>Regards,<br>
        Artist</p>
    </div>
</body>
@include('emails.layout.footer')
</html>