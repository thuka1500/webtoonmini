@extends('guest.layouts.master')


@section('title', 'Series')


@section('content')
<div id="page-main-wrapper" class="theme-main-wrapper theme-bg-color-2">
    <div class="page-recommend-wrapper theme-bg-color-2">  
    	<div class="page-recommend-container theme-bg-color-2 page-series">  
    	  <div class="recomend-image" style="background: url('/{{$series->banner_url}}')">
          </div>
        </div>
    </div>
    <div id="page-main-container" class="theme-bg-color-1">
        
       
        <div class="episode-wrapper" class="theme-bg-color-1">
        @foreach($episodes as $episode)
            {{--@for($i=0; $i<20; $i++)--}}
            <a href="/episode/{{str_replace(' ', '_', $series->series_title)}}/{{$episode->episode_number}}">
                <div class="episode-container">
                    <div class="episode-left-container theme-bg-light">
                        <p class="episode-number">Episode {{$episode->episode_number}}</p>
                        <p class="episode-title">{{$episode->episode_title}}</p>
                    </div>
                    <div class="episode-right-container theme-bg-light" style="background: url('/{{$episode->thumbnail_url}}'); background-size:cover; background-position:center">
                    </div>
                </div>
            </a>
            {{--@endfor--}}
        @endforeach
        </div>
        
        @if($page['total_paging']>1)
    			
    	 <div class="theme-bg-color-1">
    	 	<div class="page-paging-container theme-bg-color-1 theme-paging">
    	 		
    			@php
    				$page_prev = $page['current_paging']-1;
    				$page_next = $page['current_paging']+1;
    			@endphp
    			@if($page_prev > 0)
    			<a href="/series/{{str_replace(' ', '_', $series->series_title)}}/{{$page_prev}}" class="prev">
    			<div >
    				< prev
    			</div>
    			</a>
    			@endif
    			@for($i=0;$i<$page['iteration'];$i++)
    				<a href="/series/{{str_replace(' ', '_', $series->series_title)}}/{{$page['start_paging']+$i}}" @if($page['start_paging']+$i == $page['current_paging']) class="active" @endif>
    				<div class="page-paging-number-container">
    					{{$page['start_paging']+$i}}
    				</div>
    				</a>
    			@endfor
    			@if($page_next < $page['total_paging'])
    			<a href="/series/{{str_replace(' ', '_', $series->series_title)}}/{{$page_next}}" class="next">
    			<div>
    				next >
    			</div>
    			</a>
    			@endif
    		</div>
    	 </div>
   	@endif
    </div>

@endsection
