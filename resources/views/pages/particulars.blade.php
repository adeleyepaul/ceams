@extends('layouts.app')

@section('title')
Particulars
@endsection

@section('content')

	  <div class="container">
        <div class="row">
          <div class="col-md-4">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" style="width: 100px; height:100px"
                       src="{{ asset(config('app.url').'/app/public/images/avator/'.$particulars->avator) }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$particulars->name}}</h3>

                <p class="text-muted text-center">{{$particulars->job_title}}</p>

                <ul class="list-group list-group-flush mb-3 p-0">
                  <li class="list-group-item">
                    <b>Joined</b> <a class="float-right">{{ date('d/M/Y h:sa', strtotime($particulars->created_at))}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Last Update</b> <a class="float-right">{{ date('d/M/Y h:sa', strtotime($particulars->created_at))}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Appointment Date</b> <a class="float-right">{{ date('d/M/Y h:sa', strtotime($particulars->created_at))}}</a>
                  </li>
                </ul>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary mt-3">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-user mr-1"></i> Staff ID : </strong>

                <span class="text-muted" style="text-transform: uppercase; font-size: 14px;">
                  {{ $particulars->staff_id }}
                </span>
                <hr>
                <strong><i class="fas fa-landmark mr-1"></i> Department : </strong>

                <span class="text-muted" style="text-transform: uppercase; font-size: 14px;">
                  {{ $particulars->department }}
                </span>
                <hr>
                <strong><i class="fas fa-city mr-1"></i> Faculty : </strong>

                <span class="text-muted" style="text-transform: uppercase; font-size: 14px;">
                  {{ $particulars->faculty }}
                </span>
                <hr>
                <strong><i class="fas fa-briefcase mr-1"></i> Job Title : </strong>

                <span class="text-muted" style="text-transform: uppercase; font-size: 14px;">
                  {{ $particulars->job_title }}
                </span>
                <hr>
                <strong><i class="fas fa-hand-holding-usd mr-1"></i> Salary Scale : </strong>

                <span class="text-muted" style="text-transform: uppercase; font-size: 14px;">
                  {{ $particulars->salary_scale }}
                </span>
                <hr>
                <strong><i class="fa fa-server mr-1"></i> Terms of Service : </strong>

                <span class="text-muted" style="text-transform: uppercase; font-size: 14px;">
                  {{ $particulars->terms_of_service }}
                </span>
                <hr>
                <strong><i class="fas fa-calendar-alt mr-1"></i> Appointment Date : </strong>

                <span class="text-muted" style="text-transform: uppercase; font-size: 14px;">
                  {{ date('d M, Y', strtotime($particulars->appointment_date)) }}
                </span>
                <hr>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-8">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="" data-toggle="tab">Account Details</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <div class="tab-pane active" id="overview">
                    {!! Form::open(['route' =>  ['particulars.update', $particulars->staff_id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Avator</label>
                        <div class="col-sm-10">
                          <input type="file" name="avator" class="form-control @error('avator') is-invalid @enderror " id="avator">
                          @error('avator')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" value="{{$particulars->email}}" placeholder="Email" name="email">
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{$particulars->phone}}" placeholder="Phone" name="phone">
                          @error('phone')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Date of Birth</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" value="{{$particulars->dob}}" placeholder="Date of Birth" name="dob">
                        </div>
                      </div>
                      <p>
                          <a data-toggle="collapse" href="#changePassword" aria-expanded="false"
                                  aria-controls="changePassword">
                              Change Password
                          </a>
                      </p>
                      <div class="collapse" id="changePassword">
                        <div class="form-group row">
                            <label for="password" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                              @error('password')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="confirm-password" class="col-sm-2 col-form-label">Confirm Password</label>
                            <div class="col-sm-10">
                              <input type="password" class="form-control" id="confirm-password" placeholder="Confirm Password" name="confirm_password">
                            </div>
                          </div>
                      </div>
                      <div class="form-group row">
                        <label for="department" class="col-sm-2 col-form-label">Department</label>
                        <div class="col-sm-10">
                          {{-- <input type="text" value="{{old('department')}}"  class="@error('department') is-invalid @enderror form-control" id="department" name="department" placeholder="Department"> --}}
                          <select name="department" class="@error('department') is-invalid @enderror form-control" id="faculty">
                              <option value="Computer and Information Sciences">Computer and Information Sciences</option>
                              <option value="Nursing">Nursing</option>
                          </select>
                          @error('department')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="faculty" class="col-sm-2 col-form-label">Faculty</label>
                        <div class="col-sm-10">
                          {{-- <input type="text" value="{{old('faculty')}}" class="@error('faculty') is-invalid @enderror form-control"  name="faculty" id="faculty" placeholder="Faculty"> --}}
                          <select name="faculty" class="@error('faculty') is-invalid @enderror form-control" id="faculty">
                              <option value="TechnoScience">TechnoScience</option>
                              <option value="Health Science">Health Sciences</option>
                              <option value="Education">Education</option>
                              <option value="Management Science">Management Science</option>
                          </select>
                          @error('faculty')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="job-title" class="col-sm-2 col-form-label">Job Title</label>
                        <div class="col-sm-10">
                          {{-- <input type="text" value="{{old('job_title')}}"    name="job_title" id="job-title" placeholder="Job Title"> --}}
                          <select class="@error('job_title') is-invalid @enderror form-control" name="job_title" id="job-title">
                              @foreach ($particulars as $particular)
                              <option value="{{ $particular->job_title }}">{{ $particular->job_title }}</option>
                              @endforeach
                          </select>
                          @error('job_title')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="salary_scale" class="col-sm-2 col-form-label">Salary Scale</label>
                        <div class="col-sm-10">
                          <select name="salary_scale" class="@error('salary_scale') is-invalid @enderror form-control" id="salary_scale">
                              <option value="M1">M 1</option>
                              <option value="M2">M 2</option>
                              <option value="M3">M 3</option>
                          </select>
                          @error('salary_scale')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="appointment" class="col-sm-2 col-form-label">Appointment Date</label>
                      <div class="col-sm-10">
                        <input type="date" value="{{old('appointment_date')}}" class="@error('appointment_date') is-invalid @enderror form-control"   id="appointment-date" name="appointment_date" placeholder="Appointment Date">
                        @error('appointment_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="terms-of-service" class="col-sm-2 col-form-label">Terms of Service</label>
                      <div class="col-sm-10">
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary active">
                              <input type="radio" name="terms_of_service" id="full-time" autocomplete="off" checked value="Full Time"> Full Time
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="terms_of_service" id="contract" autocomplete="off" value="Contract"> Contract
                            </label>
                            <label class="btn btn-secondary">
                              <input type="radio" name="terms_of_service" id="part-time" autocomplete="off" value="Part Time"> Part-Time
                            </label>
                        </div>
                        @error('terms_of_service')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                        	<div class="btn-group">
                        		<button class="btn btn-secondary" type="reset">Cancel</button>
                          		<button type="submit" class="btn btn-primary">Update</button>
                        	</div>
                        </div>
                      </div>
                     {!! Form::close() !!}
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
@endsection
