@extends('dashboard.layouts.main')

@section('container')
<div class="row">

    {{-- @can('admin') --}}
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Admin</h4>
                </div>
                <div class="card-body">
                    {{ $userCount }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Atno</h4>
                </div>
                <div class="card-body">
                    {{ $articleCount }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-eye"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Virtual Tour</h4>
                </div>
                <div class="card-body">
                    {{ $tourCount }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-store"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Entrepreneur</h4>
                </div>
                <div class="card-body">
                    {{ $entrepreneurCount }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-store"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Quiz</h4>
                </div>
                <div class="card-body">
                    {{ $quizCount }}
                </div>
            </div>
        </div>
    </div>
    {{-- @endcan --}}
    {{--
    @can('writer')

    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Resep Saya</h4>
                </div>
                <div class="card-body">
                    {{ $recipes }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Artikel Saya</h4>
                </div>
                <div class="card-body">
                    {{ $articles }}
                </div>
            </div>
        </div>
    </div>
</div>
@endcan --}}

@endsection