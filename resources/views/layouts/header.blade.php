 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=Edge">
 <meta name="description" content="">
 <meta name="keywords" content="">
 <meta name="team" content="">
 <meta name="csrf-token" content="{{ csrf_token() }}">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <title>LELE LOYALTY</title>

 <link rel="icon" href="{{ asset('storage/LELE.png') }}" type="image/x-icon">
 <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

 {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
 <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
 <link rel="stylesheet" href="{{ asset('css/bs.css') }}">
 <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
 <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
 <link rel="stylesheet" href="{{ asset('css/tooplate-style.css') }}">

 {{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}
 <link href="{{ asset('css/aos.css') }}" rel="stylesheet">
 <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
 <link href="{{ asset('css/admin/sweetalert2.min.css') }}" rel="stylesheet" />

 <style>
     /* For navbar fixed position */
     .navbar-fixed-top {
         position: fixed;
         top: 0;
     }

     .animate {
         animation: example 0.2s linear 0s forwards;
     }

     @keyframes example {
         0% {
             transform: translate(500px, 100px);
         }

         100% {
             transform: translate(0px, 0px);
         }
     }



     /* For asterisk of contact form */
     .asterisk {
         position: absolute;
         top: 50%;
         right: 20px;
         transform: translateY(-50%);
         color: red;
         font-size: 14px;
     }

     .asterisk-second {
         position: absolute;
         top: 20%;
         right: 20px;
         transform: translateY(-50%);
         color: red;
         font-size: 14px;
     }


     /* For button to back to top */
     .hover-text {
         position: absolute;
         bottom: 60px;
         left: 50%;
         transform: translateX(-50%);
         visibility: hidden;
         opacity: 0;
         transition: opacity 0.3s, visibility 0.3s;
         font-size: 14px;
         white-space: nowrap;
         background-color: rgba(0, 0, 0, 0.7);
         color: white;
         padding: 5px 10px;
         border-radius: 5px;
     }

     .back-to-top-btn:hover .hover-text {
         visibility: visible;
         opacity: 1;
     }

     .back-to-top-btn {
         position: fixed;
         bottom: 20px;
         right: 20px;
         background-color: #007aff;
         color: white;
         border: none;
         padding: 10px;
         border-radius: 50%;
         height: 50px;
         width: 50px;
         font-size: 24px;
         cursor: pointer;
         display: none;
         text-align: center;
         box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
     }

     .back-to-top-btn:hover {
         background-color: #006ee4af;
     }

     .back-to-top-btn i {
         line-height: 1;
     }
 </style>
