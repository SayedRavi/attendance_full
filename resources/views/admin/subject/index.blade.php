@extends('layouts.admin',['title' => 'Subjects'])
@section('body')
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <h4 class="card-title">List of Subjects</h4>

                    <div id="subjects">
                        <div class="row">
                            <div class="col s12 l6 input-field">
                                <i class="material-icons prefix">search</i>
                                <input type="search" id="search" onkeyup="aem.search_(event,'table tr')">
                                <label for="search">Search Subject</label>
                            </div>
                        </div>
                        @include('admin.subject.list')
                    </div>
                    <br>
                    <button onclick="aem.modal('{{route('subject.create')}}')" class="btn btn-small btn-floating transparent mt-3">
                        <i class="material-icons black-text">add</i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
