{{ $slot }}

<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class={{ $classe }}>
    @if ($errors->has('nome'))
        {{ $errors->first('nome') }}
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class={{ $classe }}>
    {{ $errors->has('telefone') ? $errors->first('telefone') : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class={{ $classe }}>
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>

    @isset($motivo_contatos)
        <select name="motivo_contatos_id" class={{ $classe }}>
            <option value="">Qual o motivo do contato?</option>

            @foreach ($motivo_contatos as $motivo)
                <option value="{{ $motivo->id }}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : '' }}>
                    {{ $motivo->motivo_contato }}</option>
            @endforeach
        </select>
    @endisset
    {{ $errors->has('motivo_contatos_id') ? $errors->first('motivo_contatos_id') : '' }}

    <br>
    <textarea name="mensagem"
        class={{ $classe }}>{{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    {{ $errors->has('mensagem') ? $errors->first('motivo_contatos_id') : '' }}
    <br>
    <button type="submit" class={{ $classe }}>ENVIAR</button>
</form>

@if ($errors->any())
    <div style="background: red; padding:10px; border-radius:5px;">
        @foreach ($errors->all() as $erro)
            {{ $erro }} <br>
        @endforeach
    </div>
@endif
