<div class="p-4">
    <div class="p-6 bg-white border-b border-gray-200">
        <a href="./create.blade.php">
            {{ __('Criar nova Enquete') }}
        </a>
        <h4>Enquetes em andamento</h4>
        @foreach($survey as $s) 
            <div class="mb-3">
                <label>Pergunta: {{ $s->$question }}</label>
                <label>Respostas: {{ $s->$answer }}</label>
            </div>
        @endforeach
    </div>
</div>