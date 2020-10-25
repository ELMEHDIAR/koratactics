@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
    <script>
        $(function () {
            populateCities();
            //populateDistricts();
            $(document).on('change', '#country_id', function() {
               populateCities();
               populateDistricts();
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

