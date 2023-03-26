@extends('admin_dashboard')
@section('admin')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Profile</a></li>

                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Change Password</h4>
                    </div>
                </div>
            </div>     
            <!-- end page title -->

            <div class="row">
            

                <div class="col-lg-8 col-xl-8">
                    <div class="card">
                        <div class="card-body">

                     
                             
                                <!-- end timeline content-->

                                <div class="tab-pane" id="settings">
                                    <form method="POST" action="{{ route('update.password') }}" >
                                        @csrf
                                        <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Change Password</h5>
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Old Password</label>
                                                    <input type="password" class="form-control @error('old_password')
                                                        is-invalid
                                                    @enderror" name="old_password" id="current_password" placeholder="Enter old password">
                                                </div>
                                                @error('old_password')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">New Password</label>
                                                    <input type="password" class="form-control @error('new_password')
                                                        is-invalid
                                                    @enderror" name="new_password" id="new_password" placeholder="Enter new password">
                                                </div>
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Confirm New Password</label>
                                                    <input type="password" class="form-control" name="new_password_confirmation" id="new_password_confirmation" placeholder="Please Re-enter new password">
                                                </div>
                                              
                                            </div>

                                            
                                           
                                        </div> <!-- end row -->
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- end settings content-->

                          
                        </div>
                    </div> <!-- end card-->

                </div> <!-- end col -->
            </div>
            <!-- end row-->

        </div> <!-- container -->

     <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <script>document.write(new Date().getFullYear())</script> &copy; UBold theme by <a href="">Coderthemes</a> 
                </div>
                <div class="col-md-6">
                    <div class="text-md-end footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>




</script>
@endsection