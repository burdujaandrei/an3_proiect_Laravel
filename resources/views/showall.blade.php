@extends('template')
@section('content')

<body class="home-page">
	<div class="wrap-body">
		<div class="header">
			<div id='cssmenu' >
				  <ul>
                   <li class="home"><a href="{{ url('/') }}"><span>CafeHome</span></a></li>
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
							<h1 class="t-center" style="margin: 40px 0;color: #212121;letter-spacing: 2px;font-weight: 500;">Image Pages</h1>
						<center>	
			<table>
				<tr>
					<th>Image</th>
					<th colspan="3" align="center">Actions</th>
				</tr>
				@foreach($image as $var)
				<tr>

					<td colspan="3" align="center">
						<img src="{{asset('/images/'.$var->title)}}" width="200" height="200"></td>

						<td colspan="3" align="center">
							<?php echo link_to('/show/'.$var->id, 'View');?>
							<?php echo link_to('/edit/'.$var->id, 'Edit');?>
							<?php echo link_to('/delete/'.$var->id, 'Delete', array("onclick"=>"return confirm('Are you SURE?')"));?>
						</td>
					</tr>
					@endforeach
			</table>

	<br/><br/>
		<?php echo link_to("image",'Upload record');?>
</center>		
						</div>
					</div>
				
				</div>
				<br/><br/>
			</div>
		</section>
@endsection('content')