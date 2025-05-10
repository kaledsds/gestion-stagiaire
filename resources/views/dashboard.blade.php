@extends('layouts.app')



@section('content')
<div class="pagetitle">
  <h1>Dashboard</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>
</div><!-- End Page Title -->
<section class="section dashboard">
  <div class="container mt-5">

    @foreach ($groupedPosts as $postGroup)
    @php
    $firstPost = $postGroup->first();
    $solutionCount = $firstPost->solutions_count;
    @endphp
    <div class="card post-card">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
          <div class="nav-link nav-profile d-flex align-items-center pe-0">
            <img src="/assets/img/profile-img.jpg" width="50" alt="User Avatar" class="rounded-circle">
            <div>
              <h5 class="card-title mb-0">{{ $firstPost->p_owner_nom }}</h5>
              <p class="card-text text-muted">{{ $firstPost->p_owner_role }}</p>
            </div>
          </div>
          <p class="card-text text-muted">{{ $firstPost->p_date_soumission }}</p>
        </div>

      </div>
      <div class="card-body">
        <div class="d-flex align-items-center mb-3">
          <div>
            <h5 class="card-title mb-0">{{ $firstPost->p_titre }}</h5>
            <p class="card-text text-muted">{{ $firstPost->p_discription }}</p>
          </div>
        </div>
        <div class="card-footer">
          <nav class="header-nav ms-auto">
            <ul class="d-flex justify-content-between align-items-center">
              <li class="nav-item dropdown">
                @if ($solutionCount > 0)
                <a class="nav-link nav-icon" href="#" role="button" id="dropdownMenuButton-{{ $firstPost->p_id }}"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-chat-left-text"></i>
                  <span class="badge bg-success badge-number">{{ $solutionCount }}</span>
                </a>
                <ul class="nav-item dropdown-menu" aria-labelledby="dropdownMenuButton-{{ $firstPost->p_id }}">
                  <li>
                    <h6 class="dropdown-header">Vous en avez {{ $solutionCount }} nouveaux
                      solution{{ $solutionCount > 1 ? 's' : '' }}</h6>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  @foreach ($postGroup as $post)
                  @if ($post->s_id)
                  <li>
                    <a class="dropdown-item d-flex align-items-center"
                      href="{{ route('solutions.show', $firstPost->s_id) }}">
                      <img src="/assets/img/profile-img.jpg" width="40" alt="User Avatar" class="rounded-circle">
                      <div>
                        <h6 class="dropdown-item-title mb-0">{{ $post->s_owner_nom }}</h6>
                        <p class="dropdown-item-text mb-0">{{ $post->s_titre }}</p>
                        <small>{{ $post->s_date_response }}</small>
                      </div>
                    </a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  @endif
                  @endforeach
                  <li>
                    <a class="dropdown-item text-center" href="#">Afficher toutes les solutions</a>
                  </li>
                </ul>
                @else
                <span class="disabled">No Solutions</span>
                @endif
              </li>


              <a href="{{ route('solutions.create', $firstPost->p_id) }}" class="btn btn-primary">Résoudre</a>
            </ul>
          </nav>
        </div>
      </div>
    </div>
    @endforeach

  </div>

</section>


@endsection