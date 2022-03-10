<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Select a Date Range</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
  <script>
  $( function() {
    var dateFormat = "mm/dd/yy",
      from = $( "#from" )
        .datepicker({
          defaultDate: "+1w",
          changeMonth: true,
          numberOfMonths: 1
        })
        .on( "change", function() {
          to.datepicker( "option", "minDate", getDate( this ) );
        }),
      to = $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: true,
        numberOfMonths: 1
      })
      .on( "change", function() {
        from.datepicker( "option", "maxDate", getDate( this ) );
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
</head>
<body>
 

<form method="POST" action="{{route('create-survey')}}">
    @csrf
    <h4>Criar nova Enquete</h4>

        <div>
            <x-label for="datestart" :value="__('Data para iniciar a enquete')" />
             <x-input type="text" id="from" name="from"/>
            <x-label for="datefinished" :value="__('Data para fechar a enquete')"/>
             <x-input type="text" id="to" name="to"/>
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
 
    
       </form>
 
</body>
</html>
   
   
    
        