@extends('layout_template.eshophome')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
              <div class="card mb-4">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">User Name</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{Auth::user()->name}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Email</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{Auth::user()->email}}</p>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <p class="mb-0">Poins</p>
                    </div>
                    <div class="col-sm-9">
                      <p class="text-muted mb-0">{{Auth::user()->poin_member}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
      
@endsection