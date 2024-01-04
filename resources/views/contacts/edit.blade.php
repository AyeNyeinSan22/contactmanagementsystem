@extends('layouts.app')
@section('content')
   <div class="container">

    @if ($errors->any())
        <div class="alert alert-warning">
            <ol>
                @foreach ($errors->all() as $error )
                    <li>{{ $error }}</li>
                @endforeach
            </ol>
        </div>
    @endif
    <form action="" method="post" >
        @csrf
        <div class="mb-3">
            <label for="">Name</label>
            <input type="text" name="name" id="" class="form-control" value="{{ $contact->name }}">
        </div>

        <div class="mb-3">
            <label for="">Phone</label>
            <input type="text" name="phone" id="" class="form-control" value="{{ $contact->phone }}">
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="email" name="email" id="" class="form-control" value="{{ $contact->email }}">
        </div>




        <div class="mb-3">
            <label for="">Title</label>
            <select name="title_id" id="" class="form-select">
                @foreach ($titles as $title)
                   <option value="{{ $title->id }}"
                    @if ($title->id == $contact->title_id)
                      selected
                    @endif>
                    {{ $title->title }}
                   </option>


                @endforeach
            </select>

        </div>

        <input type="submit" value="Edit" class="btn btn-warning">

    </form>
   </div>
@endsection

