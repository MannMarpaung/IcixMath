<!doctype html>
<html class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOM1JXt0DNZqq6MxR5whh1y4MF4z24XyP3wcvEg6" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>home</title>
    {{-- Icon --}}
    <link rel="icon" href="{{ asset('frontend/images/IcixBox.png') }}" type="image/x-icon">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                        customColor: '#efeef3',
                    }
                }
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>

    <style>
        .icon3d {
            flex-direction: column;
            transition: transform 0.3s ease;
            transform-style: preserve-3d;
        }

        #sidebar {
            transition: transform 0.3s ease;
            transform: translateX(100%);
            /* Sidebar tersembunyi saat load */
        }

        #sidebar.active {
            transform: translateX(0);
            /* Sidebar muncul jika tombol ditekan */
        }
    </style>
</head>

<body>
    {{-- NAVBAR --}}
    @include('layouts.frontend.include.navbar')

    <!-- home -->
    <section class="bg-white py-16 px-1 md:px-9">
        <div
            class="container mx-auto flex flex-col items-center justify-center text-center md:flex-row md:text-left md:items-center">
            <!-- Teks di bagian kiri -->
            <div class="md:w-1/2 md:pr-8">
                <h1 class="text-4xl font-bold text-gray-900">Getting <span class="text-blue-600">Quality</span>
                    Education Is Now More <span class="text-purple-600">Easy</span></h1>
                <p class="mt-4 text-gray-600">Provides you with the latest online learning experience and courses that
                    boost your knowledge easily.</p>
                <div class="mt-6">
                    <form action="{{ route('user.levels') }}">
                        <button class="px-12 py-2 bg-blue-600 text-white font-semibold rounded-md mr-4"
                            type="submit">Get
                            Started</button>
                    </form>
                </div>
            </div>

            <!-- Gambar di bagian kanan -->
            <div class="mt-10 md:mt-0 md:w-1/2 flex justify-center">
                <img src="{{ asset('frontend/images/icixmathdashboardlanding.jpg') }}" alt="Learning Image"
                    class="w-5/5 h-auto">
            </div>
        </div>
    </section>

    <!-- jumlah course, pengajar, murid -->
    <section class="bg-[#efeef3] rounded-lg p-4 mx-5 md:mx-9 lg:mx-15">
        <div class="container mx-auto grid grid-1 md:grid-cols-3 gap-8 text-center">

            <!-- jumlah course -->
            <div class="flex items-center space-x-4">
                <!-- icon -->
                <div class="w-20 h-20 bg-white rounded-lg flex justify-center items-center">
                    <svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg"
                        height="24" width="24" version="1.1" xmlns:cc="http://creativecommons.org/ns#"
                        xmlns:dc="http://purl.org/dc/elements/1.1/">
                        <g transform="translate(0 -1028.4)">
                            <path d="m3 1035.4v2 1 3 1 5 1c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-1-5-4-3h-18z"
                                fill="#16a085"></path>
                            <path d="m3 1034.4v2 1 3 1 5 1c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-1-5-4-3h-18z"
                                fill="#ecf0f1"></path>
                            <path d="m3 1033.4v2 1 3 1 5 1c0 1.1 0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-1-5-4-3h-18z"
                                fill="#bdc></path>
                            <path d="m3 1032.4v2 1 3 1 5 1c0 1.1
                                0.8954 2 2 2h14c1.105 0 2-0.9 2-2v-1-5-4-3h-18z" fill="#ecf0f1"></path>
                            <path
                                d="m5 1028.4c-1.1046 0-2 0.9-2 2v1 4 2 1 3 1 5 1c0 1.1 0.8954 2 2 2h2v-1h-1.5c-0.8284 0-1.5-0.7-1.5-1.5 0-0.9 0.6716-1.5 1.5-1.5h12.5 1c1.105 0 2-0.9 2-2v-1-5-4-3-1c0-1.1-0.895-2-2-2h-4-10z"
                                fill="#16a085"></path>
                            <path d="m8 1028.4v18h1 9 1c1.105 0 2-0.9 2-2v-1-5-4-3-1c0-1.1-0.895-2-2-2h-4-6-1z"
                                fill="#1abc9c"></path>
                            <path d="m7 1048.4v2 2l2.5-2 2.5 2v-2-2h-5z" fill="#e74c3c"></path>
                            <rect height="1" width="5" y="1047.4" x="7" fill="#c0392b"></rect>
                        </g>
                    </svg>
                </div>

                <!-- Teks -->
                <div class="text-left">
                    <h2 class="text-3xl font-bold text-blue-600">10k+</h2>
                    <p class="text-gray-600">Total Courses</p>
                </div>
            </div>

            <!-- jumlah pengajar -->
            <div class="flex items-center space-x-4">
                <!-- icon -->
                <div class="w-20 h-20 p-3 bg-white rounded-lg flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="1.99999in" height="1.99999in"
                        version="1.1"
                        style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd"
                        viewBox="0 0 2000 2000" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <defs>
                            <style type="text/css">
                                .fil0 {
                                    fill: #000002
                                }

                                .fil4 {
                                    fill: #00AB94
                                }

                                .fil5 {
                                    fill: #49A7FE
                                }

                                .fil3 {
                                    fill: #87C5FE
                                }

                                .fil1 {
                                    fill: #99A4AC
                                }

                                .fil2 {
                                    fill: #E3B486
                                }
                            </style>
                        </defs>
                        <g id="Layer_x0020_1">
                            <metadata id="CorelCorpID_0Corel-Layer"></metadata>
                            <path class="fil0"
                                d="M1149 927c-49,0 -90,-31 -107,-74l-84 0c-16,43 -57,74 -106,74 -49,0 -90,-31 -107,-74l-53 0 0 15c0,116 81,213 189,238 1,0 2,1 4,1 16,4 34,5 52,5l127 0c17,0 33,-1 48,-4l0 0 1 0 0 -1c112,-22 196,-121 196,-239l0 -15 -53 0c-17,43 -58,74 -107,74zm-149 926c0,0 0,0 0,0 -4,0 -9,0 -13,-2l0 0c0,0 0,0 0,0 -1,0 -2,0 -2,-1l-618 -251c-20,-8 -30,-30 -23,-50 92,-268 318,-339 400,-357l47 -34c-106,-54 -179,-164 -179,-290l0 -55 0 -260c-8,-31 -8,-64 -7,-101 0,-10 0,-20 0,-31 -1,-15 -2,-97 63,-168 64,-70 168,-106 310,-106 6,0 12,0 17,0 5,0 15,0 29,0 86,0 365,19 365,271l0 218 0 0 0 232c0,128 -75,239 -183,292l42 31c22,4 73,16 132,45 4,1 7,3 10,5 94,47 208,138 266,308 7,20 -3,42 -23,50l-618 251c0,1 -1,1 -2,1 -4,2 -8,2 -13,2zm-116 -665l-100 74c-5,4 -10,6 -16,7 -17,3 -44,10 -76,22l170 249 24 -115 -50 -75c-6,-10 -8,-22 -5,-33 3,-11 11,-20 21,-25l129 -63c11,-5 25,-6 36,0l131 63c10,5 18,14 21,25 3,11 1,23 -5,33l-50 75 24 115 169 -249c-44,-17 -76,-22 -80,-22 -7,-1 -13,-3 -18,-7l-99 -73c-15,2 -30,3 -46,3l-127 0c-18,0 -36,-1 -53,-4zm41 444l75 110 75 -110 -43 -207c-2,-10 0,-21 6,-30l34 -51 -72 -35 -72 35 34 51c6,9 8,20 6,30l-43 207zm455 -306l-228 336c-1,0 -1,1 -2,2l-42 62 458 -186c-46,-109 -119,-175 -186,-214zm-947 214l459 186 -272 -400c-68,40 -141,105 -187,214zm303 -862c-7,0 -15,-2 -21,-6 -8,-5 -16,-10 -23,-15l0 116 53 0c17,-43 58,-74 107,-74 49,0 90,31 106,74l84 0c17,-43 58,-74 107,-74 49,0 90,31 107,74l53 0 0 -104c-28,-10 -63,-32 -88,-83 -49,36 -133,80 -249,80 0,0 0,0 0,0 -24,0 -48,-2 -72,-5 -18,-3 -32,-17 -34,-35 -1,-8 -6,-50 5,-96 -33,19 -70,55 -98,123 -4,11 -13,20 -24,23 -4,2 -9,2 -13,2zm208 -93c10,1 19,1 28,1 0,0 0,0 0,0 151,0 233,-91 236,-95 10,-12 26,-17 40,-13 15,4 26,15 30,30 7,33 19,54 31,67l0 -157c0,-173 -199,-191 -285,-191 -15,0 -25,0 -25,0 -1,0 -2,0 -4,0 -5,0 -11,0 -17,0 -118,0 -203,27 -251,80 -46,50 -42,109 -42,109 0,1 0,3 0,4 0,11 0,22 0,33 -1,35 -1,60 5,80 0,1 1,2 1,3 5,15 14,28 30,42 78,-143 198,-150 224,-150 3,0 5,0 5,0 16,1 30,11 35,27 5,15 1,32 -11,42 -22,20 -29,59 -30,88zm239 228l0 0 0 -1c0,-18 -16,-33 -34,-33 -18,0 -34,15 -34,33l0 1 0 0c0,19 16,34 34,34 18,0 34,-15 34,-34zm-365 -1l0 1 0 0c0,19 15,34 34,34 18,0 34,-16 34,-34 0,-19 -15,-34 -34,-34 -19,0 -34,15 -34,33z">
                            </path>
                            <g id="_314878752">
                                <path class="fil1"
                                    d="M944 585c9,1 17,1 25,1l0 -83c-18,21 -24,56 -25,82zm25 -358c-114,2 -195,28 -242,80 -47,51 -42,109 -42,113 0,41 -4,85 6,116 5,15 14,28 30,42 78,-143 202,-152 229,-150 7,0 14,2 19,6l0 -207z">
                                </path>
                                <path class="fil2"
                                    d="M969 666c-23,0 -46,-2 -69,-5 -18,-3 -32,-17 -34,-35 -1,-8 -6,-50 5,-96 -33,19 -70,55 -98,123 -6,16 -20,25 -37,25 -16,0 -30,-11 -44,-21l0 116 53 0c37,-98 176,-98 213,0l11 0 0 -107z">
                                </path>
                                <path class="fil3"
                                    d="M818 812c1,47 68,45 68,1 0,-19 -15,-34 -34,-34 -19,0 -34,15 -34,33z"></path>
                                <path class="fil2"
                                    d="M958 853c-36,98 -176,98 -213,0l-53 0 0 15c0,116 81,213 189,238 20,4 34,6 56,6l32 0 0 -259 -11 0z">
                                </path>
                                <path class="fil4" d="M969 1324l-41 20 34 51c6,9 8,20 6,30l-43 207 44 64 0 -372z">
                                </path>
                                <path class="fil3"
                                    d="M969 1192l-32 0c-18,0 -36,-1 -53,-4l-100 74c-5,4 -10,6 -16,7 -17,3 -44,10 -76,22l170 249 24 -115 -50 -75c-13,-20 -5,-48 16,-58l117 -56 0 -44z">
                                </path>
                                <path class="fil5" d="M892 1726l-272 -400c-68,40 -141,105 -187,214l459 186z"></path>
                            </g>
                        </g>
                    </svg>
                </div>

                <!-- Teks -->
                <div class="text-left">
                    <h2 class="text-3xl font-bold text-blue-600">500+</h2>
                    <p class="text-gray-600">Expert Mentors</p>
                </div>
            </div>

            <!-- jumlah murid -->
            <div class="flex items-center space-x-4">
                <!-- icon -->
                <div class="w-20 h-20 p-3 bg-white rounded-lg flex justify-center items-center">
                    <svg xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:cc="http://creativecommons.org/ns#"
                        xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns:svg="http://www.w3.org/2000/svg"
                        xmlns="http://www.w3.org/2000/svg"
                        xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                        xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" width="64" height="64"
                        viewBox="0 0 16.933333 16.933333" version="1.1" id="svg8"
                        inkscape:version="0.92.3 (2405546, 2018-03-11)" sodipodi:docname="13-Student.svg">
                        <defs id="defs2"></defs>
                        <sodipodi:namedview id="base" pagecolor="#ffffff" bordercolor="#666666" borderopacity="1.0"
                            inkscape:pageopacity="0.0" inkscape:pageshadow="2" inkscape:zoom="3.9999998"
                            inkscape:cx="40.280162" inkscape:cy="5.1547418" inkscape:document-units="px"
                            inkscape:current-layer="layer2" showgrid="false" inkscape:snap-smooth-nodes="true"
                            inkscape:snap-page="true" inkscape:snap-midpoints="false"
                            inkscape:snap-intersection-paths="true" inkscape:object-paths="true"
                            inkscape:object-nodes="true" units="px" inkscape:snap-bbox="true"
                            inkscape:bbox-paths="false" inkscape:snap-bbox-midpoints="false"
                            inkscape:window-width="1920" inkscape:window-height="1040" inkscape:window-x="0"
                            inkscape:window-y="0" inkscape:window-maximized="1" inkscape:snap-grids="true"
                            inkscape:snap-to-guides="false" inkscape:snap-bbox-edge-midpoints="false"
                            inkscape:snap-nodes="true" inkscape:snap-others="false" inkscape:bbox-nodes="true"
                            showguides="true" inkscape:guide-bbox="true" inkscape:measure-start="0,0"
                            inkscape:measure-end="0,0" inkscape:snap-global="true">
                            <inkscape:grid type="xygrid" id="grid815" enabled="true"></inkscape:grid>
                        </sodipodi:namedview>
                        <metadata id="metadata5">
                            <rdf:rdf>
                                <cc:work rdf:about="">
                                    <dc:format>image/svg+xml</dc:format>
                                    <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"></dc:type>
                                    <dc:title></dc:title>
                                </cc:work>
                            </rdf:rdf>
                        </metadata>
                        <g inkscape:groupmode="layer" id="layer2" inkscape:label="13-Student">
                            <path inkscape:connector-curvature="0"
                                style="fill:#e2e7fa;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                d="M 8.4666666,0.79374999 4.7624999,2.38125 6.3706705,3.2747354 C 6.9189903,2.7049851 7.6750002,2.38125 8.4666666,2.38125 c 0.7915933,10e-8 1.5476664,0.3237833 2.0959964,0.8934854 L 12.170833,2.38125 Z"
                                id="path7646" sodipodi:nodetypes="ccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#a8c5f7;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:butt;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="M 10.584883,3.2959227 C 10.034951,2.7123159 9.2685535,2.3812501 8.4666666,2.38125 c -0.8024445,0 -1.5692575,0.3313909 -2.1192506,0.9157065 l 0.00336,1.4655434 C 6.8529393,4.0974268 7.6353271,3.705467 8.4666666,3.7041666 9.2992801,3.7051423 10.082866,4.097988 10.583333,4.7645669 Z"
                                id="path7629" sodipodi:nodetypes="ccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#91b8fb;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="M 10.584883,4.2400513 C 10.086287,3.5708463 9.3011916,3.1760958 8.4666666,3.175 7.6314122,3.176256 6.845795,3.5718423 6.347416,4.2421182 l 0.00336,0.5203817 C 6.8529393,4.0974268 7.6353271,3.705467 8.4666666,3.7041666 9.2992801,3.7051423 10.082866,4.097988 10.583333,4.7645669 Z"
                                id="ellipse7641" sodipodi:nodetypes="ccccccc"></path>
                            <path
                                style="opacity:1;fill:#e2e7fa;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="m 11.112501,6.3499985 c 0,1.4612535 -1.1845802,2.6458334 -2.6458338,2.6458332 -1.4612535,0 -2.6458334,-1.1845799 -2.6458335,-2.6458332 0,-1.4612534 1.18458,-2.6458333 2.6458335,-2.6458333 1.4612536,-2e-7 2.6458338,1.1845798 2.6458338,2.6458333 z"
                                id="ellipse7615" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccc"></path>
                            <path id="path7627"
                                d="m 8.4666664,3.7041666 c 0.085286,8.779e-4 0.1704793,0.00588 0.255282,0.014986 -1.3476434,0.1402555 -2.3715529,1.2759249 -2.3719485,2.630847 0.00139,1.361542 1.0358521,2.499746 2.3910685,2.6308471 -0.091146,0.00975 -0.1827368,0.014747 -0.274402,0.014986 -1.4612534,-2e-7 -2.6458332,-1.1845801 -2.6458332,-2.6458333 0,-1.4612532 1.1845798,-2.6458331 2.6458332,-2.6458333 z"
                                style="opacity:1;fill:#f8f8f8;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#c4d2f0;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="m 8.4666666,3.7041666 c -0.085286,8.779e-4 -0.1704791,0.00588 -0.2552817,0.014986 1.3476433,0.1402557 2.3715521,1.275925 2.3719481,2.630847 -0.0014,1.3615419 -1.0358519,2.4997459 -2.3910682,2.6308471 0.091146,0.00975 0.1827367,0.014747 0.2744018,0.014986 1.4612535,-10e-8 2.6458334,-1.18458 2.6458334,-2.6458333 0,-1.4612533 -1.1845799,-2.6458332 -2.6458334,-2.6458333 z"
                                id="ellipse7624" sodipodi:nodetypes="ccccccc"></path>
                            <path
                                style="opacity:1;fill:#e2e7fa;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="M 4.2333345,15.081248 H 12.7 c 0.293159,0 0.529167,0.236009 0.529167,0.529167 0,0.293159 -0.236008,0.529167 -0.529167,0.529167 H 4.2333345 c -0.2931584,0 -0.5291669,-0.236008 -0.5291669,-0.529167 0,-0.293158 0.2360085,-0.529167 0.5291669,-0.529167 z"
                                id="rect7598" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#a8c5f7;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:square;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="M 5.7453857,7.5669798 C 4.0745629,8.2865642 2.9104166,9.9454537 2.9104166,11.886096 v 0.854728 c 0,0.710346 0.5717466,1.282092 1.2820923,1.282092 2.8494384,0 5.6988767,0 8.5483151,0 0.710346,0 1.282092,-0.571746 1.282092,-1.282092 v -0.854728 c 0,-1.940392 -1.163975,-3.5993816 -2.834452,-4.3191162 H 10.813293 C 10.359048,8.4438853 9.4542398,8.9948203 8.4666666,8.9958332 7.4785358,8.9953991 6.572991,8.4443799 6.1184895,7.5669798 Z"
                                id="path7565" sodipodi:nodetypes="cccccccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#e2e7fa;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="m 4.4979176,15.081249 v -4.497916 c 0,-0.293159 0.2360086,-0.529167 0.5291672,-0.529167 H 11.90625 c 0.293159,0 0.529167,0.236008 0.529167,0.529167 v 4.497916 z"
                                id="path7577" sodipodi:nodetypes="cccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#f8f8f8;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:square;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="M 5.7453857,7.5669798 C 4.0745629,8.2865642 2.9104166,9.9454537 2.9104166,11.886096 v 0.854728 c 0,0.710346 0.5717466,1.282092 1.2820923,1.282092 h 0.3054077 0.2237589 c -0.7103456,0 -1.2820922,-0.571746 -1.2820922,-1.282092 v -0.854728 c 0,-1.9406423 1.1641463,-3.5995318 2.8349691,-4.3191162 z"
                                id="path7574" sodipodi:nodetypes="cccccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#91b8fb;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:square;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="m 10.659297,7.5669798 c 1.670477,0.7197346 2.834453,2.3787242 2.834453,4.3191162 v 0.854728 c 0,0.710346 -0.571746,1.282092 -1.282092,1.282092 h 0.223759 0.305407 c 0.710346,0 1.282092,-0.571746 1.282092,-1.282092 v -0.854728 c 0,-1.940392 -1.163975,-3.5993816 -2.834452,-4.3191162 z"
                                id="path7569" sodipodi:nodetypes="cccccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#c4d2f0;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="m 11.377083,10.054167 c 0.293159,0 0.529167,0.236007 0.529167,0.529166 v 4.497917 h 0.529167 v -4.497917 c 0,-0.293159 -0.236008,-0.529166 -0.529167,-0.529166 z"
                                id="path7581" sodipodi:nodetypes="ccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#91b8fb;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="M 10.813293,7.5669798 A 2.6458336,2.6458333 0 0 1 8.4666666,8.9958332 2.6458336,2.6458333 0 0 1 7.5509601,8.8284017 2.6458336,2.6458333 0 0 0 8.9958332,9.2604166 2.6458336,2.6458333 0 0 0 11.417908,7.6760172 c -0.07578,-0.037664 -0.151389,-0.075407 -0.229444,-0.1090374 z"
                                id="ellipse7617"></path>
                            <path
                                style="opacity:1;fill:#91b8fb;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:butt;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="M 10.584883,3.2959227 C 10.034951,2.7123159 9.2685535,2.3812501 8.4666666,2.38125 c -0.088856,0 -0.1768473,0.00593 -0.2645834,0.013952 0.7041304,0.064344 1.364597,0.3817371 1.8536338,0.9007202 v 0.9451621 c 0.199078,0.148912 0.376175,0.3251393 0.527616,0.5234821 z"
                                id="path7636" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccc"></path>
                            <path sodipodi:nodetypes="ccccccc" inkscape:connector-curvature="0" id="path7639"
                                d="M 6.3500002,3.2959227 C 6.8999318,2.7123159 7.6663297,2.3812501 8.4682171,2.38125 c 0.08885,0 0.176847,0.00593 0.264583,0.013952 C 8.0286697,2.459546 7.368203,2.776939 6.8791665,3.2959221 V 4.2410847 C 6.6800879,4.3899967 6.5029909,4.566224 6.3515502,4.7645668 Z"
                                style="opacity:1;fill:#f8f8f8;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:butt;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1">
                            </path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#c4d2f0;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="M 4.4979166,14.552083 V 15.08125 H 12.435417 V 14.552083 Z" id="rect7607"></path>
                            <path id="path7584"
                                d="m 5.5562502,10.054167 c -0.29316,0 -0.529167,0.236007 -0.529167,0.529166 v 4.497917 h -0.529167 v -4.497917 c 0,-0.293159 0.236008,-0.529166 0.529167,-0.529166 z"
                                style="opacity:1;fill:#f8f8f8;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#c4d2f0;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="m 12.170833,15.08125 c 0.293159,0 0.529167,0.236008 0.529167,0.529166 0,0.293159 -0.236008,0.529167 -0.529167,0.529167 H 12.7 c 0.293158,0 0.529167,-0.236008 0.529167,-0.529167 0,-0.293158 -0.236009,-0.529166 -0.529167,-0.529166 z"
                                id="rect7602" sodipodi:nodetypes="ccccccc"></path>
                            <path id="path7605"
                                d="m 4.7624996,15.08125 c -0.293158,0 -0.529166,0.236008 -0.529166,0.529166 0,0.293159 0.236008,0.529167 0.529166,0.529167 h -0.529166 c -0.293159,0 -0.529167,-0.236008 -0.529167,-0.529167 0,-0.293158 0.236008,-0.529166 0.529167,-0.529166 z"
                                style="opacity:1;fill:#f8f8f8;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccc"></path>
                            <path
                                style="opacity:1;fill:#a8c5f7;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="m 9.2604172,12.435415 c 0,0.438376 -0.355374,0.79375 -0.79375,0.79375 -0.438376,0 -0.79375,-0.355374 -0.79375,-0.79375 0,-0.438376 0.355374,-0.79375 0.79375,-0.79375 0.438376,0 0.79375,0.355374 0.79375,0.79375 z"
                                id="circle7586" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#91b8fb;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="m 8.2015665,11.688177 c 0.3169592,0.111815 0.5291348,0.411139 0.5296834,0.747242 -3.939e-4,0.335835 -0.2120988,0.635078 -0.5286499,0.747241 0.084748,0.03037 0.1740438,0.04609 0.2640666,0.04651 0.438376,0 0.79375,-0.355374 0.79375,-0.79375 0,-0.438376 -0.355374,-0.79375 -0.79375,-0.793752 -0.09037,2.98e-4 -0.1800254,0.01603 -0.2651001,0.04651 z"
                                id="circle7590" sodipodi:nodetypes="ccccccc"></path>
                            <path inkscape:connector-curvature="0"
                                style="opacity:1;fill:#f8f8f8;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1"
                                d="m 7.6729166,12.435417 c 0,0.438376 0.355374,0.79375 0.79375,0.79375 0.09037,-2.99e-4 0.1800253,-0.01603 0.2651,-0.04651 -0.3169588,-0.111815 -0.5291344,-0.411138 -0.5296834,-0.747241 3.935e-4,-0.335835 0.2120985,-0.635078 0.52865,-0.747242 -0.084748,-0.03037 -0.1740438,-0.04609 -0.2640666,-0.04651 -0.438376,2e-6 -0.79375,0.355376 -0.79375,0.793752 z"
                                id="circle7595" sodipodi:nodetypes="ccccccc"></path>
                            <path
                                style="fill:#c4d2f0;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1"
                                d="M 8.4666666,0.79374999 7.9374999,1.0206095 11.1125,2.38125 10.145634,2.9181681 c 0.148585,0.1052589 0.288925,0.2234708 0.417029,0.3565673 L 12.170833,2.38125 Z"
                                id="path7653" inkscape:connector-curvature="0" sodipodi:nodetypes="ccccccc"></path>
                            <path sodipodi:nodetypes="ccccccc" inkscape:connector-curvature="0" id="path7656"
                                d="M 8.466667,0.79374999 8.995833,1.0206095 5.8208332,2.38125 6.7876993,2.9181681 C 6.6391143,3.023427 6.4987738,3.1416389 6.3706705,3.2747354 L 4.7624999,2.38125 Z"
                                style="fill:#f8f8f8;fill-opacity:1;stroke:none;stroke-width:0.52916664;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-opacity:1">
                            </path>
                            <path
                                style="color:#000000;font-style:normal;font-variant:normal;font-weight:normal;font-stretch:normal;font-size:medium;line-height:normal;font-family:sans-serif;font-variant-ligatures:normal;font-variant-position:normal;font-variant-caps:normal;font-variant-numeric:normal;font-variant-alternates:normal;font-feature-settings:normal;text-indent:0;text-align:start;text-decoration:none;text-decoration-line:none;text-decoration-style:solid;text-decoration-color:#000000;letter-spacing:normal;word-spacing:normal;text-transform:none;writing-mode:lr-tb;direction:ltr;text-orientation:mixed;dominant-baseline:auto;baseline-shift:baseline;text-anchor:start;white-space:normal;shape-padding:0;clip-rule:nonzero;display:inline;overflow:visible;visibility:visible;opacity:1;isolation:auto;mix-blend-mode:normal;color-interpolation:sRGB;color-interpolation-filters:linearRGB;solid-color:#000000;solid-opacity:1;vector-effect:none;fill:#66a0fe;fill-opacity:1;fill-rule:nonzero;stroke:none;stroke-width:0.52916664;stroke-linecap:square;stroke-linejoin:round;stroke-miterlimit:4;stroke-dasharray:none;stroke-dashoffset:0;stroke-opacity:1;color-rendering:auto;image-rendering:auto;shape-rendering:auto;text-rendering:auto;enable-background:accumulate"
                                d="m 4.4976268,4.7614918 c 0,0.35286 0.52973,0.35286 0.52973,0 V 2.809152 l 1.05791,0.52865 v 1.3384199 c -0.3311699,0.4723601 -0.52921,1.05411 -0.52921,1.67328 0,0.32971 0.055,0.64682 0.1565899,0.9425799 l -0.0724,0.032 C 3.8749669,8.0845917 2.6458469,9.8404119 2.6458469,11.886592 v 0.8537 c 0,0.86258 0.6943899,1.54667 1.5468099,1.54667 l 0.0403,5.29e-4 v 0.52917 c -0.4352,0 -0.79434,0.35135 -0.79434,0.79478 0,0.44343 0.3601701,0.79272 0.79537,0.79272 h 8.4653492 c 0.4352,0 0.79537,-0.34929 0.79537,-0.79272 0,-0.44343 -0.35914,-0.79478 -0.79434,-0.79478 v -0.52917 l 0.0403,-5.29e-4 c 0.85243,0 1.54682,-0.68409 1.54682,-1.54667 v -0.8537 c 0,-2.0461801 -1.22912,-3.802 -2.9944,-4.5625101 l -0.0724,-0.032 c 0.10158,-0.29576 0.15659,-0.61287 0.15659,-0.94258 0,-0.61917 -0.19649,-1.1978099 -0.52766,-1.6701799 v -1.34153 l 1.43983,-0.7203701 c 0.19956,-0.10125 0.19117,-0.38908 -0.014,-0.47853 L 8.5704367,0.55087198 c -0.0322,-0.0139 -0.0668,-0.0213 -0.10388,-0.0217 -0.0371,4.3e-4 -0.0717,0.008 -0.1038799,0.0217 l -3.70501,1.58801992 c -0.10514,0.0459 -0.15892,0.14361 -0.16021,0.24185 z m 3.9691,-3.6793699 3.0755392,1.31723 -0.99279,0.4961 c -0.5750697,-0.49977 -1.3136792,-0.77825 -2.0827492,-0.77825 -0.7690701,0 -1.5076701,0.27848 -2.0827401,0.77825 l -0.9927899,-0.4961 z m 0,1.5642501 c 0.7017999,0 1.3626695,0.27598 1.8537992,0.7575798 V 4.107262 C 9.8166764,3.6899018 9.1703568,3.439602 8.4667269,3.439602 c -0.70363,0 -1.3483902,0.2471999 -1.8522402,0.6645598 V 3.4039519 C 7.1056168,2.922352 7.7649267,2.646372 8.4667268,2.646372 Z m 0,1.3223998 c 1.3090795,0 2.3809492,1.0624701 2.3809492,2.3807301 0,1.31827 -1.0666996,2.3807398 -2.3809492,2.3807398 -1.3142401,0 -2.3809401,-1.0624698 -2.3809401,-2.3807398 0,-1.31826 1.0718699,-2.3807301 2.3809401,-2.3807301 z m -2.5370199,3.80649 c 0.4956498,0.8873201 1.45024,1.4846601 2.5370199,1.4846601 1.0867895,0 2.0413792,-0.59734 2.5370192,-1.4846601 l 0.0806,0.0351 c 1.57598,0.6789499 2.67398,2.2416302 2.67398,4.0762302 v 0.8537 c 0,0.56396 -0.4492,1.01751 -1.0176,1.01751 h -0.0413 l 10e-4,-3.17397 c 1.45e-4,-0.43516 -0.349314,-0.7942301 -0.793814,-0.7942701 -2.2932596,-7.673e-4 -4.58652,-3.439e-4 -6.8797798,0 -0.4445,4e-5 -0.79396,0.3591101 -0.79382,0.7942701 l 10e-4,3.17397 h -0.041305 c -0.5684,0 -1.0176,-0.45355 -1.0176,-1.01751 v -0.8537 c 3e-5,-1.8346 1.098,-3.39728 2.6740098,-4.07623 z M 5.0268368,10.318772 c 2.29326,-7.68e-4 4.5865195,-3.44e-4 6.8797792,0 0.14497,1e-5 0.26466,0.11394 0.26461,0.2651 -5.55e-4,1.41077 0,2.82205 0,4.23282 H 4.7622368 c 0,-1.41077 5.503e-4,-2.82205 0,-4.23282 -5e-5,-0.15116 0.11964,-0.26509 0.2646,-0.2651 z m 3.43989,1.05833 c -0.5887201,0 -1.05894,0.47697 -1.05894,1.05834 0,0.58136 0.4713201,1.05833 1.05894,1.05833 0.58762,0 1.0589496,-0.47697 1.0589496,-1.05833 0,-0.58137 -0.4702196,-1.05834 -1.0589496,-1.05834 z m 0,0.52917 c 0.29541,0 0.5297301,0.24109 0.5297301,0.52917 0,0.28807 -0.2343201,0.52968 -0.5297301,0.52968 -0.2954101,0 -0.5297302,-0.24161 -0.5297302,-0.52968 0,-0.28808 0.2343201,-0.52917 0.5297302,-0.52917 z m -4.23267,3.43958 h 8.4653492 c 0.15117,0 0.26616,0.1217 0.26616,0.26562 0,0.14392 -0.11499,0.26355 -0.26616,0.26355 H 4.2340568 c -0.1511699,0 -0.26616,-0.11963 -0.26616,-0.26355 0,-0.14392 0.11499,-0.26562 0.26616,-0.26562 z"
                                id="path5658" inkscape:connector-curvature="0"
                                sodipodi:nodetypes="cccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccc">
                            </path>
                        </g>
                    </svg>
                </div>

                <!-- Teks -->
                <div class="text-left">
                    <h2 class="text-3xl font-bold text-blue-600">300k+</h2>
                    <p class="text-gray-600">All of Students</p>
                </div>
            </div>
        </div>
    </section>

    <!-- level  -->
    <section class="pt-32 mx-4 md:px-9 lg:mx-15">
        <div class="container mx-auto" id="levelSection">
            <div class="flex justify-between items-center mb-6">
                <div class="text-left">
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-gray-900">
                        Explore Level by Lesson
                    </h2>
                    <p class="mt-2 text-sm sm:text-base lg:text-lg text-gray-600">
                        Browse top class courses by browsing our category which will be more easy for you.
                    </p>
                </div>
            </div>

            <div class="mt-8 grid grid-cols-2 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach ($levels as $level)
                    <!-- level -->
                    <a href="/user/levels/#level{{ $level->id }}"
                        class="bg-white p-6 mb-4 rounded-lg shadow-md transition-transform duration-200 hover:shadow-lg hover:scale-105">
                        <div class="flex items-center">
                            <!-- Adjust container for image with fixed width and height -->
                            <div
                                class="bg-blue-100 p-3 rounded-lg mr-4 w-20 h-20 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('frontend/images/level_image.png') }}"
                                    alt="level-{{ $level->level }}" class="w-full h-full object-cover">
                            </div>
                            <div class="text-left">
                                <h3 class="text-base sm:text-lg lg:text-xl font-semibold text-blue-600">
                                    {{ $level->name }}
                                </h3>
                                <p class="text-xs sm:text-sm lg:text-base text-gray-600 mt-2">
                                    Level {{ $level->level }}
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>




    <!-- Popular Courses Section -->
    <section class="bg-gray-50 px-2 sm:px-5 md:px-9 lg:px-15 pt-32 pb-32" id="lessonSection">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl text-center font-bold text-gray-900">Popular lessons for you</h2>
            <p class="mt-4 mb-16 text-center text-sm sm:text-base lg:text-lg text-gray-600">
                Browse top class courses by browsing our categories which will be easier for you.
            </p>

            <!-- Grid responsif untuk HP, tablet, dan laptop -->
            <div class="mt-1 grid grid-cols-2 gap-6 md:grid-cols-3 lg:grid-cols-4 mx-auto max-w-screen-xl">
                @foreach ($lessons as $lesson)
                    <a href="{{ route('user.lessonDetail', [$level->id, $lesson->slug]) }}"
                        class="relative bg-white p-4 sm:p-6 rounded-lg shadow-md transition-transform duration-200 hover:shadow-lg hover:scale-105 mb-6">

                        <!-- Card Content -->
                        <div class="flex justify-center w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 mb-4">
                            <img src="{{ url('storage/lesson', $lesson->image) }}" alt="image"
                                class="w-full h-full object-cover rounded-md">
                        </div>

                        <p
                            class="bg-[#efeef3] w-16 sm:w-20 lg:w-24 h-5 sm:h-6 lg:h-7 text-xs sm:text-sm lg:text-base text-blue-600 font-semibold rounded-md mb-2">
                            Level {{ $lesson->levels->level }}</p>

                        <h3 class="text-sm sm:text-base lg:text-lg text-left font-semibold text-gray-900 mt-4 mb-4">
                            {{ $lesson->title }}</h3>

                        <div class="flex items-center justify-center space-x-3 sm:space-x-4 mt-2">
                            <!-- Ikon pengguna yang menyelesaikan kuis -->
                            <div class="flex items-center">
                                <div class="bg-[#616161] rounded-full p-1.5 sm:p-2 lg:p-3">
                                    <svg class="w-3 h-3 sm:w-3 sm:h-3 lg:w-4 lg:h-4 text-white" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    </svg>
                                </div>
                                <span class="text-gray-600 ml-3 text-xs sm:text-sm lg:text-base">
                                    {{ $lesson->user_quizzes->where('is_completed', true)->unique('user_id')->count() }}
                                </span>
                            </div>

                            <!-- Ikon popularitas -->
                            <div class="flex items-center">
                                <div class="bg-[#FCE96A] rounded-full p-1.5 sm:p-2 lg:p-3">
                                    <svg class="w-3 h-3 sm:w-3 sm:h-3 lg:w-4 lg:h-4 text-[#C27803]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-width="2"
                                            d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z" />
                                    </svg>
                                </div>
                                <span class="text-gray-600 ml-3 text-xs sm:text-sm lg:text-base">500k+</span>
                            </div>

                            <!-- Ikon harga -->
                            <div class="flex items-center">
                                <div class="bg-[#A9DFBF] rounded-full p-1.5 sm:p-2 lg:p-3">
                                    <svg class="w-3 h-3 sm:w-3 sm:h-3 lg:w-4 lg:h-4 text-[#388E3C]" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2"
                                            d="M8 17.345a4.76 4.76 0 0 0 2.558 1.618c2.274.589 4.512-.446 4.999-2.31.487-1.866-1.273-3.9-3.546-4.49-2.273-.59-4.034-2.623-3.547-4.488.486-1.865 2.724-2.899 4.998-2.31.982.236 1.87.793 2.538 1.592m-3.879 12.171V21m0-18v2.2" />
                                    </svg>
                                </div>
                                <span class="text-gray-600 ml-3 text-xs sm:text-sm lg:text-base">$50</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    <!-- Special Lessons Section -->
    {{-- <section class="bg-gray-50 px-2 sm:px-5 md:px-9 lg:px-15 pt-32 pb-32" id="specialLessonSection">
        <div class="container mx-auto text-center">
            <h2 class="text-2xl sm:text-3xl text-center font-bold text-gray-900">Special Lessons for You</h2>
            <p class="mt-4 mb-16 text-center text-sm sm:text-base lg:text-lg text-gray-600">
                Access these exclusive lessons after purchasing them to unlock advanced content.
            </p>

            <div id="gridContainer"
                class="mt-1 grid grid-cols-4 gap-8 md:grid-cols-3 lg:grid-cols-4 mx-auto max-w-screen-xl">
                <!-- Default is 4 columns -->
                <!-- Card Start -->
                <div
                    class="relative bg-white p-4 sm:p-6 rounded-lg shadow-md transition-transform duration-200 hover:shadow-lg hover:scale-105 mb-6">
                    <!-- Lock Overlay -->
                    <div
                        class="absolute inset-0 bg-gray-200 bg-opacity-70 flex items-center justify-center rounded-lg">
                        <i class="fas fa-lock text-gray-600 text-2xl sm:text-3xl"></i>
                    </div>
                    <!-- Card Content -->
                    <div class="flex justify-center w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 mb-4">
                        <img src="image-placeholder.jpg" alt="Lesson Image"
                            class="w-full h-full object-cover rounded-md">
                    </div>
                    <p
                        class="bg-gray-100 w-16 sm:w-20 lg:w-24 h-5 sm:h-6 lg:h-7 text-xs sm:text-sm lg:text-base text-blue-600 font-semibold rounded-md mb-2">
                        Level Placeholder</p>
                    <h3 class="text-sm sm:text-base lg:text-lg text-left font-semibold text-gray-900 mt-4 mb-4">Lesson
                        Title Placeholder</h3>
                </div>
                <!-- Card End -->

                <!-- Card Start -->
                <div
                    class="relative bg-white p-4 sm:p-6 rounded-lg shadow-md transition-transform duration-200 hover:shadow-lg hover:scale-105 mb-6">
                    <!-- Lock Overlay -->
                    <div
                        class="absolute inset-0 bg-gray-200 bg-opacity-70 flex items-center justify-center rounded-lg">
                        <i class="fas fa-lock text-gray-600 text-2xl sm:text-3xl"></i>
                    </div>
                    <!-- Card Content -->
                    <div class="flex justify-center w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 mb-4">
                        <img src="image-placeholder.jpg" alt="Lesson Image"
                            class="w-full h-full object-cover rounded-md">
                    </div>
                    <p
                        class="bg-gray-100 w-16 sm:w-20 lg:w-24 h-5 sm:h-6 lg:h-7 text-xs sm:text-sm lg:text-base text-blue-600 font-semibold rounded-md mb-2">
                        Level Placeholder</p>
                    <h3 class="text-sm sm:text-base lg:text-lg text-left font-semibold text-gray-900 mt-4 mb-4">Lesson
                        Title Placeholder</h3>
                </div>
                <!-- Card End -->

                <!-- Card Start -->
                <div
                    class="relative bg-white p-4 sm:p-6 rounded-lg shadow-md transition-transform duration-200 hover:shadow-lg hover:scale-105 mb-6">
                    <!-- Lock Overlay -->
                    <div
                        class="absolute inset-0 bg-gray-200 bg-opacity-70 flex items-center justify-center rounded-lg">
                        <i class="fas fa-lock text-gray-600 text-2xl sm:text-3xl"></i>
                    </div>
                    <!-- Card Content -->
                    <div class="flex justify-center w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 mb-4">
                        <img src="image-placeholder.jpg" alt="Lesson Image"
                            class="w-full h-full object-cover rounded-md">
                    </div>
                    <p
                        class="bg-gray-100 w-16 sm:w-20 lg:w-24 h-5 sm:h-6 lg:h-7 text-xs sm:text-sm lg:text-base text-blue-600 font-semibold rounded-md mb-2">
                        Level Placeholder</p>
                    <h3 class="text-sm sm:text-base lg:text-lg text-left font-semibold text-gray-900 mt-4 mb-4">Lesson
                        Title Placeholder</h3>
                </div>
                <!-- Card End -->

                <!-- Card Start -->
                <div
                    class="relative bg-white p-4 sm:p-6 rounded-lg shadow-md transition-transform duration-200 hover:shadow-lg hover:scale-105 mb-6">
                    <!-- Lock Overlay -->
                    <div
                        class="absolute inset-0 bg-gray-200 bg-opacity-70 flex items-center justify-center rounded-lg">
                        <i class="fas fa-lock text-gray-600 text-2xl sm:text-3xl"></i>
                    </div>
                    <!-- Card Content -->
                    <div class="flex justify-center w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 mb-4">
                        <img src="image-placeholder.jpg" alt="Lesson Image"
                            class="w-full h-full object-cover rounded-md">
                    </div>
                    <p
                        class="bg-gray-100 w-16 sm:w-20 lg:w-24 h-5 sm:h-6 lg:h-7 text-xs sm:text-sm lg:text-base text-blue-600 font-semibold rounded-md mb-2">
                        Level Placeholder</p>
                    <h3 class="text-sm sm:text-base lg:text-lg text-left font-semibold text-gray-900 mt-4 mb-4">Lesson
                        Title Placeholder</h3>
                </div>
                <!-- Card End -->

                <!-- Card Start -->
                <div
                    class="relative bg-white p-4 sm:p-6 rounded-lg shadow-md transition-transform duration-200 hover:shadow-lg hover:scale-105 mb-6">
                    <!-- Lock Overlay -->
                    <div
                        class="absolute inset-0 bg-gray-200 bg-opacity-70 flex items-center justify-center rounded-lg">
                        <i class="fas fa-lock text-gray-600 text-2xl sm:text-3xl"></i>
                    </div>
                    <!-- Card Content -->
                    <div class="flex justify-center w-24 h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 mb-4">
                        <img src="image-placeholder.jpg" alt="Lesson Image"
                            class="w-full h-full object-cover rounded-md">
                    </div>
                    <p
                        class="bg-gray-100 w-16 sm:w-20 lg:w-24 h-5 sm:h-6 lg:h-7 text-xs sm:text-sm lg:text-base text-blue-600 font-semibold rounded-md mb-2">
                        Level Placeholder</p>
                    <h3 class="text-sm sm:text-base lg:text-lg text-left font-semibold text-gray-900 mt-4 mb-4">Lesson
                        Title Placeholder</h3>
                </div>
                <!-- Card End -->
                <!-- Repeat additional cards as needed -->
            </div>
        </div>
    </section> --}}

    <!-- Footer -->
    <footer class="bg-white p-8">
        <!-- Logo/Nama Toko -->
        <div class="text-center mb-8">
            <div class="text-2xl font-bold">IcixMath</div>
            <div class="text-sm text-blue-700 mb-4">Learning Path</div>

            <!-- Social Media Icons -->
            <div class="flex justify-center space-x-4 mb-6">
                <a href="#" class="text-gray-600 hover:text-blue-700">
                    <i class="fab fa-facebook-f text-xl"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-blue-700">
                    <i class="fab fa-twitter text-xl"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-blue-700">
                    <i class="fab fa-pinterest text-xl"></i>
                </a>
                <a href="#" class="text-gray-600 hover:text-blue-700">
                    <i class="fab fa-instagram text-xl"></i>
                </a>
            </div>
        </div>

        <!-- Main Links Section -->
        <div class="grid grid-cols-4 gap-8 text-center text-gray-600 text-sm mb-8">
            <!-- Categories -->
            <div>
                <h3 class="font-semibold mb-2">CATEGORIES</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-blue-700">Accessories</a></li>
                    <li><a href="#" class="hover:text-blue-700">Jewelry</a></li>
                    <li><a href="#" class="hover:text-blue-700">Furniture</a></li>
                    <li><a href="#" class="hover:text-blue-700">Men</a></li>
                    <li><a href="#" class="hover:text-blue-700">Women</a></li>
                </ul>
            </div>

            <!-- Information -->
            <div>
                <h3 class="font-semibold mb-2">INFORMATION</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-blue-700">Specials</a></li>
                    <li><a href="#" class="hover:text-blue-700">New Products</a></li>
                    <li><a href="#" class="hover:text-blue-700">Best Sellers</a></li>
                    <li><a href="#" class="hover:text-blue-700">Our Stores</a></li>
                    <li><a href="#" class="hover:text-blue-700">Contact Us</a></li>
                </ul>
            </div>

            <!-- My Account -->
            <div>
                <h3 class="font-semibold mb-2">MY TIM</h3>
                <ul class="space-y-1">
                    <li><a href="#" class="hover:text-blue-700">Muhamad Azriel Ilham</a></li>
                    <li><a href="#" class="hover:text-blue-700">M</a></li>
                    <li><a href="#" class="hover:text-blue-700">My Addresses</a></li>
                </ul>
            </div>

            <!-- Contact Us -->
            <div>
                <h3 class="font-semibold mb-2">CONTACT US</h3>
                <p class="text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br>
                    Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br>
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.
                </p>
            </div>
        </div>

        <!-- Divider -->
        <hr class="my-8 border-gray-300">

        <!-- Footer Bottom -->
        <div class="text-center text-gray-500 text-xs mb-4">
            Designed by IcixBox | Idn BackpackerSchool Sentul
        </div>

        <!-- Payment Methods Icons -->
        <div class="flex justify-center space-x-4">
            <img src="{{ asset('frontend/images/idn-logo.png') }}" alt="Visa" class="inline-block size-24">
        </div>
    </footer>

</body>

</html>
