@extends('template')
@section('content')

  @if(Session::has('message'))
       <p >{{ Session::get('message') }}</p>
     @endif
     
    <section id="container">
            <div class="wrap-container clearfix">
                <div id="main-content">
                    <div class="crumbs">
                        <ul>
                            <li><a href="{{ url('/') }}">Home</a></li>
                        </ul>
                    </div>
                    <center>    
                    <div class="zerogrid">
                        <div class="wrap-content" style="padding: 60px;">
                            <h1 class="t-center" style="margin: 40px 0;color: #212121;letter-spacing: 2px;font-weight: 500;">Update Archive</h1>
                    <br/>
                        <center>                        
                        {{ Form::open(array('route'=>array('update_archive',request()->route('id')),'enctype'=>'multipart/form-data')) }}
                        {{ Form::label('title','Title:',['class' => 'form-control','placeholder' => 'Enter title']) }}
                        {{ Form::text('title',$archive[0]->title) }}
                        <br><br>

                        {{ Form::label('content','Content:',['class' => 'form-control','placeholder' => 'Enter content']) }}
                        {{ Form::textarea('content',$archive[0]->content)}}
                        <br><br>
                        {{ Form::hidden('old_image',$archive[0]->image) }}

                        {{ Form::label('image','Image:') }}
                        {{ Form::file('image') }}
                        <br><br>

                        {{ Form::submit('Update',['class'=>'button']) }}
                        {{ Form::close() }}
                        </center>   
                <br/><br/>
                    <?php echo link_to("archive",'Go to Archives');?>
                        </div>
                        </center>       
                    </div>
                
                </div>
                <br/><br/>
            </div>
        </section>
@endsection('content')