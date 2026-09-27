@extends('admin.dashboardMaster')
@section('content')
        <div class="container-fluid pt-4 px-4">
            <div class="row vh-200 bg-light rounded align-items-center justify-content-center mx-0 py-4">
                <!-- <div class="col-md-12"> -->
                    <div class="max-w-7xlsm:px-6 lg:px-8 space-y-6">
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('admin.admin-page.partials.update-profile-information-form')
                            </div>
                        </div>
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('admin.admin-page.partials.update-password-form')
                            </div>
                        </div>
                        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                            <div class="max-w-xl">
                                @include('admin.admin-page.partials.delete-user-form')
                            </div>
                        </div>
                     </div>
                <!-- </div> -->
            </div>
        </div>
@endsection 