@extends('template')
@section('content')

<body class="home-page">
	  @if(Session::has('message'))
       <p >{{ Session::get('message') }}</p>
     @endif
	<div class="wrap-body">
		<div class="header">
			<div id='cssmenu' >
				  <ul>
                   <li class="home"><a href="{{ url('/') }}"><span>CafeHome</span></a></li>
                   <li><a href="{{ url('/archive') }}"><span>Archive</span></a></li>
                   <li><a href="{{ url('/showall') }}"><span>Image</span></a></li>

                    @if (Route::has('login'))
                            @auth
                            <li><a href="{{ url('/') }}"><span>Home</span></a></li>
                            @else
                            <li><a href="{{ route('login') }}"><span>Login</span></a> </li>

                                @if (Route::has('register'))
                             <li><a href="{{ route('register') }}"><span>Register</span></a> </li>
                                @endif
                            @endauth
                    @endif 
                   <li class='last'><a href="{{ url('/contact') }}"><span>Contact</span></a></li>
                </ul>
			</div>
		</div>
	<section id="container">
			<div class="wrap-container clearfix">
				<div id="main-content">
					<div class="crumbs">
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('/archive') }}">Blog</a></li>
						</ul>
					</div>
					<div class="zerogrid">
						<div class="wrap-content" style="padding: 60px;">
							<h1 class="t-center" style="margin: 40px 0;color: #212121;letter-spacing: 2px;font-weight: 500;">Archive Page</h1>
						<center>						
						{{ Form::open(array('action'=>'ArchiveController@send','enctype'=>'multipart/form-data')) }}
						{{ Form::label('title','Title:',['class' => 'form-control','placeholder' => 'Enter title']) }}
						{{ Form::text('title') }}
						<br><br>

						{{ Form::label('content','Content:',['class' => 'form-control','placeholder' => 'Enter content']) }}
						{{ Form::textarea('content')}}
						<br><br>

						{{ Form::label('image','Image:') }}
						{{ Form::file('image') }}
						<br><br>

						{{ Form::submit('Insert',['class'=>'button']) }}
						{{ Form::close() }}
						</center>		
						</div>
					</div>
				
				</div>
				<br/><br/>
			</div>
		</section>
@endsection('content')