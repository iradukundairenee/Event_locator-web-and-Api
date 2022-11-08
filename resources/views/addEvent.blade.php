@extends('layouts.main')
@section('title') Add event @stop
@section('body') 
 <form class="form-horizontal" role="form" method="POST" action="{{ url('newevent') }}">
                        {{ csrf_field() }}
                        {!! (session()->has('message')?'<p class="text-center text-success">'.session()->get('message').'</p>':'') !!}
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Event title ..." required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                            <label for="date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control" name="date" value="{{ old('date') }}" placeholder="Event date ..." required autocomplete="off">

                                @if ($errors->has('date'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ ($errors->has('formatted_address') || $errors->has('lat') || $errors->has('lng')) ? ' has-error' : '' }}">
                            <label for="location" class="col-md-4 control-label">Location</label>

                            <div class="col-md-6">
                                <input id="location" type="location" class="form-control geocomplete" name="location" value="{{ old('location') }}" value="{{ old('location') }}" placeholder="Location ..." required>

                                @if (($errors->has('formatted_address') || $errors->has('lat') || $errors->has('lng')))
                                    <span class="help-block">
                                        <strong>Please select valid location by choosing from the dropdown addresses (Start by typing an event address)</strong>
                                    </span>
                                @endif
                            </div>
                            <span class="location_details">
								<input name="lat" type="hidden" id="lat" value="">
	  							<input name="lng" type="hidden" id="lng" value="">
	  							<input name="formatted_address" id="formatted_address" type="hidden" value="">
	  							<input name="locality" id="locality" type="hidden" value="">
	  							<input name="state" type="hidden" id="state" value="">
	  							<input name="country" type="hidden" id="country" value="">
  							</span>
                        </div>

                        <div class="form-group{{ $errors->has('host') ? ' has-error' : '' }}">
                            <label for="host" class="col-md-4 control-label">Host</label>

                            <div class="col-md-6">
                                <input id="host" type="text" class="form-control" name="host" value="{{ old('host') }}" placeholder="Host ..." required>

                                @if ($errors->has('host'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('host') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" class="form-control" name="description" placeholder="Event description" required>{{old('description')}}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save event
                                </button>
                            </div>
                        </div>
                    </form>
@stop
@section('bottom_scripts')
    <script>
      function initMap() {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.setFields(
            ['address_components', 'geometry', 'icon', 'name']);
        autocomplete.addListener('place_changed', function() {
          var place = autocomplete.getPlace();
          $.each(place.address_components, function( index, value ) {
            if(value.types.indexOf('locality') !== -1 || value.types.indexOf('sublocality') !== -1){
                $('.location_details input#locality').val(value.long_name);
            }
            if(value.types.indexOf('administrative_area_level_1') !== -1){
                $('.location_details input#state').val(value.long_name);
            }
            if(value.types.indexOf('country') !== -1){
                $('.location_details input#country').val(value.long_name);
            }
          });
          $('.location_details input#formatted_address').val(place.name);
          $('.location_details input#lat').val(place.geometry.location.lat());
          $('.location_details input#lng').val(place.geometry.location.lng());
          if (!place.geometry) {
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }
        });
      }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3FHQ-gE5NeiJfug9NQVVB3QZqRyUwhUg&libraries=places&callback=initMap"
        async defer></script>
    
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript">
        $(function () {
            $('#date').datetimepicker({
                useCurrent: false,
                minDate:moment().add(1,'hour'),
                maxDate:moment().add(720,'days'),
                format: 'YYYY-MM-DD HH:m',
                
            });
        });
    </script>
@endsection