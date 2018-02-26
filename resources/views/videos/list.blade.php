@extends('app')

@section('title', 'Videos list')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h2>Videos</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <th>Title</th>
                <th>Like</th>
                <th>Video</th>
                <th>Duration</th>
                <th>File Size</th>
                <th>Format</th>
                <th>Bit Rate</th>
                <th>Keywords</th>
                <th>Location</th>
                </thead>
                <tbody>
                    @foreach ($videos as $video)
                    <tr>
                        <td>{{$video->title}}</td>
                        <td>
                            @if($video->is_liked==1)
                            <div id="liked{{$video->id}}">
                                <i class="fa fa-thumbs-up fa-2x"></i>
                                <br>
                                <button class="btn btn-primary"
                                        onclick="dislike({{$video->id}})">
                                    Dislike
                                </button>
                            </div>
                            <div id="like{{$video->id}}" style="display: none">
                                <i class="fa fa-thumbs-o-up fa-2x"></i>
                                <br>
                                <button class="btn btn-primary"
                                        onclick="like({{$video->id}})">
                                    Like
                                </button>
                            </div>
                            @else
                            <div id="liked{{$video->id}}" style="display: none">
                                <i class="fa fa-thumbs-up fa-2x"></i>
                                <br>
                                <button class="btn btn-primary"
                                        onclick="dislike({{$video->id}})">
                                    Dislike
                                </button>
                            </div>
                            <div id="like{{$video->id}}">
                                <i class="fa fa-thumbs-o-up fa-2x"></i>
                                <br>
                                <button class="btn btn-primary"
                                        onclick="like({{$video->id}})">
                                    Like
                                </button>
                            </div>
                            @endif
                        </td>
                        <td>
                            <video width="200"
                                   controls>
                                <source src="/{{$video->url}}" type="video/mp4">
                                Your browser does not support HTML5 video.
                            </video>
                        </td>
                        <td>{{$video->duration}}</td>
                        <td>{{$video->filesize}}</td>
                        <td>MP4</td>
                        <td>{{$video->bitrate}}</td>
                        <td>

                            <div class="form-group">
                                <label for="sel1">Select Keyword:</label>
                                <div class="alert alert-success" id="video{{$video->id}}" style="display: none">
                                    Tagged
                                </div>
                                <div class="alert alert-danger" id="errorVideo{{$video->id}}" style="display: none">
                                </div>
                                <select class="form-control" id="keywords{{$video->id}}">
                                    @foreach ($keywords as $keyword)
                                    <option value="{{$keyword->id}}" name="{{$keyword->name}}">{{$keyword->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="">
                                <button class="btn btn-primary" onclick="addKeyword({{$video->id}})">Add</button>
                                <ul id="assignedKeywords{{$video->id}}">
                                    @foreach ($video->keywords as $assignedKeyword)
                                    <li id="v{{$video->id}}k{{$assignedKeyword->id}}">
                                        {{$assignedKeyword->name}} 
                                        <i class="fa fa-close"
                                           style="color: red;cursor: pointer" 
                                           title="remove tag"
                                           onclick="removeKeyword({{$assignedKeyword->id}},{{$video->id}})"></i>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </td>
                        <td>

                            <div class="form-group">
                                <label for="sel1">Select Location:</label>
                                <div class="alert alert-success" id="lVideo{{$video->id}}" style="display: none">
                                    Tagged
                                </div>
                                <div class="alert alert-danger" id="lErrorVideo{{$video->id}}" style="display: none">
                                </div>
                                <select class="form-control" id="locations{{$video->id}}">
                                    @foreach ($locations as $location)
                                    <option value="{{$location->id}}" name="{{$location->name}}">{{$location->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="btn btn-primary" onclick="addLocation({{$video->id}})">Add</button>
                            <div id="locationTag{{$video->id}}">
                                @if(isset($video->location_id))
                                {{$video->location->name}} 
                                <i class="fa fa-close"
                                   style="color: red;cursor: pointer" 
                                   title="remove location"
                                   onclick="removeLocation({{$video->id}})"></i>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection