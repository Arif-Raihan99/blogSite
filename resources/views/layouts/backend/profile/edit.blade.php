@extends('layouts.backend.master')

@section('title')
    Edit Profile
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card border-info">
                        <div class="card-header border-info">
                            <h4 class="text-center">Profile data</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profiles.update', $profile->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_method" value="PUT">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="a" class="form-label ml-1">Name</label>
                                        <input type="text" value="{{ $profile->user->name }}" disabled id="a" class="border-primary form-control">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="a" class="form-label ml-1">Email</label>
                                        <input type="text" value="{{ $profile->user->email }}" disabled id="a" class="border-primary form-control">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="age" class="form-label ml-1">Age<span class="text-danger">*</span></label>
                                        <input type="date" name="age" value="{{ $profile->age }}" id="age" class="border-primary @error('age') is-invalid @enderror form-control">
                                        @error('age')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="mobile" class="form-label ml-1">Mobile</label>
                                        <input type="number" name="mobile" maxlength="11" minlength="11" value="{{ $profile->mobile }}" id="mobile" class="border-primary form-control">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="whatsapp" class="form-label ml-1">WhatsApp<span class="text-danger">*</span></label>
                                        <input type="number" name="whatsapp" value="{{ $profile->whatsapp }}" id="whatsapp" class="@error('whatsapp') is-invalid @enderror border-primary form-control">
                                        @error('whatsapp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="address" class="form-label ml-1">Address<span class="text-danger">*</span></label>
                                        <input type="text" name="address" value="{{ $profile->address }}" id="address" class="@error('address') is-invalid @enderror border-primary form-control">
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="father_name" class="form-label ml-1">Father's name<span class="text-danger">*</span></label>
                                        <input type="text" name="father_name" value="{{ $profile->father_name }}" id="father_name" class="@error('father_name') is-invalid @enderror border-primary form-control">
                                        @error('father_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="mother_name" class="form-label ml-1">Mother's name<span class="text-danger">*</span></label>
                                        <input type="text" name="mother_name" value="{{ $profile->mother_name }}" id="mother_name" class="@error('mother_name') is-invalid @enderror border-primary form-control">
                                        @error('mother_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="form-label ml-1">Religion</label>
                                        <select name="religion" class="border-primary form-control">
                                            <option selected disabled><-------------Select One-------------></option>
                                            @foreach($religion as $row)
                                                <option value="{{$row}}" {{ $profile->religion == $row ?'selected':'' }}>{{ $row }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="form-label ml-1">Occupation<span class="text-danger">*</span></label>
                                        <select name="occupation" class="border-primary form-control @error('occupation') is-invalid @enderror">
                                            <option selected disabled><-------------Select One-------------></option>
                                            @foreach($occupation as $row)
                                                <option value="{{$row}}" {{ $profile->occupation ==$row ?'selected':'' }}>{{ $row }}</option>
                                            @endforeach
                                        </select>
                                        @error('occupation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="form-label ml-1">Married Status</label><br>
                                        <label class="text-sm mr-2"><input type="radio" name="married_status" {{ $profile->married_status =='single'?'checked':'' }} value="single" class="border-primary"> Single</label>
                                        <label class="text-sm mr-2"><input type="radio" name="married_status" {{ $profile->married_status =='married'?'checked':''}} value="married" class="border-primary"> Married</label>
                                        <label class="text-sm mr-2"><input type="radio" name="married_status" {{ $profile->married_status =='separate'?'checked':''}} value="separate" class="border-primary"> Separate</label>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="image" class="form-label ml-1">Image</label>
                                        <input type="file" name="image" value="{{ old('image') }}" accept="image/*" id="image" class="border-primary form-control-file">
                                        <img src="{{ asset($profile->image) }}" alt="img" class="mt-2" style="height: 65px; width: 60px">
                                    </div>

                                    <div class="col-md-4 mx-auto">
                                        <input type="submit" name="button"  class="btn w-100 btn-success">
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
