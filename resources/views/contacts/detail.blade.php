@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="card-title mb-3"> <b>Name: </b>{{ $contact->name }}</div>
                <div class="card-text mb-3"><b>Phone: </b>{{ $contact->phone }}</div>
                <div class="card-text mb-3"><b>Title: </b>{{ $contact->title }}</div>
                <div class="card-text"><b>Email: </b>{{ $contact->email }}</div>

            </div>
        </div>
    </div>
@endsection
