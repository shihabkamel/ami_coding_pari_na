
 @include('nav')   
<h1> Welcome to section3</h1> <br>
   
@if ($response->isEmpty())
<p>No input found</p>
@else
<ul>
   @foreach ($response as $item)
       <li>
         <strong>Timestamp:</strong>{{ $item->timestamp }}
         <strong>Input values:</strong>{{ $item->input_values }}
       </li>
   @endforeach
</ul>
    
@endif   
    

        
