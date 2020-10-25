@extends('layouts.app')  

@section('content') 

 <div class="card card-default">
     <div class="card-header"> Add a new Player </div>
     <div class="card-body">

     <form action="{{route('players.store')}}" method="POST" enctype="multipart/form-data">
            @csrf 
            <div class="form-group">
                <label for="first_name"> First name : </label>
            <input type="text" name="first_name" class="form-control">        
            </div> 

            <div class="form-group">
                <label for="last_name"> Last Name : </label>
            <input type="text" name="last_name" class="form-control">        
            </div>  
            
            <div class="form-group">
                <label for="date_birth" class="col-2 col-form-label">Date</label>
                <div class="col-10">
                  <input class="form-control" type="date"  name="date_birth">
                </div>
              </div>

            <div class="form-group">
                <label for="nationality">select a nationality</label>
                <select class="form-control"  name="nationality">     
                <option value="Africa"> -- Africa -- </option> 
                <option value="Algeria"> Algeria </option> 
                <option value="Egypt"> Egypt </option> 
                <option value="Morocco"> Morocco	 </option> 
                <option value="Cameroon"> Cameroon </option> 
                <option value="Côte d'Ivoire"> Côte d'Ivoire </option> 
                <option value="Senegal"> Senegal </option>  
                <option value="Europe"> -- Europe -- </option>  
                <option value="Germany">  Germany  </option>   
                <option value="Italy">  Italy  </option> 
                <option value="France">  France  </option> 
                <option value="Croatia">  Croatia  </option> 
                <option value="England">  England  </option> 
                <option value="Spain">  Spain  </option> 
                <option value="Poland">  Poland  </option> 
                <option value="Netherlands">  Netherlands  </option> 
                <option value="Belgium">  Belgium  </option> 
                <option value="Portugal">  Portugal  </option> 
                <option value="Norway">  Norway  </option>  
                <option value="South America"> -- South America  -- </option> 
                <option value="Brazil">  Brazil   </option> 
                <option value="Colombia">  Colombia	   </option> 
                <option value="Argentina">  Argentina   </option> 
                <option value="Uruguay">  Uruguay   </option> 
                <option value="South America"> -- Asia  -- </option>  
                <option value="Japan">  Japan	   </option> 
                <option value="South Korea">  South Korea   </option>  
                </select>
            </div>
                 
            <div class="form-group">
                <label for="position">Position</label>
                <select class="form-control"  name="position">     
                <option value=""> -- Position -- </option> 
                <option value="Goalkeeper"> Goalkeeper </option> 
                <option value="Centre-Back"> Centre-Back </option> 
                <option value="Left-Back"> Left-Back	 </option> 
                <option value="Right-Back"> Right-Back </option> 
                <option value="Defensive Midfield"> Defensive Midfield</option> 
                <option value="Central Midfield"> Central Midfield </option>  
                <option value="Attacking Midfield"> Attacking Midfield </option>  
                <option value="Left Winger"> Left Winger </option>
                <option value="Right Winger"> Right Winger </option>
                <option value="Centre-Forward"> Centre-Forward </option> 
                </select>
            </div>
            
            <div class="form-group">
                <label for="country_id">Ligue</label>
                <select class="form-control" id="country_id" name="country_id">
                  <option value=""> --- </option>
                  @foreach ($country as $ct)     
                <option value="{{$ct->id}}">{{$ct->name}}</option> 
                  @endforeach
                </select>
              </div>
 
              <div class="form-group">
                <label for="club_id">Club</label>
                <select class="form-control" id="club_id" name="club_id"> 
                </select>
              </div> 
                  
              <div class="form-group">
                <label for="market_value"> Market Value : </label>
            <input type="text" name="market_value" class="form-control">        
            </div>  
             
            <div class="form-group">
                <label for="image"> Image : </label>
                <input type="file" class="form-control-file" name="image">
              </div> 

            <div class="form-group ">
                <button type="submit" class="btn btn-success"> Add </button>
            </div> 
        </form> 
     </div> 
 </div>

 
 
 
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript"> 
    $(function () {
        populateCities();
        //populateDistricts();
        $(document).on('change', '#country_id', function() {
           populateCities();
           //populateDistricts();
           return false;
        }); 
        function populateCities() {
            $('option', $('#club_id')).remove();
            $('#club_id').append($('<option></option>').val('').html(' --- '));
            var countryIdVal = $('#country_id').val() != null ? $('#country_id').val() : '{{ old('country_id') }}';
            $.get("{{ route('get_club') }}", { country_id: countryIdVal }, function (data) {
                $.each(data, function(val, text) {
                    var selectedVal = val == '{{ old('club_id') }}' ? "selected" : "";
                    $('#club_id').append($('<option ' + selectedVal + '></option>').val(val).html(text));
                })
            }, "json");
        } 
    });
</script>

 
 
@endsection  
