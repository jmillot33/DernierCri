@extends('layout')

@section('contenu')
<section>
            
            <div id="singlepost" data="{{ $data }}"></div>
                
        </section>
       
        <script src="{{ asset('js/app.js') }}" ></script>
@endsection
