<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <x-app-layout>
  <x-slot name="header" class="bg-white shadow">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __("Edite sua Enquete" ) }}
    </h2>
</x-slot>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var dateFormat = "yy/mm/dd",
      from = $( "#datestart" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          datefinished.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#datefinished" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        datestart.datepicker( "option", "maxDate", getDate( this ) );
      });
 
    function getDate( element ) {
      var date;
      try {
        date = $.datepicker.parseDate( dateFormat, element.value );
      } catch( error ) {
        date = null;
      }
 
      return date;
    }
  } );
  </script>

<form method="POST" action="{{route('create-survey')}}">
    @csrf
    <div class="py-12">
      <div class="max-w-7xl max-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="mr-2">
            <div class="p-4">
              <div class="p-6 bg-white border-b border-gray-200">
                <div id="data">
                  <x-label for="datestart" :value="__('Data para iniciar a enquete')" />
                   <x-input type="text" id="datestart" name="datestart"/>
                  <x-label for="datefinished" :value="__('Data para fechar a enquete')"/>
                   <x-input type="text" id="datefinished" name="datefinished"/>
              </div>    
              
              <div>
              <x-label for="question" :value="__('Faça sua Pergunta:')" />
              
              <x-input id="question" class="block mt-1 w-full" type="text" name="question" :value="old('question')" required autofocus />
              </div>
              
              <div>
              <x-label for="answer" :value="__('Dê as opções de resposta')" />
              
              @include('survey/answer')
              </div>
              
              
              <x-button class="ml-72 bg-blue-500 hover:bg-blue-400 mt-8">
              {{ __('Enviar') }}
              </x-button>
              </div>
            </div>
</form>
          </div>
        </div>    
      </div>
    </div>
 </x-app-layout>       
 <script src="https://cdn.jsdeli.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>