@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body" dir="rtl">
                        @foreach($questions as $question)
                            <div class="media">
                                <div class="media-body">
                                    <h3 class="mt-0">
                                        {{$question->title}}
                                    </h3>


                                    {{Str::limit($question->body,255)}}
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <div class="max-auto">
                            {{$questions->links()}}
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
