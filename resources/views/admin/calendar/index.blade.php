@extends('layouts.admin')
@section('styles')
    <link  rel="stylesheet" href="{{asset('assets/admin/src/styles/custom.css')}}"></link>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap"
          rel="stylesheet"
    />
@endsection

@section('main-content')
    <div id="container">
        <div id="header">
            <div id="monthDisplay"></div>
            <div>
                <button id="backButton"><</button>
                <button id="nextButton">></button>
            </div>
        </div>

        <div id="weekdays">
            <div>Sunday</div>
            <div>Monday</div>
            <div>Tuesday</div>
            <div>Wednesday</div>
            <div>Thursday</div>
            <div>Friday</div>
            <div>Saturday</div>
        </div>

        <div id="calendar"></div>

        <div id="newEventModal">
            <h2>New Event</h2>

            <input id="eventTitleInput" placeholder="Event Title" />

            <button id="saveButton">Save</button>
            <button id="cancelButton">Cancel</button>
        </div>

        <div id="deleteEventModal">
            <h2>Event</h2>

            <p id="eventText"></p>

            <button id="deleteButton">Delete</button>
            <button id="closeButton">Close</button>
        </div>

        <div id="modalBackDrop"></div>
    </div>

@endsection
@section('scripts')
    <script src="{{asset('assets/admin/src/scripts/custom.js')}}"></script>
@endsection
