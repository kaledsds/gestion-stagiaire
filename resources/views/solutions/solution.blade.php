@extends('layouts.app')



@section('content')
<div class="pagetitle">
    <h1>Solution</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/Problèmes">Solution</a></li>
            <li class="breadcrumb-item active">détails</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="container mt-5">

        <div class="card post-card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="nav-link nav-profile d-flex align-items-center pe-0">
                        <img src="/assets/img/profile-img.jpg" width="50" alt="User Avatar" class="rounded-circle">
                        <div>
                            <h5 class="card-title mb-0">{{ $solution->s_owner_nom }}</h5>
                            <p class="card-text text-muted">{{ $solution->s_owner_role }}</p>
                        </div>
                    </div>
                    <p class="card-text text-muted">{{ $solution->s_date_response }}</p>
                </div>

            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div>
                        <h5 class="card-title mb-0">{{ $solution->s_titre }}</h5>
                        <p class="card-text text-muted">{{ $solution->s_discription }}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>

<div class="col-sm-12">

    @if(session()->get('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
</div>

@endsection