@extends('layouts.app')



@section('content')
<div class="pagetitle">
    <h1>Problèmes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/Problèmes">Problèmes</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Poster un problème</h5>

                    <!-- Multi Columns Form -->
                    <form method="POST" action="{{ route('problemes.store') }}" class="row g-3" enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-12">
                            <label for="titre" class="form-label">Titre</label>
                            <input type="text" class="form-control" name="titre" require id="titre">
                        </div>
                        <div class="col-md-6">
                            <label for="fichier-description" class="form-label">Fichier description</label>
                            <input type="file" class="form-control" name="fichier_description" id="fichier-description">
                        </div>
                        <div class="col-md-6">
                            <label for="date-soumission" class="form-label">Date soumission</label>
                            <input type="date" class="form-control" name="date_soumission" id="date-soumission">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress5" class="form-label">Discription</label>
                            <input type="text" class="form-control" name="discription" style="height: 100px" require></input>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </form><!-- End Multi Columns Form -->

                </div>
            </div>

        </div>
    </div>

</section>





@endsection