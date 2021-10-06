<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormValidationRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            'password_confirmation' => ['required', 'same:password'],
            'niveis' => ['array', 'required']
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Por Favor, Digite O Nome Do Usuário',
            'name.string' =>  'O Valor Do Campo Tem De Ser Letras',
            'email.required' => 'Por Favor, Digite O Campo De E-mail',
            'email.email' => 'Digite Um E-mail Válido',
            'password.required' => 'Por Favor, Digite A Senha',
            'password.min' => 'A Senha Tem Que Ter No Mínimo De 8 Caracteres',
            'password_confirmation.required' => 'Por Favor, Confirme Sua Senha',
            'password_confirmation.same' => 'Por Favor, Confirme Sua Senha Corretamente',
            'niveis.required' => 'Por Favor, Marque Um Nível De Acesso',
        ];
    }
}
