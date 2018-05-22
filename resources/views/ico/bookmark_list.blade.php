@extends('layouts.app')

@section('content')
<script type="text/javascript">
  function deleteBookmark(id,row){
    if(confirm("Are you sure want to delete this?")) {
      $.ajax({
        type : 'DELETE',
        url : "{{url('/deletebookmark')}}",
        data: $('form').serialize(),
        //dataType : 'text',
        success: function(response) {
          console.log("success");
          alert("Delete bookmark succeed!");
          var el = row.parentNode.parentNode.rowIndex;
          document.getElementById("main-table").deleteRow(el);
        }
      });
    }  
  }
</script>
<div class="container">
  <h3>Bookmark List</h3>
  <table class="table table-bordered" id="main-table"> 
    <thead>
      <tr>
        <th>ICO Name</th>
        <th>Rating</th>
        <th>Status</th>
        <th></th>
      </tr>      
    </thead>
    <tbody>
      @foreach($bookmarks as $bookmark)
        <tr>
          <td>{{ $bookmark->name }}</td>
          <td>{{ $bookmark->rating }}</td>
          <td>{{ $bookmark->status}}</td>
          <form>
            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
            <td align="center"><button type="button" class="btn btn-danger" onclick="deleteBookmark({{ $bookmark->ico_id }},this)">Delete</button></td>
            <input type="hidden" name="ico_id" value="{{ $bookmark->ico_id}}">
          </form>
        </tr>
      @endforeach
    </tbody>
  </table>
  <?php echo $bookmarks->render(); ?>   
</div>
@endsection