@extends('template')
@section('content')

<body class="archive-page">
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
							@foreach($archives as $archive)
							<article>
								@if($archive->id % 2 == 1)
								<div class="col-1-2">
									<div class="art-header">
										<img src="{{ asset('/images/'.$archive->image) }} "/>
									</div>
								</div>
							@else
							<div class="col-1-2 f-right ">
									<div class="art-header">
										<img src="{{ asset('/images/'.$archive->image) }} "/>
									</div>
							</div>
							@endif
								<div class="col-1-2">
									<div class="art-content t-center">
										<h3><?php echo $archive->title; ?></h3>
										<br>
										<a class="button" href="{{ url('/show_archive/'.$archive->id)}}">Show archive</a>
										<a class="button" href="{{ url('/edit_archive/'.$archive->id)}}">Update archive</a>
										<a class="button" href="{{ url('/delete_archive/'.$archive->id)}}">Delete archive</a>
										<p><?php echo $archive->content; ?></p>
									</div>	
								</div>
							</article>

							@endforeach
							
						</div>
					</div>
					<table>
						<tr>
							<th>Title</th>
							<th>Content</th>
							<th>Status</th>
						</tr>
											
					@foreach($archives_updated as $updates)
					<tr>						
						<td><?php echo $updates->title;?></td>
						<td><?php echo $updates->content;?></td>		
						<td><?php echo $updates->status;?></td>		
					</tr>
					@endforeach
				
			</table>
					<center>
					<a class="button" href="{{ url('/insert_archive') }}">Add archive</a>
					</center>
				</div>
			</div>
		</section>
		<br/>
		@endsection('content')