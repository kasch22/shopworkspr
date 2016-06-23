@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="panel panel-default">
              <div class="panel-heading">shop works Techncial test</div>
              <div class="panel-body">Please See Table Below showing the shifts
                worked by each staff member per day and the total hours of each shift and day.
                Please the 'readme.md' file for more information.</div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <table class="table">
                <thead>
                  <!-- Table Header-->
                  <tr>
                    <th>Staff Id</th>

                    <th>Monday</th>
                    <th></th>
                    <th></th>
                    <th>Tuesday</th>
                    <th></th>
                    <th></th>
                    <th>Wednesday</th>
                    <th></th>
                    <th></th>
                    <th>Thursday</th>
                    <th></th>
                    <th></th>
                    <th>Friday</th>
                    <th></th>
                    <th></th>
                    <th>Saturday</th>
                    <th></th>
                    <th></th>
                    <th>Sunday</th>
                    <th></th>
                    <th></th>

                  </tr>
                  <tr>
                    <th></th>

                    <th class="start-time">Start Time</th>
                    <th class="finish-time">Finish Time</th>
                    <th class="hours">Hours</th>

                    <th class="start-time">Start Time</th>
                    <th class="finish-time">Finish Time</th>
                    <th class="hours">Hours</th>

                    <th class="start-time">Start Time</th>
                    <th class="finish-time">Finish Time</th>
                    <th class="hours">Hours</th>

                    <th class="start-time">Start Time</th>
                    <th class="finish-time">Finish Time</th>
                    <th class="hours">Hours</th>

                    <th class="start-time">Start Time</th>
                    <th class="finish-time">Finish Time</th>
                    <th class="hours">Hours</th>

                    <th class="start-time">Start Time</th>
                    <th class="finish-time">Finish Time</th>
                    <th class="hours">Hours</th>

                    <th class="start-time">Start Time</th>
                    <th class="finish-time">Finish Time</th>
                    <th class="hours">Hours</th>


                  </tr>
                </thead>
                {{dd($staffhoursworked)}}
                <tbody>
                  <!-- Table Body-->
                  @foreach($staffhoursworked as $staffhours)
                    <tr>
                      <td>
                        {{--$staffhours->staffid--}}
                      </td>

                      <td class="start-time">
                        {{$staffhours->mostarttime}}
                      </td>
                      <td class="finish-time">
                        {{$staffhours->mofinishtime}}
                      </td>
                      <td class="hours">
                        {{$staffhours->monday}}
                      </td>


                      <td class="start-time">
                        {{$staffhours->tustarttime}}
                      </td>
                      <td class="finish-time">
                        {{$staffhours->tufinishtime}}
                      </td>
                      <td class="hours">
                        {{$staffhours->tuesday}}
                      </td>


                      <td class="start-time">
                        {{$staffhours->westarttime}}
                      </td>
                      <td class="finish-time">
                        {{$staffhours->wefinishtime}}
                      </td>
                      <td class="hours">
                        {{$staffhours->wednesday}}
                      </td>


                      <td class="start-time">
                        {{$staffhours->thstarttime}}
                      </td>
                      <td class="finish-time">
                        {{$staffhours->thfinishtime}}
                      </td>
                      <td class="hours">
                        {{$staffhours->thursday}}
                      </td>


                      <td class="start-time">
                        {{$staffhours->frstarttime}}
                      </td>
                      <td class="finish-time">
                        {{$staffhours->frfinishtime}}
                      </td>
                      <td class="hours">
                        {{$staffhours->friday}}
                      </td>


                      <td class="start-time">
                        {{$staffhours->sastarttime}}
                      </td>
                      <td class="finish-time">
                        {{$staffhours->safinishtime}}
                      </td>
                      <td class="hours">
                        {{$staffhours->saturday}}
                      </td>


                      <td class="start-time">
                        {{$staffhours->sustarttime}}
                      </td>
                      <td class="finish-time">
                        {{$staffhours->sufinishtime}}
                      </td>
                      <td class="hours">
                        {{$staffhours->sunday}}
                      </td>



                    </tr>
                    @endforeach


                    <tr>
                      <td class="total-hours">Totals Hours Worked:</td>

                      @foreach($daytotals as $day => $total)
                        <td></td>
                        <td></td>
                        <td class="total-hours hours">{{$total}}</td>
                      @endforeach
                    </tr>

                </tbody>
            </table>
          </div>
        </div>

    </div>
</div>
@endsection
