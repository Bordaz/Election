@extends ('layout.admin_layout')
@section('content')

<div class="container w-100">
     <div class="card-header-pills">
          <h4 class="text-center">Votes Count</h4>
   
          <table class="table">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Full name</th>
                   <th scope="col">position</th>
                   <th scope="col">Image</th>
                   <th scope="col">Total Votes</th>
                 </tr>
               </thead>
               <tbody>
                    @foreach ($votes as $index=> $votes_count )
                 <tr>
                   <th scope="row">{{ $index +1 }}</th>
                   <td>{{ $votes_count->f_name }}</td>
                   <td>{{ $votes_count->position }}</td>
                   <td><img style="height: 40px; width:40px; border-radius:100px;" src="images/{{ $votes_count->dp }}" /></td>
                   <td>@mdo</td>
                 </tr>
                 @endforeach                         

               </tbody>
             </table>
   
   
    
   </div>
   <div class="card-body">
     
   </div>
</div>   
   </body>
   </html>
   @stop