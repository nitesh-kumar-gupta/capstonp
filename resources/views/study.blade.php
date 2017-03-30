@extends('layouts.master')
@section('title', 'Studies')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <blockquote>Studies</blockquote>
                    </div>
                    <div class="card-content" id="card-content-study">

                    </div>
                    <ul id="pagination" class="pagination-md pagination-blue"></ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.3.1/jquery.twbsPagination.min.js"></script>
<script type="text/javascript" src="{{ asset('js/ajaxcalls.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/moment.js') }}"></script>
@endsection