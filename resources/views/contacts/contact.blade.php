@extends('layouts.app')


@section('content')
<style>
    /* Add a border to the left of the second column */
    .border-left {
        border-left: 1px solid #ddd; /* Adjust color and thickness as needed */
    }
    .full-height{
        height: 100%;
    }
    .flex-column{
        height: 100%;
    }
    .titles-column {
        background-color: #f8f9fa; /* Light gray background */
    }

    .contacts-column {
        background-color: #ffffff; /* White background */
    }
</style>
<div class="container mb-4 full-height">
    {{-- <h2>Contact List</h2> --}}

    <div class="d-flex full-height">
        <div class="col-md-3 flex-grow-1 flex-column titles-column">
            <!-- Title Section -->
            <h5 class="text-center font-bold mb-3">TITLES</h5>
            <div class="list-group" id="titleList">
                @foreach ($titles as $title)
                    <a class="list-group-item title-item list-group-item-action mb-2 " style="text-decoration:none ; border:none" href="{{ url("/contacts/show/$title->id") }}">
                        {{ $title->title }}
                    </a>
                @endforeach
            </div>
        </div>

        <div class="col-md-9 flex-grow-1  flex-column contacts-column">
            <!-- Contacts Section -->
            <div class="table-responsive">
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            <th><input type="checkbox" name="selectAll" id="selectAll"></th>
                            <th>NAME</th>
                            <th>PHONE</th>
                            <th>EMAIL</th>
                            <th>TITLE</th>
                            <th>ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($contacts as $contact)
                        <tr class="contact-row" data-title="{{ $contact->title->title }}">
                                <td><input type="checkbox" name="select" id="" ></td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <div class=" p-2" style="height: 30px; width: 100px; font-size: 14px; padding: 5px;">
                                        {{ $contact->title->title }}
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ url("/contacts/edit/$contact->id") }}" class="btn btn-warning btn-small"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <a href="{{ url("/contacts/delete/$contact->id") }}" class="btn btn-danger btn-small"><i class="fa-solid fa-trash-can-arrow-up"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $contacts->links() }}
        </div>
    </div>
</div>


@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Get the selectAll checkbox
            var selectAllCheckbox = document.getElementById('selectAll');

            // Get all individual contact checkboxes
            var contactCheckboxes = document.querySelectorAll('.contact-row input[type="checkbox"]');

            // Initially hide all contact checkboxes using display: none;
            contactCheckboxes.forEach(function(checkbox) {
                checkbox.style.display = 'none';
            });

            // Add an event listener to the selectAll checkbox
            selectAllCheckbox.addEventListener('change', function() {
                // Toggle the display of all contact checkboxes
                contactCheckboxes.forEach(function(checkbox) {
                    checkbox.style.display = selectAllCheckbox.checked ? 'block' : 'none';
                });

                // If the selectAll checkbox is checked
                if (selectAllCheckbox.checked) {
                    // Trigger a confirmation dialog
                    var userConfirmed = confirm("Are you sure you want to delete all contacts?");
                    if (!userConfirmed) {
                        // If the user cancels, uncheck the selectAll checkbox and hide all contact checkboxes
                        selectAllCheckbox.checked = false;
                        contactCheckboxes.forEach(function(checkbox) {
                            checkbox.style.display = 'none';
                        });
                    }
                }
            });
        });
    </script>
@endsection
