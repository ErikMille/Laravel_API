


<form action="{{action('SearchController@index')}}" method="post">
    @csrf
  <div class="form-group">
    <label>subj</label>
    <select name="subject_name_id" class="form-control">
        @foreach($subject_names as $subject_name)
            <option value="{{$subject_name->id}}">{{$subject_name->name}}</option>
        @endforeach
    </select><br>
    <label>topic</label>
        <input type="text" name="topic" class="form-control"><br>
    <label>level</label>
    <select name="level" class="form-control">
            <option value="beginer">beginer</option>
            <option value="intermediate">intermediate</option>
            <option value="advanced">advanced</option>
    </select><br>
    <label>Price</label>
        <input type="number" name="price" class="form-control"><br>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
