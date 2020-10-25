@include('layouts.nav')


<style>

 
</style>

<div class="container"> 
    <div class="card card-default">
        <div class="card-header"> 
            EUROPEAN GOLDEN BOOT 
        </div> 
          <div class="card-body">
            <input type="text" name="search" id="search" class="form-control " placeholder="" /> 
            <table class="table">
                <thead>
                    <tr> 
                        <td class="text-center"> Image</td>
                        <td class="text-center"> Name</td> 
                        <td class="text-center"> Club</td>    
                        <td class="text-center"> Goals</td>
                        <td class="text-center"> Coefficient</td>
                        <td class="text-center"> Points </td>  
                    </tr>
                </thead>
                <tbody>

               </tbody>
            </table>   
        </div>
    </div>  
 </div>  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> 
<script>
    $(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
    $.ajax({
    url:"{{ route('live_search.action') }}",
    method:'GET',
    data:{query:query},
    dataType:'json',
    success:function(data)
    {
        $('tbody').html(data.table_data);
        $('#total_records').text(data.total_data);
    }
    })
    }

    $(document).on('keyup', '#search', function(){
    var query = $(this).val();
    fetch_customer_data(query);
    });
    });
</script>