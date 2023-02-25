@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Ваша работа</div>

                    <div class="card-body">

                        <table class="table">

                            <tbody>

                            @foreach($jobs as $job)
                                <tr>
                                    <td>
                                        @if(empty(Auth::user()->company->logo))

                                            <img src="{{asset('avatar/man.jpg')}}" width="80">

                                        @else
                                            <img src="{{asset('uploads/logo')}}/{{Auth::user()->company->logo}}"
                                                 width="80">


                                        @endif


                                    </td>
                                    <td>Позиция:{{$job->position}}
                                        <br>
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>&nbsp;{{$job->type}}
                                    </td>
                                    <td><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;Адрес:{{$job->address}}
                                    </td>
                                    <td><i class="fa fa-globe"
                                           aria-hidden="true"></i>&nbsp;Дата:{{$job->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                            <button class="btn btn-success btn-sm">
                                                Промотреть
                                            </button>
                                        </a>
                                        <br><br>
                                        <a href="{{route('job.edit',[$job->id])}}">
                                            <button class="btn btn-dark">Редактировать</button>
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
