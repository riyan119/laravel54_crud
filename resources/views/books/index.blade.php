<form action="{{route('books.store')}} " method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    Book Title:
    <br>
    <input type="text" name="title" id="">
    <br><br>
    Logo: <br>
    <input type="file" name="logo" >
    <br><br>
    <input type="submit" value="Save">
</form>