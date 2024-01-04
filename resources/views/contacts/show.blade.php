@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h5 class="text-center font-bold mb-3">TITLES</h5>
                <div class="list-group" id="titleList">
                @foreach ($titles as $title)
                    <a class="list-group-item title-item list-group-item-action mb-2 " style="text-decoration:none ; border:none" href="{{ url("/contacts/show/$title->id") }}">
                        {{ $title->title }}
                    </a>
                @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>NAME</th>
                                <th>PHONE</th>
                                <th>EMAIL</th>
                                <th>TITLE</th>
                                <th>ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->title->title }}</td>
                                    <td>
                                        <a href="{{ url("/contacts/edit/$contact->id</a>") }}" class="btn btn-warning btn-small"><i class="fa-regular fa-pen-to-square"></i></a>
                                        <a href="{{ url("/contacts/delete/$contact->id</a>") }}" class="btn btn-danger btn-small"><i class="fa-solid fa-trash-can-arrow-up"></i></a>

                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
