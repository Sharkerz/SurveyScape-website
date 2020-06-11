<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Survey Scape') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- captcha -->
    @yield('captcha')

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/card-notifs.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">

    <!-- JQuery et Ajax-->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Icones materialize -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Dark mode -->
{{--    <script src = "https://unpkg.com/darkreader@4.9.2/darkreader.js"></script>--}}

{{--    <script type="text/javascript">--}}

{{--            if(localStorage.getItem("text") == "brightness_3") {--}}
{{--                DarkReader.disable()--}}
{{--            } else if(localStorage.getItem("text") == "wb_sunny") {--}}
{{--                DarkReader.enable()--}}
{{--            }--}}
{{--            --}}
{{--        $(document).ready(function() {--}}
{{--            if(localStorage.getItem("text") == "brightness_3") {--}}
{{--                document.body.style.backgroundImage = "url(../background.png)";--}}
{{--            } else if(localStorage.getItem("text") == "wb_sunny") {--}}
{{--                document.body.style.backgroundImage = "none";--}}
{{--            }--}}
{{--            $('#sun').click(function(){--}}
{{--                if($('#sun').text() == 'brightness_3') {--}}
{{--                    document.body.style.backgroundImage = "none";--}}
{{--                    DarkReader.enable()--}}
{{--                    $('#sun').text('wb_sunny');--}}
{{--                    localStorage.setItem("text","wb_sunny");--}}
{{--                } else if($('#sun').text() == 'wb_sunny') {--}}
{{--                    DarkReader.disable()--}}
{{--                    $('#sun').text('brightness_3');--}}
{{--                    document.body.style.backgroundImage = "url(../background.png)";--}}
{{--                    localStorage.setItem("text","brightness_3");--}}
{{--                }--}}
{{--            });--}}

{{--            $('#sun').on('click', function() {--}}
{{--                localStorage.input = $(this).text();--}}
{{--            });--}}

{{--        });--}}

{{--    </script>--}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <a class="navbar-brand" href="{{ url('/') }}">
            <svg
            id="bas"
            width="280"
            height="38"
            viewBox="430 0 1416 316"
            fill="none"
            xmlns="http://www.w3.org/2000/svg">
                <rect width="1416" height="316" fill="white"/>
                <path d="M918.7 264.5C918.7 264.5 915.6 263.8 909.5 262.5C903.4 261.2 897.7 259.2 892.4 256.6C887.1 254 882.1 250.7 877.5 246.8L889.9 231.6C895.3 236.3 901.3 239.8 907.8 242.1C914.3 244.4 921.4 245.6 929 245.6C939.3 245.6 947.3 243.7 952.9 239.9C958.5 236.1 961.4 230.7 961.4 223.7V223.6C961.4 218.7 960.1 214.7 957.5 211.8C954.9 208.9 951.6 206.8 947.5 205.4C943.4 204 938.2 202.7 931.7 201.5C931.5 201.4 931.3 201.4 931.1 201.4C930.9 201.4 930.7 201.4 930.5 201.3L929 201C919.5 199.4 911.8 197.5 905.8 195.5C899.8 193.5 894.7 189.7 890.5 184.3C886.3 178.9 884.2 171.1 884.2 161.1V161C884.2 152.2 886.2 144.7 890.1 138.5C894 132.3 899.8 127.5 907.3 124.3C914.9 121 923.9 119.4 934.5 119.4C939.6 119.4 944.6 120 949.5 121.1C954.4 122.2 959.3 123.9 964.1 126C968.9 128.2 973.6 130.9 978.2 134.3L966.9 150.1C961.5 146.1 956.1 143.2 950.7 141.2C945.3 139.2 939.9 138.2 934.5 138.2C924.8 138.2 917.3 140.1 911.9 144C906.5 147.9 903.8 153.4 903.8 160.5V160.6C903.8 165.5 905.2 169.3 908 172.1C910.8 174.9 914.2 177 918.4 178.3C922.5 179.6 928.3 181 935.6 182.5C935.9 182.6 936.1 182.6 936.3 182.6C936.5 182.6 936.8 182.7 937 182.7C937.3 182.8 937.7 182.8 938.1 182.9C938.5 183 938.8 183 939.2 183.1C947.8 184.9 955 186.9 960.7 189.4C966.5 191.8 971.3 195.7 975.2 201.1C979.1 206.5 981 213.8 981 223.1V223.3C981 232 978.9 239.4 974.8 245.5C970.7 251.6 964.8 256.3 957 259.6C949.2 262.8 939.8 264.4 928.8 264.4C922.1 264.5 918.7 264.5 918.7 264.5Z" fill="black"/>
                <path d="M1034.5 264.5C1034.5 264.5 1031.2 262.8 1024.7 259.3C1018.2 255.8 1013.2 250.8 1009.7 244.3C1006.2 237.7 1004.5 229.8 1004.5 220.5V203.8C1004.5 194.6 1006.2 186.8 1009.7 180.3C1013.2 173.8 1018.1 168.8 1024.7 165.4C1031.3 162 1039.1 160.3 1048.4 160.3C1053.7 160.3 1058.6 160.9 1063.3 162.2C1068 163.5 1072.1 165.3 1075.8 167.7C1079.5 170.1 1082.6 173 1085.1 176.5L1070.7 189.4C1067.8 186.1 1064.5 183.6 1060.6 181.9C1056.8 180.1 1052.8 179.3 1048.6 179.3C1040.9 179.3 1035 181.4 1030.7 185.7C1026.5 190 1024.4 196.1 1024.4 203.9V220.6C1024.4 228.6 1026.5 234.8 1030.7 239.2C1034.9 243.6 1040.9 245.7 1048.6 245.7C1052.8 245.7 1056.9 244.8 1060.7 242.9C1064.5 241 1067.9 238.3 1070.7 234.9L1085.1 248.8C1082.6 252.2 1079.4 255.1 1075.7 257.4C1072 259.8 1067.8 261.6 1063.2 262.8C1058.5 264 1053.6 264.7 1048.4 264.7C1039.2 264.5 1034.5 264.5 1034.5 264.5Z" fill="black"/>
                <path d="M1111.5 256.7C1105.3 251.5 1102.2 243.7 1102.2 233.1C1102.2 223.1 1105 215.6 1110.7 210.5C1116.4 205.5 1124.9 203 1136.4 203H1165.2L1166.6 219H1136.5C1131.3 219 1127.4 220.2 1124.8 222.5C1122.2 224.8 1120.9 228.3 1120.9 233.1C1120.9 238.2 1122.6 242.1 1126 244.5C1129.4 247 1134.6 248.2 1141.6 248.2C1149.2 248.2 1154.9 247.4 1158.6 245.8C1162.3 244.2 1164.2 241.6 1164.2 238.2L1166.3 252.5C1164.5 255.2 1162.4 257.5 1159.8 259.2C1157.2 261 1154.2 262.3 1150.9 263.2C1147.5 264.1 1143.7 264.5 1139.5 264.5C1127 264.5 1117.7 261.9 1111.5 256.7ZM1164.3 198.7C1164.3 192.1 1162.5 186.9 1159 183.2C1155.5 179.5 1150.4 177.7 1143.9 177.7C1139.9 177.7 1135.9 178.3 1132 179.6C1128.1 180.8 1124.7 182.6 1121.7 184.8L1107.1 174.8C1110.9 170.2 1116 166.6 1122.3 164C1128.6 161.4 1135.6 160.1 1143.2 160.1C1151.6 160.1 1158.8 161.6 1164.8 164.5C1170.8 167.5 1175.3 171.8 1178.5 177.4C1181.6 183 1183.2 189.8 1183.2 197.8V263H1164.3V198.7V198.7Z" fill="black"/>
                <path d="M1213.5 161.6H1233.4V304.2H1213.5V161.6ZM1242.4 259.9C1237.7 256.9 1234.3 252.6 1232 247.1L1233.4 225.9C1233.4 230.3 1234.2 234 1235.7 237C1237.3 240.1 1239.5 242.4 1242.5 244C1245.5 245.6 1249.1 246.4 1253.3 246.4C1259.9 246.4 1265 244.4 1268.6 240.4C1272.2 236.4 1274 230.7 1274 223.5V201.5C1274 194.1 1272.2 188.3 1268.6 184.2C1265 180.1 1259.9 178 1253.3 178C1249.1 178 1245.5 178.8 1242.5 180.3C1239.5 181.9 1237.3 184.2 1235.7 187.2C1234.1 190.2 1233.4 193.9 1233.4 198.1L1231.3 178.6C1234.4 172.7 1238.4 168.1 1243.3 164.9C1248.2 161.7 1253.7 160.1 1259.8 160.1C1267 160.1 1273.1 161.7 1278.2 164.9C1283.3 168.1 1287.2 172.8 1289.9 179C1292.6 185.2 1293.9 192.6 1293.9 201.4V223.5C1293.9 232.1 1292.5 239.5 1289.8 245.6C1287.1 251.7 1283.1 256.4 1277.8 259.6C1272.5 262.8 1266.2 264.4 1258.9 264.4C1252.6 264.5 1247.1 263 1242.4 259.9Z" fill="black"/>
                <path d="M1349.8 264.5C1349.8 264.5 1346.5 262.7 1339.8 259.2C1333.1 255.7 1328.1 250.5 1324.6 243.7C1321.1 236.9 1319.4 228.7 1319.4 219V207.6C1319.4 197.6 1321.1 189 1324.4 181.9C1327.8 174.8 1332.6 169.4 1339 165.7C1345.4 162 1353.1 160.1 1362 160.1C1370.5 160.1 1377.7 162.2 1383.7 166.4C1389.7 170.6 1394.3 176.8 1397.4 184.8C1400.6 192.8 1402.1 202.4 1402.1 213.6V220.2H1333.7V204.2H1383.1C1382.5 195.9 1380.4 189.5 1376.7 184.9C1373 180.3 1368.1 178 1361.9 178C1354.3 178 1348.5 180.5 1344.4 185.4C1340.3 190.3 1338.2 197.3 1338.2 206.4V219.3C1338.2 227.7 1340.4 234.1 1344.8 238.6C1349.2 243.1 1355.5 245.3 1363.6 245.3C1367.6 245.3 1371.6 244.5 1375.6 242.9C1379.6 241.3 1383.1 239 1386.2 236.1L1399.3 249.2C1394.3 254 1388.7 257.7 1382.4 260.4C1376.1 263.1 1369.9 264.4 1363.6 264.4C1354.5 264.5 1349.8 264.5 1349.8 264.5Z" fill="black"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M668 186.8C668 186.8 717.6 225 744.5 282C744.5 282 853.3 44.5 946 0C946 0 836.6 48.6 732.6 204.2C732.6 204.2 733.8 198.7 668 186.8Z" fill="#006837"/>
                <path d="M96.4 264.5C96.4 264.5 93.5 263.8 87.7 262.5C81.9 261.2 76.5 259.1 71.4 256.4C66.4 253.7 61.7 250.3 57.3 246.3L69.1 230.5C74.2 235.4 79.9 239 86.1 241.4C92.3 243.8 99 245 106.2 245C116 245 123.5 243 128.9 239.1C134.3 235.2 137 229.6 137 222.4V222.3C137 217.2 135.8 213.1 133.3 210.1C130.9 207.1 127.7 204.9 123.8 203.4C119.9 202 115 200.6 108.8 199.4C108.6 199.3 108.4 199.3 108.2 199.3C108 199.3 107.8 199.3 107.6 199.2L106.2 198.9C97.2 197.2 89.8 195.3 84.2 193.2C78.5 191.1 73.7 187.2 69.7 181.6C65.7 176 63.7 168 63.7 157.6V157.5C63.7 148.4 65.6 140.6 69.3 134.2C73 127.8 78.5 122.9 85.7 119.5C92.9 116.1 101.5 114.4 111.6 114.4C116.4 114.4 121.2 115 125.8 116.1C130.5 117.2 135.1 118.9 139.6 121.2C144.1 123.5 148.6 126.3 153 129.7L142.3 146.1C137.2 142 132.1 138.9 127 136.9C121.9 134.8 116.8 133.8 111.7 133.8C102.5 133.8 95.3 135.8 90.3 139.8C85.2 143.8 82.7 149.5 82.7 156.8V156.9C82.7 162 84 165.9 86.6 168.8C89.2 171.7 92.5 173.8 96.4 175.2C100.3 176.6 105.8 178 112.8 179.5C113 179.6 113.3 179.6 113.5 179.7C113.7 179.7 113.9 179.8 114.2 179.9C114.5 180 114.8 180 115.2 180.1C115.6 180.2 115.9 180.2 116.2 180.3C124.4 182.1 131.2 184.3 136.6 186.8C142.1 189.3 146.6 193.3 150.3 198.9C154 204.5 155.8 212.1 155.8 221.7V221.9C155.8 230.9 153.9 238.5 150 244.9C146.1 251.3 140.5 256.1 133.1 259.5C125.7 262.8 116.8 264.5 106.4 264.5C99.7 264.5 96.4 264.5 96.4 264.5Z" fill="black"/>
                <path d="M199.6 221.9C199.6 229.2 201.3 234.9 204.7 238.9C208.1 242.9 213 244.9 219.2 244.9C225.4 244.9 230.2 243.1 233.6 239.5C237 235.9 238.7 230.8 238.7 224.2L240 246.1C238 251.3 234.8 255.6 230.4 259.1C226 262.6 220.5 264.4 214 264.4C203.4 264.4 195.2 260.7 189.4 253.2C183.6 245.8 180.7 235.3 180.7 221.7V157.9H199.6V221.9V221.9ZM238.7 158.1H257.5V263H238.7V158.1Z" fill="black"/>
                <path d="M286.2 158.1H305.1V263H286.2V158.1ZM332.8 177.9C330.3 176.8 327.3 176.2 324 176.2C318 176.2 313.4 178 310.1 181.6C306.8 185.2 305.1 190.2 305.1 196.6L303.2 176.4C306.2 170.1 310 165.3 314.7 161.8C319.4 158.3 324.6 156.6 330.3 156.6C334.7 156.6 338.7 157.3 342.2 158.7C345.8 160.1 348.9 162.1 351.5 164.8L339.2 183C337.4 180.7 335.3 179 332.8 177.9Z" fill="black"/>
                <path d="M423.8 158.1H443.5L407.4 263H393.1L357 158.1H376.7L400.2 233L423.8 158.1Z" fill="black"/>
                <path d="M486.2 264.5C486.2 264.5 483 262.7 476.7 259C470.4 255.4 465.6 250 462.3 243C459 236 457.3 227.5 457.3 217.5V205.7C457.3 195.3 458.9 186.5 462.1 179.1C465.3 171.8 469.9 166.2 476 162.3C482.1 158.5 489.3 156.5 497.9 156.5C505.9 156.5 512.8 158.7 518.5 163.1C524.2 167.5 528.5 173.8 531.5 182.1C534.5 190.4 536 200.3 536 211.9V218.8H471.1V202.2H518C517.4 193.6 515.4 187 511.9 182.2C508.4 177.4 503.7 175.1 497.9 175.1C490.7 175.1 485.2 177.7 481.3 182.8C477.4 187.9 475.4 195.2 475.4 204.5V217.8C475.4 226.5 477.5 233.2 481.7 237.8C485.9 242.5 491.9 244.8 499.6 244.8C503.4 244.8 507.2 244 511 242.3C514.8 240.6 518.1 238.3 521.1 235.2L533.5 248.7C528.7 253.7 523.4 257.5 517.5 260.3C511.6 263 505.6 264.4 499.6 264.4C490.7 264.5 486.2 264.5 486.2 264.5Z" fill="black"/>
                <path d="M548 158.1H567.3L596.9 249.3L586.4 271.6L548 158.1ZM633.2 158.1L592.2 287.6C590.7 292.4 588.8 296.2 586.4 299C584 301.8 581 303.8 577.5 305C574 306.2 569.7 306.8 564.5 306.8H560.7V287H564.5C568 287 570.8 286.2 572.9 284.7C575 283.1 576.8 280.5 578.3 276.7L613.9 158.1H633.2Z" fill="black"/>
                <path d="M566.9 297H68.3C68.3 297 16 302 16 255C16 208 16 127 16 127C16 127 17.9 80 68.3 79C118.7 78 577.5 79 577.5 79C577.5 79 622 80 623 120" stroke="black" stroke-width="19.8" stroke-miterlimit="10"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M623 130C623 130 613 131 613 119H633C633 131 623 130 623 130Z" fill="black"/>
            </svg>
            </a>
            <div class="container">

                @guest
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <a class="link_header" href="{{ route('listeFormulaire') }}">
                            Formulaires
                        </a>
                    </div>
                @else
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a class="link_header" href="{{ route('accueil') }}">
                            Accueil
                        </a>
                        <a class="link_header" href="{{ route('listeFormulaire') }}">
                            Formulaires
                        </a>
                        <a class="link_header" href="{{ route('formulaires.index') }}">
                            Mes formulaires
                        </a>
                        <a class="link_header" href="{{ route('Amis.index') }}">
                            Mes amis
                        </a>
                    </ul>

                </div>
                @endguest
            </div>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('auth.Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('auth.Register') }}</a>
                        </li>
                    @endif
                @else

                    <div class="btn-group">
                        <i id="sun" class="material-icons icone_darktheme nav-link"></i>
                        <i class="material-icons nav-link" id="icon_notif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">notifications_none</i>
                        <div class="dropdown-menu dropdown-menu-left" id="list_notif">
                            <h6 class="dropdown-header">Demandes d'amis</h6>
                        </div>
                    </div>

                    <img id="avatar_header" src="/avatar/{{ Auth::user()->avatar }}" onclick="window.location='{{ route("profil.index") }}'">

                @endguest
            </ul>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
        <div class="container-fluid" id="footer">
        <div class="row">
            <div class="col lfooter" >
                <p></p>
            </div>
            <div class="col lfooter" >
                <p>Conditions d'utilisation</p>
            </div>
            <div class="col lfooter">
            <p>Equipe de direction</p>
            </div>
            <div class="col lfooter">
            <p>Politique de confidentialité</p>
            </div>
            <div class="col" id="l4footer">
            <img src="https://img.icons8.com/material/48/000000/linkedin--v1.png"/>
            </div>
            <div class="col lfooter" >
                <p></p>
            </div>

        </div>
        </div>

        </div>

    @guest
    @else
    <!-- Script notifications -->
    <script type="text/javascript" src="{{ URL::asset('js/Notifications.js') }}"></script>
@endguest

{{--<script type="text/javascript">--}}
{{--        $('#sun').text(localStorage.getItem("text"));--}}
{{--        if(localStorage.getItem("text") == null){--}}
{{--            $('#sun').text("brightness_3");--}}
{{--            document.body.style.backgroundImage = "url(../background.png)";--}}
{{--        }--}}
{{--</script>--}}

</body>
</html>
