 <x-app-layout>
  <x-slot name="header" class="bg-white shadow">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __("Criar nova Enquete" ) }}
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