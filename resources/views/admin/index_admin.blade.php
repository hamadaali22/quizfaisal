
@extends('layout.admin_main')
@section('content') 		
<div id="crypto-stats-3" class="row">
          <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2"><a href="{{url('admin/courses')}}">
                      <h1 style="color: white; border-radius: 30px;padding: 6px 14px 6px 31px;background-color: #FF9149 !important;
                        }">B</h1></a>
                    </div>
                    <div class="col-7 pl-2">
                        <a href="{{url('admin/courses')}}">
                            <h4>All levels</h4>
                            <h6 class="text-muted">Count Levels</h6>
                        </a>
                    </div>
                    <div class="col-3 text-right">
                        <a href="{{url('admin/courses')}}">
                            <h5>vdvf </h5>
                        </a>
                      <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
                    </div>
                    
                  </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <canvas id="btc-chartjs" class="height-75"></canvas>
                </div>
              </div>
            </div>
            </div>
          </div>

          <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2"><a href="{{url('admin/students/active')}}">
                      <h1 style="color: white; border-radius: 30px;padding: 6px 14px 6px 31px;background-color: #FF9149 !important;
                        }">S</h1></a>
                    </div>
                    <div class="col-8 pl-2">
                        <a href="{{url('admin/students/active')}}">
                            <h4>All Exams</h4>
                            <h6 class="text-muted">Count Exams</h6>
                        </a>
                    </div>
                    <div class="col-2 text-right">
                        <a href="{{url('admin/students/active')}}">
                            <h5> </h5>
                        </a>
                      <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
                    </div>
                    
                  </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <canvas id="btc-chartjs" class="height-75"></canvas>
                </div>
              </div>
            </div>
            </div>
          </div>

           <div class="col-xl-4 col-12">
            <div class="card crypto-card-3 pull-up">
              <div class="card-content">
                <div class="card-body pb-0">
                  <div class="row">
                    <div class="col-2"><a href="{{url('admin/students/notactive')}}">
                      <h1 style="color: white; border-radius: 30px;padding: 6px 14px 6px 31px;background-color: #FF9149 !important;
                        }">S</h1></a>
                    </div>
                    <div class="col-8 pl-2">
                        <a href="{{url('admin/students/notactive')}}">
                            <h4>Questions</h4>
                            <h6 class="text-muted">Count Questions</h6>
                        </a>
                    </div>
                    <div class="col-2 text-right">
                        <a href="{{url('admin/students/notactive')}}">
                            <h4> </h4>
                        </a>
                      <!--<h6 class="success darken-4">31% <i class="la la-arrow-up"></i></h6>-->
                    </div>
                    
                  </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <canvas id="btc-chartjs" class="height-75"></canvas>
                </div>
              </div>
            </div>
            </div>
          </div>

          
        </div>
@endsection
	  