@extends('layouts.master')
@section('content')
    <style>
        .container {
            max-width: 450px;
        }

        .push-top {
            margin-top: 50px;
        }

        .error {
            font-size: 15px !important;
            width: 100% !important;
            color: red !important;
        }
    </style>

    <div class="d-sm-flex align-items-center justify-content-between mb-4 ml-3">
        <h1 class="h3 mb-0 text-gray-800">{{ isset($vendor->id) ? 'Edit Vendor' : 'Create Vendor' }} </h1>
    </div>

    <div class="card push-top m-3">
        <div class="card-header">
            Vendor Details
        </div>
        <div class="card-body">
            <form method="post" id="form"
                action="{{ isset($vendor->id) ? route('vendors.update', $vendor->id) : route('vendors.store') }}"
                autocomplete="off" enctype="multipart/form-data">
                @csrf
                @if (isset($vendor->id))
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ isset($vendor->id) ? $vendor->id : '' }}">
                @else
                    @method('POST')
                @endif

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" autocomplete="off" name="name" required
                        value="{{ old('name', $vendor->name) }}" />
                    @if ($errors->has('name'))
                        <div class="error-text">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" autocomplete="off" name="email" required
                        value="{{ old('email', $vendor->email) }}" />
                    @if ($errors->has('email'))
                        <div class="error-text">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" autocomplete="off" name="password"
                        {{ isset($vendor->id) ? '' : 'required' }} />
                    @if ($errors->has('password'))
                        <div class="error-text">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" autocomplete="off" name="address"
                        value="{{ old('address', $vendor->address) }}" />
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" autocomplete="off" name="description" required>{{ old('description', $vendor->description) }}</textarea>
                    @if ($errors->has('description'))
                        <div class="error-text">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="vendor_id">Vendor Category</label>
                    <select name="vendorCategory[]" id="vendorCategory"
                        class="form-control js-example-basic-multiple chosen-select multiselects " multiple="multiple"
                        data-mdb-filter="true" id='vendorCategory'>
                        @foreach ($vendorCategories as $vendorCategory)
                            <option value="{{ $vendorCategory->id }}" @if (isset($vendorCategoriesRelation) && in_array($vendorCategory->id, $vendorCategoriesRelation)) selected @endif>
                                {{ $vendorCategory->category }}
                            </option>
                        @endforeach
                    </select>
                    @if ($errors->has('category'))
                        <div class="error-text">
                            {{ $errors->first('category') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="company_name">Company Name</label>
                    <input type="text" class="form-control" autocomplete="off" name="company_name" required
                        value="{{ old('company_name', $vendor->company_name) }}" />
                    @if ($errors->has('company_name'))
                        <div class="error-text">
                            {{ $errors->first('company_name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="number" class="form-control" autocomplete="off" name="phone" required
                        value="{{ old('phone', $vendor->phone) }}" />
                    @if ($errors->has('phone'))
                        <div class="error-text">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="country">Country</label>
                    <input type="text" class="form-control" autocomplete="off" name="country" required
                        value="{{ old('country', $vendor->country) }}" />
                    @if ($errors->has('country'))
                        <div class="error-text">
                            {{ $errors->first('country') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="state">State</label>
                    <input type="text" class="form-control" autocomplete="off" name="state" required
                        value="{{ old('state', $vendor->state) }}" />
                    @if ($errors->has('state'))
                        <div class="error-text">
                            {{ $errors->first('state') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" autocomplete="off" name="city" required
                        value="{{ old('city', $vendor->city) }}" />
                    @if ($errors->has('city'))
                        <div class="error-text">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="image">Profile Image (1000 X 1577px)</label>
                    <input type="file" class="form-control" autocomplete="off" name="image" />
                    @if ($errors->has('image'))
                        <div class="error-text">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                    @if (isset($vendor->id) && $vendor->image)
                        <img src="{{ asset('/vendor_images/' . $vendor->image) }}" alt="{{ $vendor->image }}"
                            class="image-item">
                    @endif
                </div>
                <div class="form-group">
                    <label for="banner">Banner Image</label>
                    <input type="file" class="form-control" autocomplete="off" name="banner" />
                    @if ($errors->has('banner'))
                        <div class="error-text">
                            {{ $errors->first('banner') }}
                        </div>
                    @endif
                    @if (isset($vendor->id) && $vendor->banner)
                        <img src="{{ asset('/vendor_banners/' . $vendor->banner) }}" alt="{{ $vendor->banner }}"
                            class="image-item">
                    @endif
                </div>
                @if (isset($vendor->id))
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" required>
                            <option value="1" {{ isset($vendor->status) && $vendor->status == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="2" {{ isset($vendor->status) && $vendor->status == 2 ? 'selected' : '' }}>
                                In-Active</option>
                        </select>
                    </div>
                @endif
                @if (isset($vendor->id))
                    <div class="form-group">
                        <input type="checkbox" name="must_own" value=""
                            {{ old('must_own', isset($vendor->must_own) && !empty($vendor->must_own) ? 'checked' : '') }}
                            style="height: 20px;width: 20px;">
                        <label for="must_own ml-3"> Must Own Designer </label>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="premium" value=""
                            {{ old('premium', isset($vendor->premium) && !empty($vendor->premium) ? 'checked' : '') }}
                            style="height: 20px;width: 20px;">
                        <label for="premium ml-3"> Premium </label>
                    </div>
                    <div class="form-group">
                        <label for="premium_image">Premium Image</label>
                        <input type="file" class="form-control" autocomplete="off" name="premium_image" />
                        @if ($errors->has('premium_image'))
                            <div class="error-text">
                                {{ $errors->first('premium_image') }}
                            </div>
                        @endif
                        @if (isset($vendor->id) && $vendor->premium_image)
                            <img src="{{ asset('/vendor_images/' . $vendor->premium_image) }}"
                                alt="{{ $vendor->premium_image }}" class="image-item">
                        @endif
                    </div>
                @endif
                <button type="submit"
                    class="btn btn-primary">{{ isset($vendor->id) ? 'Update vendor' : 'Create vendor' }}</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function() {

            $.validator.addMethod('chosenRequired', function (value, element) {
                return $(element).val().length > 0;
            }, 'Please select at least one value.');

            $("#form").validate({
                ignore: [],  // ignore nothing, validate everything
                rules: {
                    name:{
                        required: true
                    },
                    email:{
                        required: true,
                        email:true,
                    },
                    // password:{
                    //     required: true
                    // },
                    description:{
                        required: true
                    },
                    company_name:{
                        required: true
                    },
                    phone:{
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        digits: true
                    },
                    country:{
                        required: true
                    },
                    state:{
                        required: true
                    },
                    city:{
                        required: true
                    },
                    "vendorCategory[]":'chosenRequired'
                },
                messages: {
                    name:{
                        required: "Please enter name"
                    },
                    email:{
                        required: "Please enter email",
                        email:"Please enter valid email"
                    },
                    // password:{
                    //     required: "Please enter password"
                    // },
                    description:{
                        required: "Please enter description"
                    },
                    company_name:{
                        required: "Please enter company name"
                    },
                    phone:{
                        required: "Please enter phone number",
                        minlength: "Phone number must be 10 digits",
                        maxlength: "Phone number must be 10 digits",
                        digits: "Please enter only digits"
                    },
                    country:{
                        required: "Please enter country name"
                    },
                    state:{
                        required: "Please enter state name"
                    },
                    city:{
                        required: "Please enter city name"
                    },
                
                },
                errorClass: "help-inline text-danger",
                errorElement: "span",
                errorPlacement: function(error, element) {
                    if (element.attr("name") === "vendorCategory[]") {
                       error.insertAfter(element.parent());
                        
                    }else  {
                        // message placement for everything else
                        error.insertAfter(element);
                    }
                },

                highlight: function(element, errorClass, validClass) {
                    $(element).parents('.form-group').addClass('has-error');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents('.form-group').removeClass('has-error');
                    $(element).parents('.form-group').addClass('has-success');
                },

            });

        });
    </script>
@endsection
