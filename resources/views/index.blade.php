<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مسابقة النائب أشرف امين</title>
    <link rel="shortcut icon" href="{{ asset('images/cover.png') }}" type="image/x-icon">
    <!-- Fontasome Library -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <!-- Container Cover -->
    <link rel="stylesheet" href="{{ asset('css/container_cover.css') }}">
    <!-- Desgin System 4 Colors -->
    <link rel="stylesheet" href="{{ asset('css/desgin_system.css') }}">
    <!-- Loading Css System -->
    <link rel="stylesheet" href="{{ asset('css/loading.css') }}">
    <!-- Main Css File -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <!-- MediaQ File -->
    <link rel="stylesheet" href="{{ asset('mediaQ.css') }}">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@600;700&family=Tajawal:wght@200;300;400;500;700;800;900&family=Work+Sans:wght@200;300;400;500;600;700;800&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- === Preloader Start === -->
    <div id="preloader">
        <div class="main">
            <div class="balls balls-1">
                <div class="ball ball--1"></div>
                <div class="ball ball--2"></div>
                <div class="ball ball--3"></div>
                <div class="ball ball--4"></div>
            </div>
            <div class="balls balls-2">
                <div class="ball ball--1"></div>
                <div class="ball ball--2"></div>
                <div class="ball ball--3"></div>
                <div class="ball ball--4"></div>
            </div>
        </div>
    </div>
    <!-- === Preloader End === -->

    <div class="body-page">
        <!-- Stars -->
        <div class="container-cover">
            <div class="cover-1"></div>
            <div class="moon"></div>
            <div class="stars">
                <div class="star-1"></div>
                <div class="star-1"></div>
                <div class="star-1"></div>
                <div class="star-1"></div>
                <div class="star-2"></div>
                <div class="star-2"></div>
                <div class="star-3"></div>
            </div>
            <div class="lanterns">
                <div class="lantern-1"></div>
                <div class="lantern-2"></div>
                <div class="lantern-3"></div>
                <div class="lantern-4"></div>
                <div class="lantern-5"></div>
            </div>
        </div>
        <div class="container">
            <!-- Landing Home -->
            <div id="started" class="get-started">
                <div class="heading">
                    <h2>مرحبا بك!</h2>
                    <p>مسابقة <span>النائب أشرف امين</span> لشهر رمضان المبارك ! ماذا تنتظر ..</p>
                    <div class="button">
                        <div class="wrapper">
                            <a id="btn" class="btn-1" href="#form"><span>جرب الآن</span></a>
                        </div>
                    </div>
                    <div class="res-btn">
                        <a href="#form">جرب الأن</a>
                    </div>
                </div>
                <div class="cover-2">
                    <img src="{{ asset('images/cover.png') }}" title="يمكنك الإجابة علي الإسئلة!!" alt="pro">
                </div>
            </div>
            <!-- Form Quest -->
            <div id="form" class="form">
                <div class="container-cover-2">
                    <div class="stars">
                        <div class="star-4"></div>
                        <div class="star-4"></div>
                        <div class="star-5"></div>
                        <!-- <div class="star-6"></div> -->
                        <div class="lantern-6"></div>
                        <div class="lantern-7"></div>
                        <div class="lantern-8"></div>
                    </div>
                </div>
                <div class="title-heading">
                    <h2>مرحبا مره آخري</h2>
                    <p>
                        @if ($question==null)
                        {{ "لايوجد اسئله حتى الان" }}
                        @else
                        {{ $question }}
                        @endif
                    </p>
                </div>
                @error('name')
                <p id="notice" class="alert">{{ $message }}</p>
                @enderror
                @error('number')
                <p id="notice" class="alert">{{ $message }}</p>
                @enderror
                @error('address')
                <p id="notice" class="alert">{{ $message }}</p>
                @enderror
                @error('answer')
                <p id="notice" class="alert">{{ $message }}</p>
                @enderror
                <div class="form-group">
                    <form action="{{ route('QuestionStore') }}" method="post">
                        @csrf
                        <!-- Name-Input -->
                        <label for="name"></label>
                        <input id="name" type="text" class="name-input" name="name" placeholder="أكتب اسمك"
                            autocomplete="off">
                        <!-- Number-Input -->
                        <label for="number"></label>
                        <input id="number" type="number" class="number-input" name="number" placeholder="أكتب رقمك"
                            autocomplete="off">
                        <!-- Addreas-Input -->
                        <label for="addreas"></label>
                        <input id="addreas" type="text" class="addreas-input" name="address" placeholder="أكتب عنوانك"
                            autocomplete="off">
                        <!-- Answer-Input -->
                        <label for="answer"></label>
                        <input id="answer" type="text" class="answer-input" name="answer" placeholder="أكتب الإجابة"
                            autocomplete="off">
                        <!-- Notice -->
                        <!-- Button -->
                        <div class="button">
                            <div class="wrapper">
                                <button id="btn" class="btn"><span>إرسـال</span></button>
                            </div>
                        </div>
                        <!-- <a href="#" class="button-submit">Send <i class="fa-solid fa-search"></i> </a> -->
                    </form>
                </div>
            </div>
            <div class="footer">
                <h5 class="copy"><img src="{{asset('images/zenon-soft.png')}}">©<a href="https://zenonsoftware.com"> Zenon Software </a>  جميع الحقوق محفوظة  </h5>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>
<!-- Scripts -->
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/validator.min.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="{{ asset('js/jquery-2.1.0.min.js') }}"></script>
<script src="{{ asset('js/owl-carousel.js') }}"></script>
<script src="{{ asset('js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>

</html>
