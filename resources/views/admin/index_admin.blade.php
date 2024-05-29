@extends('layout.admin_main')
@section('content')
<div id="crypto-stats-3" class="row">
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-1"><a href="#">
                <i class="ft-user" style="font-size: x-large;"></i>
              </a>
            </div>
            <div class="col-7 pl-1">
              <a href="#">
                <h4>All Users</h4>
                <h6 class="text-muted">Count Users</h6>
              </a>
            </div>
            <div class="col-3 text-right">
              <h5>{{$users_count}} </h5>
            </div>

          </div>
        </div>
        <!-- <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-1"><a href="#">
                <i class="ft-user" style="font-size: x-large;"></i>
              </a>
            </div>
            <div class="col-7 pl-1">
              <a href="#">
                <h4>All Levels</h4>
                <h6 class="text-muted">Count Levels</h6>
              </a>
            </div>
            <div class="col-3 text-right">
              <h5> {{$levels_count}}</h5>
            </div>

          </div>
        </div>
        <!-- <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-1"><a href="#">
                <i class="ft-user" style="font-size: x-large;"></i>
              </a>
            </div>
            <div class="col-7 pl-1">
              <a href="#">
                <h4>Exams</h4>
                <h6 class="text-muted">Count Exams</h6>
              </a>
            </div>
            <div class="col-3 text-right">
              <h4> {{$exams_count}}</h4>
            </div>

          </div>
        </div>
        <!-- <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-1"><a href="#">
                <i class="ft-user" style="font-size: x-large;"></i>
              </a>
            </div>
            <div class="col-7 pl-1">
              <a href="#">
                <h4>Questions</h4>
                <h6 class="text-muted">Count Questions</h6>
              </a>
            </div>
            <div class="col-3 text-right">
              <h4> {{$question_count}}</h4>
            </div>

          </div>
        </div>
        <!-- <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-1"><a href="#">
                <i class="ft-user" style="font-size: x-large;"></i>
              </a>
            </div>
            <div class="col-7 pl-1">
              <a href="#">
                <h4>Placement Questions</h4>
                <h6 class="text-muted">Count Placement Questions</h6>
              </a>
            </div>
            <div class="col-3 text-right">
              <h4> {{$quize_count}}</h4>
            </div>

          </div>
        </div>
        <!-- <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
          </div>
        </div> -->
      </div>
    </div>
  </div>
  <div class="col-xl-4 col-12">
    <div class="card crypto-card-3 pull-up">
      <div class="card-content">
        <div class="card-body pb-0">
          <div class="row">
            <div class="col-1"><a href="#">
                <i class="ft-user" style="font-size: x-large;"></i>
              </a>
            </div>
            <div class="col-7 pl-1">
              <a href="#">
                <h4>Placement Groups</h4>
                <h6 class="text-muted">Count Placement Groups</h6>
              </a>
            </div>
            <div class="col-3 text-right">
              <h4> {{$groups_count}}</h4>
            </div>
          </div>
        </div>
        <!-- <div class="row">
          <div class="col-12">
            <canvas id="btc-chartjs" class="height-75"></canvas>
          </div>
        </div> -->
      </div>
    </div>
  </div>


</div>
@endsection