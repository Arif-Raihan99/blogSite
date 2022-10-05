@extends('layouts.backend.master')

@section('title')
    Create Profiles
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
                            <form action="{{ route('profiles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="a" class="form-label ml-1">Name</label>
                                        <input type="" value="{{ Auth::user()->name }}" readonly id="a" class="border-primary form-control">
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="a" class="form-label ml-1">Email</label>
                                        <input type="text" value="{{ Auth::user()->email }}" readonly id="a" class="border-primary form-control">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="age" class="form-label ml-1">Birth Date<span class="text-danger">*</span></label>
                                        <input type="date" name="age" value="{{ old('age') }}" placeholder="Enter age" id="age" class="border-primary @error('age') is-invalid @enderror form-control">
                                        @error('age')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 form-group">
                                        <label for="mobile" class="form-label ml-1">Mobile</label>
                                        <input type="number" name="mobile" value="{{ old('mobile') }}" placeholder="Enter contact number" id="mobile" class="border-primary form-control">
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="whatsapp" class="form-label ml-1">WhatsApp<span class="text-danger">*</span></label>
                                        <input type="number" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="Enter what'sapp number" id="whatsapp" class="@error('whatsapp') is-invalid @enderror border-primary form-control">
                                        @error('whatsapp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="address" class="form-label ml-1">Address<span class="text-danger">*</span></label>
                                        <input type="text" name="address" value="{{ old('address') }}" placeholder="Enter address" id="address" class="@error('address') is-invalid @enderror border-primary form-control">
                                        @error('address')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="father_name" class="form-label ml-1">Father's name<span class="text-danger">*</span></label>
                                        <input type="text" name="father_name" value="{{ old('father_name') }}" placeholder="Enter father_name" id="father_name" class="@error('father_name') is-invalid @enderror border-primary form-control">
                                        @error('father_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="mother_name" class="form-label ml-1">Mother's name<span class="text-danger">*</span></label>
                                        <input type="text" name="mother_name" value="{{ old('mother_name') }}" placeholder="Enter mother_name" id="mother_name" class="@error('mother_name') is-invalid @enderror border-primary form-control">
                                        @error('mother_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="form-label ml-1">Religion</label>
                                        <select name="religion" class="border-primary form-control">
                                            <option selected disabled><-------------Select One-------------></option>
                                            @foreach($religion as $row)
                                                <option value="{{$row}}" {{ old('religion')==$row ?'selected':'' }}>{{ $row }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="form-label ml-1">Occupation<span class="text-danger">*</span></label>
                                        <select name="occupation" class="border-primary form-control @error('occupation') is-invalid @enderror">
                                            <option selected disabled><-------------Select One-------------></option>
                                            @foreach($occupation as $row)
                                                <option value="{{$row}}" {{ old('occupation')==$row ?'selected':'' }}>{{ $row }}</option>
                                            @endforeach
                                        </select>
                                        @error('occupation')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label class="form-label ml-1">Married Status</label><br>
                                        <label class="text-sm mr-2"><input type="radio" name="married_status" {{ old('married_status')=='single'?'checked':'' }} value="single" class="border-primary"> Single</label>
                                        <label class="text-sm mr-2"><input type="radio" name="married_status" {{ old('married_status')=='married'?'checked':''}} value="married" class="border-primary"> Married</label>
                                        <label class="text-sm mr-2"><input type="radio" name="married_status" {{ old('married_status')=='separate'?'checked':''}} value="separate" class="border-primary"> Separate</label>
                                    </div>

                                    <div class="col-md-6 form-group">
                                        <label for="image" class="form-label ml-1">Image</label>
                                        <input type="file" name="image" value="{{ old('image') }}" accept="image/*" id="image" class="border-primary form-control-file">
                                    </div>

                                    <input type="submit" name="button"  class="btn btn-success">

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


