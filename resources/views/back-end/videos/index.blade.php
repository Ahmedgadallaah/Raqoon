@extends('back-end.layout.app')

@section('title')
{{$pageTitle}}
@endsection


@section('content')

@component('back-end.layout.navbar')
@slot('nav_title')
{{$pageTitle}}
@endslot

@endcomponent

@component('back-end.shared.table',[ 'pageTitle' => $pageTitle , 'pageDescription' => $pageDescription])

@slot('addButton')
<div class="col-md-4 text-right">
  <a href="{{route($routeName.'.create')}}" class="btn btn-white btn-round ">Add {{$smoduleName}}</a>
</div>
@endslot

<div class="table-responsive">
  <table class="table">
    <thead class=" text-primary">
      <th>
        ID
      </th>
      <th>
        Name
      </th>
      <th>
        description
      </th>
      <th>
      published
      </th>
      <th>
        User 
      </th>
      <th>
        Category 
      </th>
      <th>
        Control
      </th>
    </thead>
    <tbody>
      @foreach($rows as $row)
      <tr>
        <td>
          {{$row->id}}
        </td>
        <td>
          {{$row->name}}
        </td>
        <td>
          {{$row->des}}
        </td>
        <td>
          {{$row->published}}
        </td>
        <td>
          {{$row->user->name}}
        </td>
        <td>
          {{$row->cat->name}}
        </td>
        <td>


          @include('back-end.shared.buttons.edit')
          @include('back-end.shared.buttons.delete')
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
  {!! $rows->links() !!}
</div>

@endcomponent
@endsection
