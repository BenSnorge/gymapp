@extends('layouts.admin')
@section('content')
    <div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 mb-4">
            <div class="card">
                <h5 class="card-header">Create A New Benefit</h5>
                <div class="card-body">
            <form method="POST" action="/admin/all-plan-two">
                @csrf
                <div class="form-group py-2">
                    <label for="inputbenefit">Benefit</label>
                    <input id="inputbenefit" type="text" class="form-control " name="benefit" value=""  autofocus placeholder="Benefit">
                </div>
                <div class="form-group py-2">
                    <label for="inputicon">Icon</label>
                    <select name="icon" id="icon">
                      <option value="fa-check">Check</option>
                      <option value="fa-x">X</option>
                    </select>
                </div>
                <div class="row">
                    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                        <button type="submit" class="btn btn-space btn-primary mt-3">Submit</button>
                    </div>
                    <div class="col-sm-6 pl-0">
                        <p class="text-right">
                        </p>
                    </div>
                </div>
            </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection