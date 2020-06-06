@extends('template')
@section('content') 
 <body class="contact-page">
    <div class="wrap-body">
        <div class="header">
            <div id='cssmenu' >
                <ul>
                   <li class="active"><a href="{{ url('/') }}"><span>CafeHome</span></a></li>
                   <li><a href="{{ url('/archive') }}"><span>Archive</span></a></li>
                    <li><a href="{{ url('/showall') }}"><span>Images</span></a></li>

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
		<!--////////////////////////////////////Container-->
		<section id="container">
			<div class="wrap-container">
				<div class="crumbs">
					<ul>
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><a href="{{ url('/contact') }}">Contact</a></li>
					</ul>
				</div>
				<div class="zerogrid">
					<div class="row">
						<h1 class="t-center" style="margin: 40px 0;color: #212121;letter-spacing: 2px;font-weight: 500;">Contact Us</h1>
						<div class="col-full">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3164.289259162295!2d-120.7989351!3d37.5246781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8091042b3386acd7%3A0x3b4a4cedc60363dd!2sMain+St%2C+Denair%2C+CA+95316%2C+Hoa+K%E1%BB%B3!5e0!3m2!1svi!2s!4v1434016649434" width="100%" height="450" frameborder="0" style="border:0"></iframe>
						</div>
						<div class="col-1-3">
							<div class="wrap-col">
								<h3 style="margin: 20px 0">Contact Info</h3>
								<strong>SED UT PERSPICIATIS UNDE OMNIS ISTE NATUS ERROR SIT VOLUPTATEM ACCUSANTIUM DOLOREMQUE LAUDANTIUM, TOTAM REM APERIAM.</strong>
								<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque la udantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia.</p>
								<p>JL.Kemacetan timur no.23. block.Q3<br>
									Jakarta-Indonesia</p>
								   <p>+6221 888 888 90 <br>
									+6221 888 88891</p>
								<p>info@yourdomain.com</p>
							</div>
						</div>
						<div class="col-2-3">
							<div class="wrap-col">
								<div class="contact">
									<h3 style="margin: 20px 0 20px 30px">Contact Form</h3>
									<div id="contact_form">
										@if(Session::has('success'))
										   <div class="alert alert-success">
										     {{ Session::get('success') }}
										   </div>
										@endif
										{!! Form::open(['route'=>'contact.store']) !!}
										<label class="row">
												<div class="col-1-2">
													<div class="wrap-col {{ $errors->has('name') ? 'has-error' : '' }}">
														{!! Form::label('Name:') !!}
														{!! Form::text('name', old('name'), ['class'=>'form-control', 'placeholder'=>'Enter Name']) !!}
													</div>
														<span class="text-danger">{{ $errors->first('name') }}</span>
												</div>
												<div class="col-1-2">
													<div class="wrap-col {{ $errors->has('email') ? 'has-error' : '' }}">
														{!! Form::label('Email:') !!}
														{!! Form::text('email', old('email'), ['class'=>'form-control', 'placeholder'=>'Enter Email']) !!}
													</div>
														<span class="text-danger">{{ $errors->first('email') }}</span>
												</div>
											</label>
											<label class="row">
												<div class="wrap-col {{ $errors->has('message') ? 'has-error' : '' }}">
														{!! Form::label('Message:') !!}
														{!! Form::textarea('message', old('message'), ['class'=>'form-control', 'placeholder'=>'Enter Message']) !!}
												</div>
														<span class="text-danger">{{ $errors->first('message') }}</span>
											</label>
											<center><input class="sendButton" type="submit" name="submitcontact" value="Submit"></center>
										{!! Form::close() !!}
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	@endsection('content') 
