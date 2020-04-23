@extends('app')

@section('title', 'リスト名を変更する')

@include('nav')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card-mt-3">
          <div class="card-body pt-0">
            @include('common.errors')
            <div class="card-text">
              <form method="post" action="{{ url('listings/edit') }}">
                @csrf
                <div class="md-form">
                  <label>リスト名</label>
                  <input type="text" name="list_name" class="form-control" required value="{{ old('list_name', $listing->title) }}">
                  <input type="hidden" name="id" value="{{ old('id', $listing->id) }}">
                </div>
                <button type="submit" class="btn blue-gradient btn-block">更新</button>
              </from>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection