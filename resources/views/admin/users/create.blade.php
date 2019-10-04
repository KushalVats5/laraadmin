@extends('admin/layouts.default')



@section('content')
<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add</h4>
                  <p class="card-category">Add User</p>
                </div>
                <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form id="addUser" action="{{ route('users.store') }}" method="POST">
                @csrf
                    <div class="row">
                      <div class="col-md-5">
                        <div class="form-group">
                          <!-- <label class="bmd-label-floating">Company (disabled)</label>
                          <input type="text" class="form-control" disabled> -->
                          <label class="bmd-label-floating">Company</label>
                          <input type="text" name="company" value="{{ old('company') }}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" name="name" value="{{ old('name')}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email address</label>
                          <input type="email"  name="email" value="{{ old('email')}}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Fist Name</label>
                          <input type="text" name="fname" value="{{ old('fname') }}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" name="lname" value="{{ old('lname') }}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Adress</label>
                          <input type="text" name="address" value="{{ old('address') }}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">City</label>
                          <input type="text" name="city" value="{{old('city')}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">State</label>
                          <input type="text" name="state" value="{{old('state')}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Country</label>
                          <input type="text" name="country" value="{{ old('country')}}" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">Postal Code</label>
                          <input type="text" name="postal_code" value="{{ old('postal_code')}}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <div class="form-group">
                            <label class="bmd-label-floating">Phone No.</label>
                            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}" rows="5">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Gender</label>
                            <div class="col-sm-7 col-md-7">
                                <div class="input-group">
                                    <div id="radioBtn" class="btn-group">
                                        <a class="btn btn-primary btn-sm active" data-toggle="gender" data-title="male">Male</a>
                                        <a class="btn btn-primary btn-sm notActive" data-toggle="gender" data-title="female">Female</a>
                                    </div>
                                    <input type="hidden" name="gender" id="gender" value="male">
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label class="bmd-label-floating">Role</label>
                            <div class="col-sm-7 col-md-7">
                                <div class="input-group">
                                    <select name="role" id="user-role" class="form-control">
                                        <option value="">--select--</option>
                                        <option value="super_admin">Super Admin</option>
                                        <option value="admin">Admin</option>
                                        <option value="subscriber">Subscriber</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Password</label>
                          <input type="password" name="password" value="" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Confirm Password</label>
                          <input type="password" name="password_confirmation" value="" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>About Me</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                            <textarea class="form-control" name="description" rows="5">{{ old('description')}}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Save</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                  <img class="img" src="{!! asset('theme/assets/img/faces/marc.jpg') !!}" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <style lang="">
        #radioBtn .notActive{
            color: #3276b1;
            background-color: #fff;
        }
        #radioBtn .active{
            color: #fff;
            background-color: #9124a3;
        }
        .btn {
                cursor: default;
                background-color: #FFF;
                border-radius: 4px;
                text-align: left;
            }

            .caret {
                position: absolute;
                right: 16px;
                top: 16px;
            }

            .btn-default:hover, .btn-default:focus, .btn-default:active, .btn-default.active, .open .dropdown-toggle.btn-default {
                background-color: #FFF;
            }

            .btn-group.open .dropdown-toggle {
                box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(102, 175, 233, 0.6)
            }

            .btn-group {width: 100%}
            .dropdown-menu {width: 100%;}
      </style>
@endsection
