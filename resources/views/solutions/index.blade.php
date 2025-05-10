@extends('layouts.app')



@section('content')
<div class="pagetitle">
    <h1>Problèmes</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/Problèmes">Problèmes</a></li>
            <li class="breadcrumb-item active">Liste</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Problème Liste</h5>
                    <p>must add some guiding text here</p>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>
                                    <b>T</b>itre
                                </th>
                                <th>Discription.</th>
                                <th>Fichier description</th>
                                <th data-type="date" data-format="YYYY/DD/MM">Date soumission</th>
                                <th>Solution</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($problèmes as $problème)
                            <tr>
                                <td>{{ $problème->titre }}</td>
                                <td>{{ $problème->discription }}</td>
                                <td>{{ $problème->fichier_description }}</td>
                                <td>{{ $problème->date_soumission }}</td>
                                <td>37%</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

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