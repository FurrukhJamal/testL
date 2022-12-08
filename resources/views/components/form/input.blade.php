
<div class = "mb-6">
            
    <label class = "block mb-2 font-bold text-xs text-gray-700" for="{{$slot}}">{{ucwords($slot)}}</label>
    <input 
        type="{{$type ? $type : "text"}}" 
        class = "p-2 border border-gray-400 w-full"
        name = "{{$slot}}"
        id = "{{$slot}}"
        
        value = "{{old((string)$slot)}}" 
        required>

    @error($slot)
        <p class = "test-xs test-red-500 mt-2">{{$message}}</p>
    @enderror
</div>