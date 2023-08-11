<label for="input{{$name}}">{{ucwords($label)}}</label>
<input 
    type="text" 
    id="input{{$name}}"
    name="{{$name}}" placeholder="{{$placeholder}}"
    value="{{old($name)}}"
    {{$attributes->class(['is-invalid'=>$errors->has($name)])->merge(['class' => 'form-control'])}}>
@error($name)
    <p class="text text-danger">{{$message}}</p>
@enderror

