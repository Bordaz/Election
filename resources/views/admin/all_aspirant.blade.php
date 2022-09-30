@extends ('layout.admin_layout')
@section('content')

<div class="container w-100">
     <div class="card-header">
   
   
     <h4 class="text-center">Aspirant List</h4>
   
   </div>
   <div class="card-body">
     <table class="table table-border">
       <thead>
         <tr>
           <th> Aspirant ID </th>
           <th> Name </th>
           <th> Position vying for </th>
           <th> Picture </th>
           <th> Actions </th>
         </tr>
       </thead>
       <tbody>
         @foreach ($view_all as $index=> $aspirant )
         <tr>
           <td>{{ $index + 1 }} </td>
           <td> {{ $aspirant->f_name }} </td>
           <td> {{ $aspirant->position }} </td>
           <td><img src="/images/{{ $aspirant->dp}}" style="height: 60px; width:60px; border-radius: 100px;"/> 
          </td>
          <td> <a class="btn btn-outline-primary" href="{{ route('admin.edit_aspirant',$aspirant->id) }}" > Edit </a>
          <a href="{{ route('admin.delete_aspirant', $aspirant->id ) }}" class="btn btn-outline-danger"> Delete </a>
          </td>

         </tr>
           
         @endforeach
       </tbody>
     </table>
   </div>
  <span>  {{ $view_all->links() }} </span>
   </div>
        
   </body>
   </html>
   @stop