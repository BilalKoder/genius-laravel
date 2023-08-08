@extends('layouts.auth')
@section('content')
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div style="background: url('media/bg/bg-3.jpg') !important;"
            class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
            <div
                class="login-content flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
                @if (session('status'))
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 offset-sm-3">
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!--begin::Content body-->
                <div class="d-flex flex-column-fluid flex-center">
                    <!--begin::Signin-->
                    <div class="login-form login-signin">
                        <!--begin::Form-->
                        <form class="form" id="register-form" method="POST" action="{{ route('register') }}"
                            autocomplete="off" enctype="multipart/form-data">
                            @csrf
                            <div class="pb-3 pt-lg-0 pt-5" style="display: flex; justify-content: center; align-items: center;">
                                <a href="{{route('home')}}" class="text-center mb-10">
                                    <img src="{{ asset('/genius/img/logo/RHMC-logo.png') }}" class="max-h-70px" alt="" />
                                </a>    
                            </div>
                            <!--begin::Title-->
                            <div class="pb-13 pt-lg-0 pt-5">
                                <h3 class="font-weight-bolder text-dark font-size-h4 font-size-h1-lg">Sign Up</h3>
                                <p class="text-muted font-weight-bold font-size-h4">Enter your details to create your
                                    account</p>
                            </div>
                            <!--end::Title-->
                            <div class="row">
                                <!--begin::Form group-->
                                <div class="form-group col-sm-12">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        id="name" type="text" placeholder="Fullname" name="name"
                                        value="{{ old('name') }}" required />
                                    @error('name')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="password" data-validator="notEmpty" class="fv-help-block">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group col-sm-12">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        id="email" type="email" placeholder="Email" name="email"
                                        value="{{ old('email') }}" required />
                                    @error('email')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="password" data-validator="notEmpty" class="fv-help-block">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                            </div>
                            {{-- <div class="row">
                            <!--begin::Form group-->
                            <div class="form-group col-sm-6">
                                <select name="role_id" id="role_id" class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6">
                                    <option value="">Who are you?</option>
                                    @foreach ($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!--end::Form group-->
                        </div> --}}
                            <div class="row">
                                <!--begin::Form group-->
                                <div class="form-group col-sm-12">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        id="password" type="password" placeholder="Password" name="password" required />
                                    @error('password')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="password" data-validator="notEmpty" class="fv-help-block">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group col-sm-12">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        id="confirm_password" type="password" placeholder="Confirm password"
                                        name="cpassword" required />
                                    @error('cpassword')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="password" data-validator="notEmpty" class="fv-help-block">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="details" id="details" value="">
                                <!--end::Form group-->
                            </div>
                            <div class="row">
                                <!--begin::Form group-->
                                <div class="form-group col-sm-12">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        id="emirates_id" type="text" placeholder="Emirates ID" name="emirates_id"
                                        required />
                                    @error('emirates_id')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="emirates_id" data-validator="notEmpty" class="fv-help-block">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <div class="form-group col-sm-12">
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        id="phone" type="text" placeholder="Phone Number" name="phone" required />
                                    @error('phone')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="phone" data-validator="notEmpty" class="fv-help-block">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                            </div>
                            <div class="row">

                                <!--begin::Form group-->
                                <div class="form-group col-sm-12">
                                    <label for="passport" style="
                                    cursor: pointer;"
                                        class="custom-file-upload">
                                        Select Passport File (required)
                                    </label>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        id="passport" type="file" name="passport" required />
                                    @error('passport')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="passport" data-validator="notEmpty" class="fv-help-block">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="image" style="
                                    cursor: pointer;"
                                        class="custom-file-upload">
                                        Select Profile Photo (optional)
                                    </label>
                                    <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg font-size-h6"
                                        id="image" type="file" name="image" />
                                    @error('image')
                                        <div class="fv-plugins-message-container">
                                            <div data-field="image" data-validator="notEmpty" class="fv-help-block">
                                                {{ $message }}
                                            </div>
                                        </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="details" id="details" value="">
                                <!--end::Form group-->
                            </div>
                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap pb-lg-0 pb-3">
                                <button type="submit" style="background: #009051 !important;border-color: #fff;"
                                    id="kt_login_signup_submit"
                                    class="btn btn-danger font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                                <a href="{{ url('/') }}"
                                    class="btn btn-light-success font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
                                {{-- <a type="button" id="kt_login_signup_cancel"
                                class="btn btn-light-danger font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</button>
                                --}}
                            </div>
                            <!--end::Form group-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Content body-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->
@endsection

@section('scripts')
    <script>
        $('#register-form').submit(function(e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            if ($('#confirm_password').val() != $('#password').val()) {
                toastr.error('Password did not match with confirm password');
            } else {

                const email = $('#email').val();
                const endpoint = '{!! url("user/check/' + email + '") !!}';
                const result = axios.get(endpoint)
                    .then(res => {
                        if (res.data === 404) {
                            document.getElementById('register-form').submit();
                        } else {
                            toastr.error('User with this email already exists');
                            return false;
                        }
                    })
                    .catch(error => toastr.error(error))
            }
        });
    </script>
@endsection
