@extends('layouts.app')

@section('content')

<div class="container">
    <div>
        <h2>Add Questions for {{ $examDetails->name }}</h2>
        <form method="POST" action="/admin/set-question">
        {{ csrf_field() }}
            <h2><a href="#" id="addScnt">Add Another Input Box</a></h2>
            <div id="p_scents" class="form-group">
                <p>    
                    Question: 1
                    <br>
                    <label for="p_scents"><input class="form-control" type="text" id="p_scnt" size="20" name="keyword[]" value="" placeholder="Enter keyword">
                    <a href="#" id="addVar">Add Variants</a>
                        <a></a>
                    </label>
                </p>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>

        </form>
        
    </div>
</div>

@endsection

@section('script')

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>

<script type="text/javascript">

$(function() {
        var scntDiv = $('#p_scents');
        var i = $('#p_scents label').size() + 1;
        console.log('1st');
        console.log(i);
        $('#addScnt').live('click', function() {
            $('<p>Keyword: '+i+'<a href="#" id="remScnt">Remove</a><br><label for="p_scnts"><input class="form-control" type="text" id="p_scnt" size="20" name="keyword[]" value="" placeholder="Enter Keyword" /><a href="#" id="addVar">Add Variants</a><a></a></label></p>').appendTo(scntDiv);
                i++;
                return false;
        });
        console.log('2nd');
        console.log(i);
        $('#remScnt').live('click', function() { 
                if( i >2 ) {
                        $(this).parents('p').remove();
                        i--;
                }
                return false;
        });
        console.log('3rd');
        console.log(i);
         $('#addVar').live('click', function() {
             //alert();
               $('<p><label for="var"><input class="form-control " type="text" id="p_scnt" size="20" name="p_scnt['+i+'][]" value="" placeholder="Enter Vareyword" /></label> <a href="#" id="remVar">Remove Var</a></p>').appendTo($(this).next());
                return false;
        });
    
    
        $('#remVar').live('click', function() { 
                
                        $(this).parent('p').remove();
                
                
                return false;
        });
    
});




</script>

@endsection