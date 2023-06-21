<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

<!------ Include the above in your HEAD tag ---------->
@include('admin.commons.head')
<style>
    .invalid-feedback{
        font-size: 110% !important;
        font-weight: bold !important;
        color: #ad2828;
    }
</style>
    <div class="container">    
        
        <div id="signupbox" style="margin-top:50px" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="panel-title">Know Your Customer</div>
                        </div>  
                        <div class="panel-body" >
                                <form action="{{route('submit.form')}}" class="form-horizontal" role="form" method="POST" id="contact-form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name" class="col-md-3 control-label">Name </label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"  name="name" placeholder="Full Name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">Email</label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="text" class="form-control @error('email') is-invalid @enderror"  name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="passport_number" class="col-md-3 control-label">ID/Passport Number</label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="text" class="form-control @error('passport_number') is-invalid @enderror"  name="passport_number" placeholder="ID / Passport Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="invested_amount" class="col-md-3 control-label">Amount Invested</label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="number" class="form-control @error('invested_amount') is-invalid @enderror"  name="invested_amount" placeholder="Please Enter Amount to be invested">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-md-3 control-label">Phone</label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="text" class="form-control @error('phone') is-invalid @enderror"  name="phone" placeholder="Phone Number">
                                    </div>
                                </div>
                                    
                                <div class="form-group">
                                    <label for="address" class="col-md-3 control-label">Address</label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="text" class="form-control @error('address') is-invalid @enderror"  name="address" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="city" class="col-md-3 control-label">City</label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"  name="city" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="state" class="col-md-3 control-label">State</label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="text" class="form-control @error('state') is-invalid @enderror"  name="state" placeholder="State">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="country" class="col-md-3 control-label">Country</label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="text" class="form-control @error('country') is-invalid @enderror"  name="country" placeholder="Country">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="document_image" class="col-md-3 control-label">Document Image</label>
                                    <div class="col-md-9 form-group input-group">
                                        <input type="file" accept="image/*" class="form-control @error('document_image') is-invalid @enderror"  name="document_image">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <!-- Button -->                                        
                                    <div class="col-md-offset-5 col-md-12">
                                        <button id="btn-login" type="submit" class="btn btn-success">Submit Form</button>
                                    </div>
                                </div>
                                
                            </form>
                         </div>
                    </div>

               
               
                
         </div> 
    </div>
    @include('admin.commons.scripts')
    @include('admin.commons.js')
    {{-- Includable JS --}}
    @yield('scripts')
    @include('admin.commons.errors')
    <script>


        $(document).ready(function () {
       
           $('#contact-form').validate({ 
               rules: {
                   name: {
                       required: true,
                       minlength:3
                   },
                   email: {
                       required: true,
                       email: true
                   },
                   passport_number: {
                       required: true,
                    
                   },
                   invested_amount: {
                       required: true,
                       
                   },
                   phone: {
                       required: true,
                    
                   },
                   address: {
                       required: true,
                    
                   },
                   city: {
                       required: true,
                
                   },
                   state: {
                       required: true,
                 
                   },
                   country: {
                       required: true,
                   },
                   document_image: {
                       required: true,
                    
                   },
               },
               messages: {
                passport_number: {
                       required: "Please enter ID or Passport number",
                 },     
                 invested_amount: {
                       required: "Please enter Amount to be invested.",
                 }, 
               },  
               errorElement: 'span',
               errorPlacement: function (error, element) {
                   error.addClass('invalid-feedback');
                   element.closest('.form-group').append(error);
               },
               highlight: function (element, errorClass, validClass) {
                   $(element).addClass('is-invalid');
               },
               unhighlight: function (element, errorClass, validClass) {
                   $(element).removeClass('is-invalid');
               }
           });
       
        
       });
       </script> 