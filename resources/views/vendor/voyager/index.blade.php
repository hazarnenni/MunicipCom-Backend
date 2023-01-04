@extends('voyager::master')
@section('content')
    <?php
    use App\Models\Event;
    use App\Models\User;
    use App\Models\Circonscription;
    use App\Models\Project;

    $event = Event::all();
    $user = User::all();
    $cr = Circonscription::all();
    $project = Project::all();
    ?>
    <style>
        body {
            background: #eeeded;
        }

        .card {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
            transition: all 0.2s ease-in-out;
            box-sizing: border-box;
            margin-top: 10px;
            margin-bottom: 10px;
            background-color: #FFF;
        }

        .card:hover {
            box-shadow: 0 5px 5px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
        }

        .card>.card-inner {
            padding: 10px;
        }

        .card .header h2,
        h3 {
            margin-bottom: 0px;
            margin-top: 0px;
        }

        .card .header {
            margin-bottom: 5px;
        }

        .card img {
            width: 100%;
        }
    </style>
    <div class="page-content">
        <div class="analytics-container">

            <div class="col-sm-4">
                <div class="card">
                    <div class="image">
                        <img src="{{ voyager_asset('images/hello.jpg') }}" />
                    </div>
                    <div class="card-inner">
                        <div class="header">
                            <h2>عدد المستخدمين</h2>
                            <h3>{{ $user->count() }}</h2>
                        </div>
                        <div class="content">
                            <a href="{{ route('showUsers') }}"><button class="btn btn-outline-primary">إقرأ
                                    المزيد</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="image">
                        <img src="{{ voyager_asset('images/hello2.jpg') }}" />
                    </div>
                    <div class="card-inner">
                        <div class="header">
                            <h2>عدد الدوائر البلدية</h2>
                            <h3>{{ $cr->count() }}</h2>
                        </div>
                        <div class="content">
                            <a href="{{ route('circonscription') }}"><button class="btn btn-outline-primary">إقرأ
                                    المزيد</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card">
                    <div class="image">
                        <img src="{{ voyager_asset('images/hello3.jpg') }}" />
                    </div>
                    <div class="card-inner">
                        <div class="header">
                            <h2>عدد المشاريع</h2>
                            <h3>{{ $project->count() }}</h2>
                        </div>
                        <div class="content">
                            <a href="{{ route('showProjects') }}"><button class="btn btn-outline-primary">إقرأ
                                    المزيد</button></a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
@endsection
