@extends('admin.layouts.app')

@section('page_title', 'Daily website visit count')

@section('content')
<div class="page-heading">
    <h1 class="page-title">Report</h1>
</div>
<div class="page-content fade-in-up">
    <div class="ibox">
        <div class="ibox-head">
            <div class="ibox-title">Website Visit Count</div>
        </div>
        <div class="ibox-body">
            <form action="{{route('admin.daily_report')}}" method="get">
                @csrf
                <div class="form-group ">
                    <label>Select Exhibitor</label>
                    <select name="user_id" class="form-control" required>
                        <option value>-- select one --</option>
                        @foreach($dashboard_allExhibitorUsers as $user)
                        <option value="{{$user->exhibitor->id}}" {{ @$user->exhibitor->id == $id ? 'selected' : '' }}>
                            {{$user->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button class="btn btn-sm btn-primary">Submit</button>
                </div>
            </form>
        </div>

        <div class="ibox-body">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
    var months_day = <?php echo json_encode($months_day); ?>;
   var dailyVisits = <?php echo json_encode($dailyVisits);?>;
   var ctx = document.getElementById('myChart').getContext('2d');
   var chart = new Chart(ctx, {
       // The type of chart we want to create
       type: 'bar',
       // The data for our dataset
       data: {
           labels: months_day['date'],
           datasets: [{
               label: 'Visit Count',
               backgroundColor: 'rgb(255, 99, 132)',
               borderColor: 'rgb(255, 99, 132)',
               data: dailyVisits,
           }]
       },

       // Configuration options go here
       options: {
         scales:
            {
                yAxes:
                [{
                    ticks: {
                        beginAtZero: !0
                    }
                }] ,
                xAxes: [{
                        barPercentage: 0.1,
                        stacked: false,
                        beginAtZero: true,
                        scaleLabel: {
                            labelString: 'Month'
                        },
                        ticks: {
                            stepSize: 1,
                            min: 0,
                            autoSkip: false
                        }
                    }]
            }
       }
   });

</script>
@endpush