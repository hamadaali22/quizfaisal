<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('front/bootstrap-4.0.0-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('front/quiz.css')}}">


    <title>َQuiz</title>
    <style>
        .back{
            background-color: #3d83b3;
        }
        footer .links a i{
            font-size: 25px !important;
            color: #fff !important;
        }
        .next h3{
            width: fit-content;
            cursor: pointer;
        }
        .next h3:hover{
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg back w-100 pt-0 pb-0">
            <a href="index.php" class="navbar-brand text-light" id="brand">Exam site</a>
            <a href="#x" data-toggle="collapse" class="navbar-toggler">
                <i class="fa-solid fa-bars navbar-toggler-icon text-light" id="nav-icon"></i>
            </a>
            <div class="collapse navbar-collapse" id="x">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item p-1 active"><a href="index.php" class="nav-link text-light">HOME</a></li>
                    <li class="nav-item p-1"><a href="#category" class="nav-link text-light">GOETHE</a></li>
                    <li class="nav-item p-1"><a href="#best" class="nav-link text-light">ANMELDEN</a></li>
                    <li class="nav-item p-1"><a href="#owner" class="nav-link text-light">FEED BACK</a></li>
                </ul>
        </nav>
    </header>
    <section class="row bg-white m-2 p-1" >
        <div class="col-lg-10 col-md-10  border border-raduis mb-2">
            <h6>Title</h6>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsa tenetur cupiditate voluptates quis provident voluptatem consequuntur inventore numquam saepe. Eum repellendus modi labore dolores nemo? Magni vel nobis dolores explicabo laboriosam dicta excepturi non unde. Ratione similique ab quia molestias!</p>
        </div>
        <p class="col-md-2   pt-4 mt-2 "><span>00</span>:<span>00</span>:<span>00</span></p>
        <div class="col-11 audio-parent text-center pt-1 bg-white">
            <audio controls class="align-items-center w-50">
                <source src="./093.mp3" type="audio/ogg">
                <source src="./093.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>
            <div class="col-2"></div>
        </div>
    </section>
    <section class="questions text-center row m-2 p-1">
        <div class="col-lg-7 main-text col-md-8 mt-md-3 ml-md-auto mr-md-auto p-2 mt-3 mr-lg-2 bg-white">
            <h2>Title</h2>
            <h5>Sub Title Sub Title Sub Title</h5>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque corporis, ipsa cumque doloribus beatae consequatur sit rerum vitae adipisci ducimus asperiores velit. Voluptates accusamus incidunt perferendis reprehenderit suscipit molestiae officia? Ipsum impedit ea quo doloribus porro, minus vero laudantium possimus ipsa eaque. Molestias distinctio totam quae temporibus repellat impedit fugit corrupti dolore sequi, et quos recusandae veniam numquam vitae quisquam neque rem minima velit placeat animi porro repudiandae quo? Delectus cupiditate quasi ab ad facilis quod dolor rerum, repudiandae nobis accusantium soluta in modi autem minima incidunt aperiam sit tenetur voluptate maiores perferendis architecto nesciunt explicabo ipsum. Ut repudiandae laboriosam mollitia sequi explicabo accusantium, nulla ad consequuntur. Consequatur, sapiente iste. Non aspernatur eaque rem eos sit. Soluta beatae sit voluptatibus veritatis fuga nihil esse repudiandae delectus modi nemo? Voluptates aliquam facilis officiis  perspiciatis inventore quas reprehenderit a numquam? consectetur iusto deserunt voluptateexercitationem sed optio commodi numquam. Sint, iure quasi praesentium quod veritatis ipsum asperiores, officiis?</p>
        </div>
        <div class="col-lg main-quiz col-md-8 ml-md-auto mr-md-auto pr-2 pl-2 mt-3 text-left bg-white">
            <div class="mcq p-3 ">
                <div class="answers">
                        <ul class="multi-choice list-unstyled">
                            <h6>question question question question question question question question ?</h6>
                            <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
                                <input class=" multi-input d-none" type="radio" name="q-1" value="mars" id="mars">
                                <label class="multi-label" for="mars" id="mars">A. Mars</label>
                            </li>
                            <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
                                <input class=" multi-input d-none" type="radio" name="q-1" value="jupiter" id="jupiter">
                                <label class="multi-label" for="jupiter" id="jupiter">B. Jupiter</label>
                            </li>
                            <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
                                <input class=" multi-input d-none" type="radio" name="q-1" value="venus" id="venus">
                                <label class="multi-label" for="venus" id="venus">C. Venus</label>
                            </li>
                            <li class="multi-item q-1 border border-raduis pt-2 pl-3 mb-1">
                                <input class=" multi-input d-none" type="radio" name="q-1" value="saturn" id="saturn">
                                <label class="multi-label" for="saturn" id="saturn">D. Saturn</label>
                            </li>
                        </ul>
                </div>
            </div>
            <div class="true-false p-3 ">
                <ul class="multi-choice list-unstyled p-2 d-flex flex-wrap ">
                    <h6 class="w-100">question question  ?</h6>
                    <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 mr-5">
                        <input class=" multi-input d-none" type="radio" name="q-2" value="true" id="true-1">
                        <label class="multi-label" for="true-1" id="true"> true</label>
                    </li>
                    <li class="multi-item q-2 border border-raduis pt-2 pl-3 pr-3 ml-2">
                        <input class="multi-input d-none" type="radio" name="q-2" value="false" id="false-1">
                        <label class="multi-label" for="false-1" id="false">false</label>
                    </li>
                </ul>
            </div>
            <div class="mcq-true-false p-3 bg-information ">
                <div class="mcq  ">
                    <div class="true-false  ">
                        <ul class="multi-choice list-unstyled p-2 d-flex flex-wrap">
                            <h6 class="w-100">question question question question question question question question ?</h6>
                            <li class="multi-item q-3 border border-raduis mr-5 pl-3 pr-3">
                                <input class=" multi-input d-none" type="radio" name="q-3" value="true" id="true-2">
                                <label class="multi-label" for="true-2" id="true"> true</label>
                            </li>
                            <li class="multi-item q-3 border border-raduis pl-3 pr-3 ml-2">
                                <input class="multi-input d-none" type="radio" name="q-3" value="false" id="false-2">
                                <label class="multi-label" for="false-2" id="false">false</label>
                            </li>
                        </ul>
                    </div>
                    <div class="answers">
                            <ul class="multi-choice list-unstyled p-2">
                                <p>What is the largest planet in our solar system?</p>
                                <li class="multi-item q-4 border border-raduis pt-2 pl-3 mb-1">
                                    <input class=" multi-input d-none" type="radio" name="q-4" value="mars" id="ans-1">
                                    <label class="multi-label" for="ans-1" id="mars">A. Mars</label>
                                </li>
                                <li class="multi-item q-4 border border-raduis pt-2 pl-3 mb-1">
                                    <input class=" multi-input d-none" type="radio" name="q-4" value="jupiter" id="ans-2">
                                    <label class="multi-label" for="ans-2" id="jupiter">B. Jupiter</label>
                                </li>
                                <li class="multi-item q-4 border border-raduis pt-2 pl-3 mb-1">
                                    <input class=" multi-input d-none" type="radio" name="q-4" value="venus" id="ans-3">
                                    <label class="multi-label" for="ans-3" id="venus">C. Venus</label>
                                </li>
                                <li class="multi-item q-4 border border-raduis pt-2 pl-3 mb-1">
                                    <input class=" multi-input d-none" type="radio" name="q-4" value="saturn" id="ans-4">
                                    <label class="multi-label" for="ans-4" id="saturn">D. Saturn</label>
                                </li>
                            </ul>
                    </div>
                </div>
            </div>
            <div class="true-false-picture p-3 bg-information mt-3">
                <div class="true-false p-3 ">
                    <ul class="multi-choice list-unstyled p-2 d-flex flex-wrap">
                        <h6 class="w-100">question question question question question question question question ?</h6>
                        <li class="multi-item q-5 border border-raduis pt-2 pl-3 pr-3 mb-1 mr-5">
                            <input class=" multi-input d-none" type="radio" name="q-5" value="true" id="true-3">
                            <label class="multi-label" for="true-3" id="true"> true</label>
                        </li>
                        <li class="multi-item q-5 border border-raduis pt-2 pl-3 pr-3 mb-1 ml-2">
                            <input class="multi-input d-none" type="radio" name="q-5" value="false" id="false-3">
                            <label class="multi-label" for="false-3" id="false">false</label>
                        </li>
                    </ul>
                </div>
                <div class="picture">
                    <img src="./1.webp" class="img-fluid" alt="">
                </div>
            </div>
            <div class="dropdown d-flex justify-content-between mt-3">
                <label for="cars">Choose a car:</label>
                <select name="cars" id="cars">
                <option value="volvo">Volvo</option>
                <option value="saab">Saab</option>
                <option value="mercedes">Mercedes</option>
                <option value="audi">Audi</option>
                </select>
            </div>
            <div class="multi-speakers  mt-2  p-4 bg-information">
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col">A. user one</div>
                    <div class="col">B. user tho</div>
                    <div class="col">C. user three</div>
                </div>
                <div class="row answers ">
                    <div class="col-5">
                        <h6>question question question question question question question question ?</h6>
                    </div>
                    <ul class="col row multi-choice list-unstyled p-2">
                        <li class="col multi-item q-6 pt-2 pl-3 mb-1 " >
                            <input class=" multi-input" type="radio" name="q-6" value="mars" id="speak-a">
                            <label class="multi-label" for="speak-a" id="mars"></label>
                        </li>
                        <li class="col multi-item q-6 pt-2 pl-3 mb-1">
                            <input class=" multi-input" type="radio" name="q-6" value="jupiter" id="speak-b">
                            <label class="multi-label" for="speak-b" id="jupiter"></label>
                        </li>
                        <li class="col multi-item q-6 pt-2 pl-3 mb-1 ">
                            <input class=" multi-input " type="radio" name="q-6" value="venus" id="speak-c">
                            <label class="multi-label" for="speak-c" id="venus"></label>
                        </li>
                    </ul>
                </div>
                <div class="row answers mt-5">
                    <div class="col-5">
                        <h6>question question question question question question question question ?</h6>
                    </div>
                    <ul class="col row multi-choice list-unstyled p-2">
                        <li class="col multi-item q-7 pt-2 pl-3 mb-1 ">
                            <input class=" multi-input " type="radio" name="q-7" value="mars" id="speak-a1">
                            <label class="multi-label" for="speak-a1" id="mars"></label>
                        </li>
                        <li class="col multi-item q-7 pt-2 pl-3 mb-1">
                            <input class=" multi-input " type="radio" name="q-7" value="jupiter" id="speak-b1">
                            <label class="multi-label" for="speak-b1" id="jupiter"></label>
                        </li>
                        <li class="col multi-item q-7 pt-2 pl-3 mb-1 ">
                            <input class=" multi-input " type="radio" name="q-7" value="venus" id="speak-c1">
                            <label class="multi-label" for="speak-c1" id="venus"></label>
                        </li>
                    </ul>
                </div>
                <div class="row answers mt-5">
                    <div class="col-5">
                        <h6>question question question question question question question question ?</h6>
                    </div>
                    <ul class="col row multi-choice list-unstyled p-2">
                        <li class="col multi-item q-8 pt-2 pl-3 mb-1 ">
                            <input class=" multi-input " type="radio" name="q-8" value="mars" id="speak-a2">
                            <label class="multi-label" for="speak-a2" id="mars"></label>
                        </li>
                        <li class="col multi-item q-8 pt-2 pl-3 mb-1">
                            <input class=" multi-input " type="radio" name="q-8" value="jupiter" id="speak-b2">
                            <label class="multi-label" for="speak-b2" id="jupiter"></label>
                        </li>
                        <li class="col multi-item q-8 pt-2 pl-3 mb-1 ">
                            <input class=" multi-input" type="radio" name="q-8" value="venus" id="speak-c2">
                            <label class="multi-label" for="speak-c2" id="venus"></label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="mcq mt-5">
                <h6>question question question question question question question question ?</h6>
                <ul class="multi-choice list-unstyled p-2">
                    <p>What is the largest planet in our solar system?</p>
                    <li class="multi-item q-9 border border-raduis pt-2 pl-3 mb-1">
                        <input class=" multi-input d-none" type="radio" name="q-9" value="mars" id="img-1">
                        <label class="multi-label" for="img-1" id="mars">A.<img src="./1.webp" class="img-fluid multi-label-img" alt=""></label>
                    </li>
                    <li class="multi-item q-9 border border-raduis pt-2 pl-3 mb-1">
                        <input class=" multi-input d-none" type="radio" name="q-9" value="jupiter" id="img-2">
                        <label class="multi-label" for="img-2" id="jupiter">B.<img src="./1.webp" class="img-fluid  multi-label-img" alt=""></label>
                    </li>
                    <li class="multi-item q-9 border border-raduis pt-2 pl-3 mb-1">
                        <input class=" multi-input d-none" type="radio" name="q-9" value="venus" id="img-3">
                        <label class="multi-label" for="img-3" id="venus">C.<img src="./1.webp" class="img-fluid  multi-label-img" alt=""></label>
                    </li>
                    <li class="multi-item q-9 border border-raduis pt-2 pl-3 mb-1">
                        <input class=" multi-input d-none" type="radio" name="q-9" value="saturn" id="img-4">
                        <label class="multi-label" for="img-4" id="saturn">D.<img src="./1.webp" class="img-fluid multi-label-img" alt=""></label>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="next mt-5 mb-5">
            <h3 class="border-raduis back text-light m-auto text-center p-2">Next</h3>
        </div>
    </section>
    <footer class="back">
        <div class="links text-center">
            <a href="#"><i class="fa-brands fa-facebook p-2 mr-2"></i></a>
            <a href="#"><i class="fa-brands fa-instagram p-2 mr-2"></i></a>
            <a href="#"><i class="fa-brands fa-twitter p-2 mr-2"></i></a>
            <a href="#"><i class="fa-brands fa-github p-2 mr-2"></i></a>
        </div>
    </footer>
    <script src="{{asset('front/bootstrap-4.0.0-dist/js/popper.min.js')}}"></script>
    <script src="{{asset('front/bootstrap-4.0.0-dist/js/jquery-3.6.3.min.js')}}"></script>
    <script src="{{asset('front/bootstrap-4.0.0-dist/js/bootstrap.js')}}"></script>
    <script src="{{asset('front/main.js')}}"></script>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
